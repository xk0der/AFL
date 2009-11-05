<?php
$snippet = array();
$snippet['fibonacci'] = array (
"name" => "Fibonacci",
"code" =>
"; Fibonacci
f 0 = 1
f 1 = 1
f n = + (f (- n 1)) (f (- n 2))
; Find the 8th term of the series
f 8

; Press the [Execute] button below to run this code.
",
);

$snippet['factorial'] = array (
"name" => "Factorial",
"code" =>
"; Factorial
f 0 = 1
f x = * x (f (- x 1))
; Factorial 10
f 10

; Press the [Execute] button below to run this code.
",
);

$snippet['power']= array (
"name" => "Power",
"code" =>
"; Power of a number
f x 0 = 1
f x y = * x (f x (- y 1))
; 2 raised to the power 10
f 2 10

; Press the [Execute] button below to run this code.
",
);

$snippet['series_summation']= array (
"name" => "Series summation",
"code" =>
"; Summation of series 
series n = * 2 n
sum n = + (series n) (series (- n 1))
; Sum 5 terms of the series
sum 5

; Press the [Execute] button below to run this code.
",
);
