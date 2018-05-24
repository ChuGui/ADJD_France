<?php

namespace App\Controller;

use App\Entity\Gallery;
use App\Entity\Project;
use App\Entity\Partner;
use App\Entity\Member;
use App\Form\LoginType;
use App\Entity\User;
use App\Form\GalleryType;
use App\Form\ProjectType;
use App\Form\PartnerType;
use App\Form\MemberType;
use App\Form\UserRegistrationType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AdminController extends Controller
{
    /**
     * @Route("/administration", name="administration")
     */
    function administration(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {

        $em = $this->getDoctrine()->getManager();
        $lastProject = $em->getRepository('App:Project')->findLastProject();
        /*AJOUT D'UNE PHOTO*/
        $gallery = new Gallery();
        $formGallery = $this->createForm(GalleryType::class, $gallery);
        $formGallery->handleRequest($request);
        if ($formGallery->isSubmitted() && $formGallery->isValid()) {
            $em->persist($gallery);
            $em->flush();
            $this->addFlash('notice', "La photo à bien été rajoutée");
            return $this->redirectToRoute('administration');
        }
        /*AJOUT D'UN PROJET*/
        $project = new Project();
        $formProject = $this->createForm(ProjectType::class, $project);
        $formProject->handleRequest($request);
        if ($formProject->isSubmitted() && $formProject->isValid()) {
            $em->persist($project);
            $em->flush();
            $this->addFlash('notice', "Félicitation,le projet à bien été rajouté");
            return $this->redirectToRoute('administration');
        }
        /*AJOUT D'UN PARTENAIRE*/
        $partner = new Partner();
        $formPartner = $this->createForm(PartnerType::class, $partner);
        $formPartner->handleRequest($request);
        if ($formPartner->isSubmitted() && $formPartner->isValid()) {
            $em->persist($partner);
            $em->flush();
            $this->addFlash('notice', "Le partenaire à bien été rajouté");
            return $this->redirectToRoute('administration');
        }
        /*AJOUT D'UN MEMBRE*/
        $member = new Member();
        $formMember = $this->createForm(MemberType::class, $member);
        $formMember->handleRequest($request);
        if ($formMember->isSubmitted() && $formMember->isValid()) {
            $em->persist($member);
            $em->flush();
            $this->addFlash('notice', "Le nouveau membre " . $member->getName() . ", à bien été rajouté");
            return $this->redirectToRoute('administration');
        }

        /*AJOUT D'UN ADMIN*/
        $formUser = $this->createForm(UserRegistrationType::class);
        $formUser->handleRequest($request);
        if ($formUser->isSubmitted() && $formUser->isValid()) {
            /** @var User $user */
            $user = $formUser->getData();
            $em->persist($user);
            $em->flush();
            $this->addFlash('notice', "Le nouvel admin " . $user->getUsername() . ", à bien été rajouté");
            return $this->redirectToRoute('administration');
        }

        $adress = $em->getRepository('App:Text')->find(5);
        $tel = $em->getRepository('App:Text')->find(6);

        return $this->render('main/administration.html.twig', array(
            "formGallery" => $formGallery->createView(),
            "formProject" => $formProject->createView(),
            "formPartner" => $formPartner->createView(),
            "formMember" => $formMember->createView(),
            "formUser" => $formUser->createView(),
            "lastProject" => $lastProject,
            'adress' => $adress,
            'tel' => $tel
        ));
    }

    /**
     * @Route("/delete_photo", name="delete_photo")
     * @Method({"GET"})
     */
    function deletePhoto(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $photoId = $request->query->get('photoId');
            $gallery = $em->getRepository('App:Gallery')->find($photoId);
            if ($gallery !== null) {
                $em->remove($gallery);
                $em->flush();
                $response = new Response ('Photo correctement supprimée');
                return $response;
            } else {
                return new Response('Aucune gallery avec cet ID', 404);
            }
        } else {
            return $this->redirect($this->generateUrl('homepage'));
        }
    }

    /**
     * @Route("/delete_project", name="delete_project")
     * @Method({"GET"})
     */
    function deleteProject(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $projectId = $request->query->get('projectId');
            $project = $em->getRepository('App:Project')->find($projectId);
            if ($project !== null) {
                $em->remove($project);
                $em->flush();
                $response = new Response ('Projet correctement supprimé');
                return $response;
            } else {
                return new Response('Aucune gallery avec cet ID', 404);
            }
        } else {
            return $this->redirect($this->generateUrl('homepage'));
        }
    }

    /**
     * @Route("/delete_partner", name="delete_partner")
     * @Method({"GET"})
     */
    function deletePartner(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $partnerId = $request->query->get('partnerId');
            $partner = $em->getRepository('App:Partner')->find($partnerId);
            if ($partner !== null) {
                $em->remove($partner);
                $em->flush();
                $response = new Response ('Partenaire correctement supprimé');
                return $response;
            } else {
                return new Response('Aucun partenaire avec cet ID', 404);
            }
        } else {
            return $this->redirect($this->generateUrl('homepage'));
        }
    }

    /**
     * @Route("/delete_member", name="delete_member")
     * @Method({"GET"})
     */
    function deleteMember(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $memberId = $request->query->get('id');
            $Member = $em->getRepository('App:Member')->find($memberId);
            if ($Member !== null) {
                $em->remove($Member);
                $em->flush();
                $response = new Response ('Membre correctement supprimé');
                return $response;
            } else {
                return new Response('Aucun membre avec cet ID', 404);
            }
        } else {
            return $this->redirect($this->generateUrl('homepage'));
        }
    }

    /**
     * @Route("/get_text", name="get_text")
     * @Method({"GET"})
     */
    function getText(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $textId = $request->query->get('textId');
            $text = $em->getRepository('App:Text')->find($textId);
            $content = $text->getContent();
            if ($text !== null) {
                $response = new Response ($content, Response::HTTP_OK, array('content-type' => 'text/html'));
                return $response;
            } else {
                return new Response('Aucun membre avec cet ID', 404);
            }
        } else {
            return $this->redirect($this->generateUrl('homepage'));
        }
    }
}