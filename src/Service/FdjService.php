<?php 

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class FdjService {
    private $client;

    public function __construct(HttpClientInterface $client){

        $this->client = $client;

    }
    //method fetch api FDJ
    public function fetchFdjApi(): array{
        $response = $this->client->request(
            'GET',
            'https://www.fdj.fr/api/service-draws/v1/games/euromillions/draws?include=results&range=0-0'
        );

        $statusCode = $response->getStatusCode();
        // statusCode = 200
        $contentType = $response->getHeaders()['content-type'][0];
        // application/json
        $contentType = $response->getContent();
        // convert to array
        $content = $response->toArray();

        return $content;
    }
}