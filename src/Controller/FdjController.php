<?php

namespace App\Controller;

use App\Service\FdjService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FdjController extends AbstractController
{
    /**
     * @Route("/fdj", name="fdj")
     */
    public function index(FdjService $fdjService): Response
    {
        //call methode fetchFdjApi to service 
        $data = $fdjService->fetchFdjApi();
        
        return $this->render('fdj/index.html.twig', [
            'data' => $data,
        ]);
    }
}
