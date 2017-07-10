<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaltController extends Controller
{
    function number1() {
        $input = [1, 2, 3, 4, 5, 6, 7];
        $result = array_sum($input);
        print_r($result);
    }

    function number2() {
        $inputs = [
            [
                'email' => 'dwi@dwi',
                'phone' => 'a1234b',
                'name'  => '123',
            ],
            [
                'email' => 'dwi@dwi.com',
                'phone' => '+62-856-4098 8820',
                'name'  => 'Dwi Prabowo',
            ],
        ];
        foreach ($inputs as $input) {
            foreach ($input as $key => $value) {
                var_dump($key, $value);
                var_dump(Validator::_($key, $value));
                echo '<br>';
            }
        }
    }

    function number3() {
        $i = 016;
        echo $i/2;
        die();
    }

    function number4() {
        $wishes = [
            'Oolong' => 'wishes for a pair of panties',
            'Goku' => 'wishes for Upa\'s father Bora to be revived',
            'Piccolo' => 'wishes for his youth to be restored',
        ];
        $wish = current($wishes);
        $actor = key($wishes);
        $dragonBall = new DragonBall();
        while ($dragonBall) { 
            if ($prefix = $dragonBall->iFoundABall()) {
                echo($prefix . $actor . ' ' . $wish . '<br>');
                if (class_exists($actor)) {
                    $actor = new $actor();
                    $actor->kill($dragonBall);
                }
                $wish = next($wishes);
                $actor = key($wishes);
            }
        }
        echo 'Dragon Ball End ...';
    }

    public function index() {
        return view('tes');
    }
}

class DragonBall {
    private $ballCount = 0;

    public function iFoundABall() {
        $this->ballCount++;
        if ($this->ballCount == 7) {
            $this->ballCount = 0;
            return 'You can ask your wish ... ';
        }
        return false;
    }
}

class Piccolo {
    public function kill(&$object) {
        $object = false;
    }
}

class Validator {

    static function _($function, $value) {
        return self::$function($value);
    }

    static function email($value) {
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }

    static function phone($value) {
        return (bool) preg_match("/^[+\-0-9 ]+$/", $value);
    }

    static function name($value) {
        return (bool) preg_match('/^[A-Z ]+$/i', $value);
    }
}
