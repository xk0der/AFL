<?php

// AFL - A functional language
// (c) 2009, Amit Singh, all rights reserved.
// AFL code and documentation is licensed under GPL version 2
// Please refer to the LICENSE file for complete licensing terms.

session_start();

require_once("include/afl.php");
require_once('include/snippets.php');

AFL::$pageTitle = "A Functional Language";

AFL::main();

include("main.php");
