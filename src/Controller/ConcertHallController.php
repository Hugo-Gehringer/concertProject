<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConcertHallController extends AbstractController
{

    /**
     * Affiche le hall de concert
     *
     *
     * @return Response
     *
     * @Route("/footer", name="footer")
     */
    public function hall()
    {
        $repository = $this->getDoctrine()->getRepository(ConcertHallController::class);
        return $this->render('footer.html.twig', [
                'concerthall' => $repository->find(1)
            ]
        );
    }
}
