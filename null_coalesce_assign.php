<?php

class Controller
{
    private $request;

    public function action()
    {
        $this->request->data['comments']['user_id'] = $this->request->data['comments']['user_id'] ?? 'value';
    }
}



// Instead of repeating variables with long names, the equal coalesce operator is used
//        $this->request->data['comments']['user_id'] ??= 'value';


//$json = file_get_contents('https://apihost.example/endpoint');
//$data = json_decode($json, true);






$data['post']['comments'][0]['user_id'] ??= 'value';







$b = 'b';
$a = 'a';

$a = $a ?? $b;


