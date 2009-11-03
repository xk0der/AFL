<?php
session_start();

require_once("include/afl.php");
require_once('include/snippets.php');

AFL::$pageTitle = "A Functional Language";

AFL::main();

include("main.php");
