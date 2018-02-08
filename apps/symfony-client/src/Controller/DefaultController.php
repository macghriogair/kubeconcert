<?php

namespace App\Controller;

use GuzzleHttp\Client;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function index(Request $request)
    {
        $wsURL = $this->container->getParameter('ws_url');

        $client = new Client([
            'base_uri' => $wsURL,
            'timeout' => 2.0
        ]);

        $response = $client->request('GET', '/');
        $payload = json_decode($response->getBody(), true);

        return $this->json([
            'message' => 'Hello from Client, your IP is ' . $request->getClientIp(),
            'ws_url' => $wsURL,
            'ws_response' => $payload
        ]);
    }
}
