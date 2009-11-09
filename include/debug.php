<?php

// AFL - A functional language
// (c) 2009, Amit Singh, all rights reserved.
// AFL code and documentation is licensed under GPL version 2
// Please refer to the LICENSE file for complete licensing terms.

require_once("afl.php");

class Debug {
    public static $messages;
    public static function log($str) {
        if(AFL::$disableTrace != "checked")  Debug::$messages .= "<div class='debugMsg'>".$str."</div>";
    }

    public static function dump($msg, &$v) {
        if(AFL::$disableTrace != "checked") {
            Debug::$messages .= "<div class='debugMsg debugDump'><b>[".htmlentities($msg)."]</b>:\n";
            Debug::$messages .= htmlentities(var_export($v, true));
            Debug::$messages .= "</div>";
        }
    }
}
