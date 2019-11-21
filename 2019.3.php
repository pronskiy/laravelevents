<?php /** @noinspection PhpUndefinedClassInspection */

use App\MyClass;

$ide = '';

    if ($ide === 'PhpStorm' && $version === '2019.3') {
        echo sprintf("%s %s", $ide, $version);
    }


    if ($arg == '-q' || $arg == '--quiet') {
        $quiet = true;
    } else {
        if ($arg == '-h' || $arg == '--help') {
            showUsage();
        } else {
            $files[] = $arg;
        }
    }


    $release = [
        'ide' => 'PhpStorm',
        'version' => '2019.3',
        'build' => 'EAP#2',

    ];


    /**
     * @method void magicMethod(string $methodName, stdClass $container) does the magic
     * @property MyClass1 $magicField stores the magic
     */
    class MyClass1
    {
        /**
         * This is a very complex method that does following:
         * <ul>
         *   <li>Check whether field is initialized</li>
         *   <li>Return array with instances of {@link MyClass1}</li>
         * </ul>
         *
         * @param int $param instance parametrization
         * @return self[] single element array
         * @throws \Exception in case {@link \MyClass1::$field} in not initialized
         */
        public function method(int $param)
        {
            return [new self];
        }
    }


$pdo  = new PDO('mysql:dbname=db;host=127.0.0.1');
$class = new MyClass();
$class->setPDO($pdo);


