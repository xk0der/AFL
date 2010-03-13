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

$snippet['map'] = array (
"name" => "Map function",
"code" =>
"; Map a function to list
; Example of passing function to a function

; Functions to map
add a b = + a b
sub a b = - a b
mul a b = * a b

; Definition of map function
map fn val @list = fn val @list

; Our example list
list = .. 1 3

; Do the mappings.
map add 5 (list)

map sub 2 (list)

map mul 5 (.. 10 50 10)

; Press the [Execute] button below to run this code.
",
);

$snippet['reduce'] = array (
"name" => "Reduce function",
"code" =>
"; Reduce a list using foldl

; List to use [1,2,3,4]
list = .. 1 4

; Functions to apply on reduce
fn1 a b = + a b
fn2 a b = * a b                
fn3 a b = - a b                

; Helper function - Extract list value
listVal n @list = @# (- (@& @list) n) @list

; foldl definition
foldl i fn @list 1 = fn i (listVal 1 @list)
foldl i fn @list n = foldl (fn i (listVal n @list)) fn @list (- n 1)

; Reduce definition
; - reduce with initializer
reduce fn @list init = foldl init fn @list (@& @list)
; - reduce with no initializer
reduce fn @list = foldl (listVal (@& @list) @list) fn @list (- (@& @list) 1)

; Call reduce on list using fnx
; (((1 + 2) + 3) + 4)
reduce fn1 (list)

; (((1  * 2) * 3) * 4)
reduce fn2 (list)

; (((1 - 2) - 3) - 4)
reduce fn3 (list)

; reduce with initial value
; ((((0 - 1) - 2) - 3) - 4)
reduce fn3 (list) 0

; Press the [Execute] button below to run this code.
",
);
