<?php

require_once __DIR__. '/../src/MParser.php';

use Mojahed\MParser;

$data = [
    'name' => 'Mojahedul Islam',
    'username' => 'mojahed123',
    'age' => 29,
    'full_name' => 'Md Mojahedul Islam'
];
$string = 'Hello {name}, your username is {{username}[upper()]}, your age next year is {{age}[sum(1)]}, your first name is {{full_name}[exp( ,1)][cut(1, last)]}, your last name is {{full_name}[exp( ,3)][cut_back(5)]}.';
print_r(MParser::parse($string, $data)); 