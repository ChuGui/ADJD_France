<?php

namespace App\Controller;

use App\Entity\Project;
use App\Entity\Partner;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    function homepage() {
        $em = $this->getDoctrine()->getManager();
        $lastProject = $em->getRepository('App:Project')->findLastProject();
        return $this->render('main/homepage.html.twig', array(
            'lastProject' => $lastProject
        ));
    }

    /**
     * @Route("/projets", name="projects")
     */
    function projects() {
        $em = $this->getDoctrine()->getManager();
        $projects = $em->getRepository(Project::class)->findAllDescDate();
        $lastProject = $em->getRepository('App:Project')->findLastProject();
        return $this->render('main/projects.html.twig', array(
            'projects' => $projects,
            'lastProject' => $lastProject
        ));
    }

    /**
     * @Route("/projet/{id}", name="project", requirements={"id" = "\d+"}, defaults={"id" = 1})
     */
    function project($id) {
        $em = $this->getDoctrine()->getManager();
        $project = $em->getRepository(Project::class)->find($id);
        $lastProject = $em->getRepository('App:Project')->findLastProject();
        return $this->render('main/project.html.twig', array(
            'project' => $project,
            'lastProject' => $lastProject
        ));
    }

    /**
     * @Route("/partenaires", name="partners")
     */
    function partners() {

        $em = $this->getDoctrine()->getManager();
        $partners = $em->getRepository(Partner::class)->findAll();
        $lastProject = $em->getRepository('App:Project')->findLastProject();
        return $this->render('main/partners.html.twig', array(
            'partners' => $partners,
            'lastProject' => $lastProject
        ));
    }

    /**
     * @Route("/photos", name="photos")
     */
    function photos() {
        $em = $this->getDoctrine()->getManager();
        $galleries = $em->getRepository('App:Gallery')->findAll();
        $lastProject = $em->getRepository('App:Project')->findLastProject();
        return $this->render('main/photos.html.twig', array(
          'galleries' => $galleries,
            'lastProject' => $lastProject
        ));

    }


    /**
     * @Route("/aidez-nous", name="help_us")
     */
    function helpUs() {
        $em = $this->getDoctrine()->getManager();
        $lastProject = $em->getRepository('App:Project')->findLastProject();
        return $this->render('main/help_us.html.twig', array(
            'lastProject' => $lastProject
        ));
    }

    /**
     * @Route("/a-propos", name="a_propos")
     */
    function aPropos() {
        $em = $this->getDoctrine()->getManager();
        $members = $em->getRepository('App:Member')->findAll();
        $lastProject = $em->getRepository('App:Project')->findLastProject();
        return $this->render('main/a_propos.html.twig', array(
            'members' => $members,
            'lastProject' => $lastProject
        ));
    }

    /**
     * @Route("/faq", name="faq")
     */
    function faq() {
        $em = $this->getDoctrine()->getManager();
        $lastProject = $em->getRepository('App:Project')->findLastProject();
        return $this->render('main/faq.html.twig', array(
            'lastProject' => $lastProject
        ));
    }

    /**
     * @Route("/contact", name="contact")
     */
    function contact() {
        $em = $this->getDoctrine()->getManager();
        $lastProject = $em->getRepository('App:Project')->findLastProject();
        return $this->render('main/contact.html.twig', array(
            'lastProject' => $lastProject
        ));
    }

    /**
     * @Route("/collect_projects_dates", name="collect_projects_dates")
     * @Method({"GET"})
     */
    /*function donation(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $dates = $em->getRepository("App:Project")->findAllDescDate();
        if($dates !=null){
            $jsonContent = $this->get('jms_serializer')->serialize($dates, 'json', SerializationContext::create()->setGroups(array('project_datepicker')));
            $response = new JsonResponse($jsonContent);
            $response->header->set('Content-Type','json');
            return $response;
        } else {
            $response = new Response('pas de projets trouvés');
            $response->setStatusCode('404');
            return $response;
        }
        return $this->redirectToRoute('help_us');
    }*/
}