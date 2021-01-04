<?php

namespace App\Controller;

use App\Entity\Member;
use App\Form\MemberType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Annotation\Route;

class MemberController extends AbstractController
{


    /**
     * Affiche une liste de bands
     *
     * @return Response
     *
     * @Route("/members", name="members_CRUD")
     */
    public function membersAll(): Response
    {
        $members= $this->getDoctrine()->getRepository(Member::class)->findAll();
        return $this->render('member/CRUDMember.html.twig', [
                'members' => $members
            ]
        );
    }





    /**
     * Crée un nouveau membre
     * @param Request $request
     * @return Response
     *
     * @Route("/memberCreate/new", name="member_new",methods={"GET","POST"})
     */
    public function createMember(Request $request): Response
    {
        $member=new Member();
        $form=$this->createForm(MemberType::class, $member);
        $form->handleRequest($request);

        if ($form->isSubmitted()&&$form->isValid()){
            $member=$form->getData();

            $entityManager=$this->getDoctrine()->getManager();
            $entityManager->persist($member);
            $entityManager->flush();
            $this->addFlash('success','Concert créée');
            return $this->redirectToRoute('members_CRUD');
        }
        return $this->render('member/newMember.html.twig',[
            'form'=>$form->createView()
        ]);

    }

    /**
     *
     * Suppression d'un membre
     * @param Member $member
     * @return Response
     * @Route ("/member/delete/{id}",name="member_delete")
     *
     */
    public function deleteMembre(Request $request,Member $member): Response
    {
        $entityManager=$this->getDoctrine()->getManager();
        $entityManager->remove($member);
        $entityManager->flush();

        return $this->redirectToRoute('members_CRUD');
    }

    /**
     * Update un membre
     * @param Request $request
     * @param Member $member
     * @return Response
     *
     * @Route("/member/edit/{id}", name="member_update",methods={"GET","POST"})
     */
    public function updateMember(Request $request,Member $member): Response
    {

        $form=$this->createForm(MemberType::class, $member);
        $form->handleRequest($request);

        if ($form->isSubmitted()&&$form->isValid()){
            $show=$form->getData();

            $entityManager=$this->getDoctrine()->getManager();
            $entityManager->persist($show);
            $entityManager->flush();
            $this->addFlash('success','membre Modifié');
            return $this->redirectToRoute('members_CRUD');
        }
        return $this->render('member/newMember.html.twig',[
            'form'=>$form->createView()
        ]);

    }
}
