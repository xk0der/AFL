<?php
$snippet = array();
$snippet['fibonacci'] = array (
"name" => "Fibonacci",
"code" =>
"; Fibonacci
f 0 = 1
f 1 = 1
f n = + (f (- n 1)) (f (- n 2))
",
);

$snippet['factorial'] = array (
"name" => "Factorial",
"code" =>
"; Factorial
f 0 = 1
f x = * x (f (- x 1))
",
);

$snippet['power']= array (
"name" => "Power",
"code" =>
"; Power of a number
f x 0 = 1
f x y = * x (f x (- y 1))
",
);

$snippet['series_summation']= array (
"name" => "Series summation",
"code" =>
"; Summation of series 
series n = * 2 n
sum n = + (series n) (series (- n 1))
",
);
