<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class SecurityController
 * @package App\Controller
 * @Route("/api", name="api_security_")
 */
class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="login", methods={"POST"})
     */
    public function login(): Response
    {
        $user = $this->getUser();

        if (!$user)
        {
            return $this->json([
                'showLogin' => true
            ], 300);
        }
        else
        {
            return $this->json([
                'message' => 'Vous êtes maintenant connecté.'
            ], 200);
        }
    }

    /**
     * @return Response
     * @Route(
     *     "/logout",
     *     name="logout"
     * )
     */
    public function logout(): Response
    {
        return $this->json([
            'message' => 'Vous avez été déconnecté.'
        ]);
    }
}
