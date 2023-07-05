<?php

namespace Fpalvadeau\OssTd3\Tests;

use PHPUnit\Framework\TestCase;
use Fpalvadeau\OssTd3\Scrapping;

class ScrappingTest extends TestCase
{
    public function testGetCitiesAndPopulation()
    {
        $scrapping = new Scrapping();
        $citiesData = $scrapping->getCitiesAndPopulation();
        $this->assertNotEmpty($citiesData);
    }

    public function testGetMaxPopulation()
    {
        $scrapping = new Scrapping();
        $maxPopulationData = $scrapping->getMaxPopulation();
        $this->assertNotEmpty($maxPopulationData);
    }
}

