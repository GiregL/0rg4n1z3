<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ApiController
 * @package App\Controller
 *
 * @Route("/api", name="api_")
 * @IsGranted("ROLE_USER")
 */
class ApiController extends AbstractController
{
    /**
     * @Route("/", name="api")
     */
    public function index(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ApiController.php',
        ]);
    }

    /**
     * @return Response
     * @Route("/granted", name="granted")
     * @IsGranted("ROLE_USER")
     */
    public function granted(): Response
    {
        return $this->json([
            'message' => 'Vous êtes authentifié !'
        ]);
    }
}
