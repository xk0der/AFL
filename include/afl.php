<?php

require_once("interpreter.php");
require_once("debug.php");

class AFL {
    public static $pageTitle;
    public static $output;
    public static $program;
    public static $debugLog;

    private function __construct () {}

    public static function main () {
        if(isset($_GET['e']) && $_GET['e'] == 1 ) {
            $code = isset($_POST['program']) ? $_POST['program'] : "";
            AFL::$program = $code;
            AFL::processProgram($code); 
            AFL::$debugLog = Debug::$messages;
        }
    }

    private static function processProgram(&$code) {
         $interpreter = new Interpreter();
         AFL::$output = $interpreter->run($code);
    }
}
