<?php

namespace AppBundle\Controller;

use ContratBundle\Form\ContratType;
use ContratBundle\Entity\Contrat;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ContratController extends Controller
{

    /**
     * @Route("/addContrat", name="addContrat")
     */
    public function addContrat(Request $request)
    {
        $contrat = new Contrat();

        $form = $this->createForm(ContratType::class , $contrat);

        $form->handleRequest($request);
        if ($form->isSubmitted()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($contrat);
            $em->flush();
        }

        $formView = $form->createView();

        return $this->render('Contrat/AddContrat.html.twig' , array('form' => $formView));
    }
}
