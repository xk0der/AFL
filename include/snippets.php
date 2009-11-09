<?php

// AFL - A functional language
// (c) 2009, Amit Singh, all rights reserved.
// AFL code and documentation is licensed under GPL version 2
// Please refer to the LICENSE file for complete licensing terms.

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
sum 0 = 0
sum n = + (series n) (sum (- n 1))
; Sum 5 terms of the series
sum 5

; Press the [Execute] button below to run this code.
",
);

$snippet['decimal_to_binary'] = array (
"name" => "Decimal to binary conversion",
"code" =>
"; Decimal to Binary
lsb n = & n 1
next n = >> n 1

; Use list builder
dec2bin n = @^ [] : lsb # : next #n : > # 0

; dec 4 = bin 100
dec2bin 4

; Press the [Execute] button below to run this code.
",
);
