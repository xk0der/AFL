<?php

// AFL - A functional language
// (c) 2009, Amit Singh, all rights reserved.
// AFL code and documentation is licensed under GPL version 2
// Please refer to the LICENSE file for complete licensing terms.

require_once("afl.php");

class Debug {
    public static $messages;
    public static function log($str) {
        if(AFL::$commandLine && AFL::$interactive && !AFL::$disableTrace) {
            echo "DEBUG:".$str."\n";
        } else {
            if(AFL::$disableTrace != "checked")  Debug::$messages .= "<div class='debugMsg'>".$str."</div>";
        }
    }
    
    public static function error($str) {
        if(AFL::$commandLine && AFL::$interactive) {
            echo "ERROR:".$str."\n";
        } else {
            if(AFL::$disableTrace != "checked")  Debug::$messages .= "<div class='debugMsg'><span class='error'>".$str."</span></div>";
        }
    }

    public static function traceDump($msg, &$v) {
        Debug::dump($msg, $v, AFL::$disableTrace ? false : true);
    } 

    public static function dump($msg, &$v, $trace = false) {
        if(AFL::$commandLine && AFL::$interactive && $trace) {
            echo "DEBUG:[".$msg."]:";
            var_dump($v);
            echo "\n";
        } else {
            if(AFL::$disableTrace != "checked") {
                Debug::$messages .= "<div class='debugMsg debugDump'><b>[".htmlentities($msg)."]</b>:\n";
                Debug::$messages .= htmlentities(var_export($v, true));
                Debug::$messages .= "</div>";
            }
        }
    }
}
