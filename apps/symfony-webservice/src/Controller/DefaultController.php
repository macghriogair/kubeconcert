<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function index(Request $request)
    {
        return $this->json([
            'message' => 'Hello from Webservice, your IP is ' . $request->getClientIp()
        ]);
    }
}
