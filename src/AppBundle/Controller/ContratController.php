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
        //array(user) permet de faire passer les informations dans le form afin de l'utiliser dans la création du formulaire
        $form = $this->createForm(ContratType::class , $contrat , array('user' => $this->getUser()) );

        $form->handleRequest($request);
        if ($form->isSubmitted()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($contrat);
            $em->flush();

            return $this->redirect('home');
        }

        $formView = $form->createView();

        return $this->render('Contrat/AddContrat.html.twig' , array('form' => $formView));
    }

}
