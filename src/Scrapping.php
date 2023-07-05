<?php

namespace Fpalvadeau\OssTd3;

use Symfony\Component\HttpClient\HttpClient;

class Scrapping
{
    /**
     * @return array<array<string, int>>
     */
    public function getCitiesAndPopulation(): array
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://www.annuaire-mairie.fr/departement-yvelines.html');
        $content = $response->getContent();

        $dom = new \DOMDocument();
        @$dom->loadHTML($content);

        $intercommunaliteContent = $dom->getElementById('intercommunalite_content');

        $data = [];

        if ($intercommunaliteContent) {
            $table = $intercommunaliteContent->getElementsByTagName('table')->item(1);

            if ($table) {
                $rows = $table->getElementsByTagName('tr');

                foreach ($rows as $row) {
                    $columns = $row->getElementsByTagName('td');

                    if ($columns->length > 0) {
                        $commune = $columns->item(0)->nodeValue;
                        $population = $columns->item(3)->nodeValue;

                        $population = str_replace(' ', '', $population);
                        $population = intval($population);

                        $data[] = [
                            'ville' => $commune,
                            'population' => $population
                        ];
                    }
                }
            }
        }
        var_dump($data);
        return $data;
    }
    /**
     * @return array<array<string, int>>
     */
    public function getMaxPopulation(): array
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://www.annuaire-mairie.fr/departement-yvelines.html');
        $content = $response->getContent();

        $dom = new \DOMDocument();
        @$dom->loadHTML($content);

        $intercommunaliteContent = $dom->getElementById('intercommunalite_content');

        $data = [];

        if ($intercommunaliteContent) {
            $table = $intercommunaliteContent->getElementsByTagName('table')->item(1);

            if ($table) {
                $rows = $table->getElementsByTagName('tr');

                $maxPopulation = 0;
                $cityWithMaxPopulation = '';

                foreach ($rows as $row) {
                    $columns = $row->getElementsByTagName('td');

                    if ($columns->length > 0) {
                        $commune = $columns->item(0)->nodeValue;
                        $population = $columns->item(3)->nodeValue;

                        $population = str_replace(' ', '', $population);
                        $population = intval($population);

                        if ($population > $maxPopulation) {
                            $maxPopulation = $population;
                            $cityWithMaxPopulation = $commune;
                        }
                    }
                }

                $data[] = [
                    'ville' => $cityWithMaxPopulation,
                    'population' => $maxPopulation
                ];
            }
        }
        var_dump($data);
        return $data;
    }
}
