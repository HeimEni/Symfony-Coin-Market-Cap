<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Services\ApiService;

class IndexController extends AbstractController
{
    #[Route('/index', name: 'app_index')]
    public function index(ApiService $apiService): Response
    {
        return $this->render('index/index.html.twig', [
            $apiService->test(),
            'controller_name' => 'IndexController',
        ]);
    }
    #[Route('/', name: 'app_index')]
    public function test(ApiService $apiService): Response
    {
        return $this->render('index/index.html.twig', [
            "datas" => $apiService->test(),
        ]);
    }
}
