<?php

require 'vendor/autoload.php';

use Mojahed\MParser;

$data = [
  'name' => 'Mojahedul Islam',
  'gender' => "Boy",
  'autoid' => 12,
  'date_of_birth' => '2023-09-10',
];
$str = "
  Hello, (<autoid>) <name>!
  Your reversed name is: <<name>[reverse()]>.
  The first three letters of your name are: <<name>[cut(1, 3)]>.
  The last three letters of your name are: <<name>[cut_back(3)]>.
  Your name starting from the 4th letter is: <<name>[cut(3, last)]>.
  Your autoid is: <<autoid>[sum(10)][sub(10)]> <<autoid>[sub(10)]>.
  Adding 3 to your autoid results in: <autoid>.
  Your date of birth is: <date_of_birth>.
  The year of your birth is: <<date_of_birth>[exp(-, 1)]>.
  The day of your birth is: <<date_of_birth>[exp(-, 3)]>.
  The day of your birth is: <<name>[exp( ,2)][cut(1,3)]>.
";

echo MParser::parse($str, $data).PHP_EOL;
