<?php

use Fpalvadeau\OssTd3\Scrapping;

require_once __DIR__ . '/../vendor/autoload.php';

$scrapping = new Scrapping();
var_dump($scrapping->getCitiesAndPopulation());