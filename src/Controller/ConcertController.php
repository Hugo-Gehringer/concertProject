<?php

namespace App\Controller;


use App\Entity\Concert;
use App\Form\ConcertType;

use DateTime;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConcertController extends AbstractController

{
    /**
     * Affiche seulement les futures concerts pour la page d'acceuil
     * @Route("/", name="homepage")
     */
    public function showAllFuture(): Response
    {
        $shows= $this->getDoctrine()->getRepository(Concert::class)->findAll();
        $futureShows=array();
        foreach ($shows as $show)
        {
            if (new DateTime("now")<$show->getDate() ){
                $futureShows[]=$show;
            }
        }
        return $this->render('concert/futureConcert.html.twig', [
                'futureshows' => $futureShows
            ]
        );
    }

    /**
     * Affiche tout les concerts
     * @Route("/concerts", name="concerts")
     */
    public function showAll(): Response
    {
        $shows= $this->getDoctrine()->getRepository(Concert::class)->findAll();

        return $this->render('concert/CRUDConcert.html.twig', [
                'concerts' => $shows
            ]
        );
    }


    /**
     * Affiche une liste de concerts
     *
     * @param int $id
     * @return Response
     *
     * @Route("/concert/{id}", name="concert_show")
     */
    public function list(int $id): Response
    {
        $repository = $this->getDoctrine()->getRepository(Concert::class);

        return $this->render('concert/show.html.twig', [
                'show' => $repository->find($id)
            ]
        );
    }



    /**
     * Affiche seulement les anciens
     * @Route("/ancienConcerts", name="ancienConcert")
     */
    public function showAllPast(): Response
    {
        $shows= $this->getDoctrine()->getRepository(Concert::class)->findBy([],['date' => 'ASC']);
        $pastShows=array();
        foreach ($shows as $show)
        {
            if (new DateTime("now")>$show->getDate() ){
                $pastShows[]=$show;
            }
        }
        return $this->render('concert/pastConcert.html.twig', [
                'pastshows' => $pastShows
            ]
        );
    }

    /**
     * Crée un nouveau Concert
     * @param Request $request
     * @return Response
     *
     * @Route("/concertCreate/new", name="concert_new",methods={"GET","POST"})
     */
    public function createConcert(Request $request): Response
    {

        $show=new Concert();
        $form=$this->createForm(ConcertType::class, $show);
        $form->handleRequest($request);

        if ($form->isSubmitted()&&$form->isValid()){
            $show=$form->getData();

            $entityManager=$this->getDoctrine()->getManager();
            $entityManager->persist($show);
            $entityManager->flush();
            $this->addFlash('success','Concert créée');
            return $this->redirectToRoute('homepage');
        }
        return $this->render('concert/newConcert.html.twig',[
            'form'=>$form->createView()
        ]);

    }

    /**
     *
     * Suppression d'un concert
     * @param Concert $concert
     * @return Response
     * @Route ("/delete/{id}",name="concert_delete")
     *
     */
    public function deleteConcert(Request $request,Concert $concert): Response
    {
        $entityManager=$this->getDoctrine()->getManager();
        $entityManager->remove($concert);
        $entityManager->flush();

        return $this->redirectToRoute('concerts');
    }

    /**
     * Update un Concert
     * @param Request $request
     * @param Concert $concert
     * @return Response
     *
     * @Route("/concert/edit/{id}", name="concert_update",methods={"GET","POST"})
     */
    public function updateConcert(Request $request,Concert $concert): Response
    {

        $form=$this->createForm(ConcertType::class, $concert);
        $form->handleRequest($request);

        if ($form->isSubmitted()&&$form->isValid()){
            $show=$form->getData();

            $entityManager=$this->getDoctrine()->getManager();
            $entityManager->persist($show);
            $entityManager->flush();
            $this->addFlash('success','Concert Modifié');
            return $this->redirectToRoute('concerts');
        }
        return $this->render('concert/newConcert.html.twig',[
            'form'=>$form->createView()
        ]);

    }

}
