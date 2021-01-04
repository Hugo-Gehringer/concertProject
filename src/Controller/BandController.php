<?php

namespace App\Controller;

use App\Entity\Band;

use App\Form\BandType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
class BandController extends AbstractController
{

    /**
     * Affiche une liste de bands
     *
     * @return Response
     *
     * @Route("/bands", name="bands_list")
     */
    public function bandsAll(): Response
    {
        $bands= $this->getDoctrine()->getRepository(Band::class)->findAll();
        return $this->render('band/bands.html.twig', [
                'bands' => $bands
            ]
        );
    }

    /**
     * Affiche une liste de bands pour le CRUD
     *
     * @return Response
     *
     * @Route("/bandsCRUD", name="bands_list_CRUD")
     */
    public function bandsAllCRUD(): Response
    {
        $bands= $this->getDoctrine()->getRepository(Band::class)->findAll();
        return $this->render('band/CRUDBand.html.twig', [
                'bands' => $bands
            ]
        );
    }


    /**
     * Affiche un groupe
     *
     * @param int $id
     * @return Response
     *
     * @Route("/band/{id}", name="band_show")
     */
    public function list(int $id): Response
    {
        $repository = $this->getDoctrine()->getRepository(Band::class);

        return $this->render('band/band.html.twig', [
                'band' => $repository->find($id)
            ]
        );
    }

    /**
     * Crée un nouveau Groupe
     * @param Request $request
     * @return Response
     *
     * @Route("/bandCreate/new", name="band_new",methods={"GET","POST"})
     */
    public function createBand(Request $request): Response
    {

        $band=new Band();
        $form=$this->createForm(BandType::class, $band);
        $form->handleRequest($request);

        if ($form->isSubmitted()&&$form->isValid()){
            $band=$form->getData();

            $entityManager=$this->getDoctrine()->getManager();
            $entityManager->persist($band);
            $entityManager->flush();
            $this->addFlash('success','Groupe crée');
            return $this->redirectToRoute('bands_list_CRUD');
        }
        return $this->render('band/newBand.html.twig',[
            'form'=>$form->createView()
        ]);

    }

    /**
     *
     * Suppression d'un concert
     * @param Request $request
     * @param Band $band
     * @return Response
     * @Route ("/band/delete/{id}",name="band_delete")
     */
    public function deleteBand(Request $request,Band $band): Response
    {
        $entityManager=$this->getDoctrine()->getManager();
        $entityManager->remove($band);
        $entityManager->flush();

        return $this->redirectToRoute('bands_list_CRUD');
    }

    /**
     * Update un Concert
     * @param Request $request
     * @param Band $band
     * @return Response
     *
     * @Route("/band/edit/{id}", name="band_update",methods={"GET","POST"})
     */
    public function updateBand(Request $request,Band $band): Response
    {

        $form=$this->createForm(BandType::class, $band);
        $form->handleRequest($request);

        if ($form->isSubmitted()&&$form->isValid()){
            $show=$form->getData();

            $entityManager=$this->getDoctrine()->getManager();
            $entityManager->persist($show);
            $entityManager->flush();
            $this->addFlash('success','Concert Modifié');
            return $this->redirectToRoute('bands_list_CRUD');
        }
        return $this->render('band/newBand.html.twig',[
            'form'=>$form->createView()
        ]);

    }
}
