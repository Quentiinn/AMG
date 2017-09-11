<?php

namespace AppBundle\Controller;

use ContratBundle\Form\ContratType;
use ContratBundle\Entity\Contrat;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Response;

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


            $session = $this->get('session');
            $session->getFlashBag()->add('success' , 'Le contrat a bien été crée');
            return $this->redirect('home');
        }

        $formView = $form->createView();

        return $this->render('Contrat/AddContrat.html.twig' , array('form' => $formView));
    }

    /**
     * @Route("/pdfContrat", name="pdfContrat")
     */
    public function pdf(Request $request)
    {
        //je récupere l'id du contrat
        $id = $request->query->get('id');
        /****************************  PREMIERE PAGE ****************************/
        $pdf = new \FPDF();
        $pdf->AddPage();
        $pdf->SetMargins(0,0,0);
        $pdf->SetAutoPageBreak(false,0);
        $pdf->Image('img/contrat1.jpg',0,0, 210 , 297);
        $pdf->SetFont('Arial' , null , 11);
        //permet de recuperer les informations du contrat
        $contrat = $this->getDoctrine()
            ->getRepository('ContratBundle:Contrat')
            ->find($id);
        $pdf->SetXY(42 , 58);
        $pdf->Cell(0 , 0, $contrat->getNomNaissance());
        $pdf->SetX(100);
        $pdf->Cell(0 , 0, $contrat->getNomUsage());
        $pdf->SetX(155);
        $pdf->Cell(0 , 0, $contrat->getPrenom());

        //Adresse
        $pdf->SetXY(28, 64);
        $pdf->Cell(0,0 , $contrat->getAdresse());


        //Ville
        $pdf->SetXY(88 , 70.5);
        $pdf->Cell(0,0 , $contrat->getVille());

        //Code postal
        $pdf->setXY(173 , 70.5);
        $pdf->Cell(0,0, $contrat->getcode());

        //En qualité de
        $pdf->setY(77.5);
        if ($contrat->getEnQualite() == 1){
            $pdf->setX(36.5);
        }elseif($contrat->getEnQualite() == 2){
            $pdf->setX(51.2);
        }elseif($contrat->getEnQualite() == 3){
            $pdf->setX(66.8);
        }elseif($contrat->getEnQualite() == 4){
            $pdf->setX(84);
        }
        $pdf->Cell(0,0,'x');

        //Numéro de téléphone
        $pdf->setXY(133 , 77);
        $pdf->Cell(0,0,$contrat->getTel());

        //Numero URSSAF
        $pdf->setXY(50.7,85.4);
        $pdf->Cell(0,0, $contrat->getNumero());



        /****************************  PARTIE SALARIE ****************************/




        /****************************  PARTIE ENFANT ****************************/

        //Nom enfant
        $pdf->setXY(25,204.5);
        $pdf->Cell(0,0, $contrat->getNomEnfant());
        
        //Prenom enfant
        $pdf->SetX(92);
        $pdf->Cell(0,0,$contrat->getPrenomEnfant());

        $date = date_parse($contrat->getDateNaissance()->format('Y-m-d H:i:s'));
        //Date de naissance jour
        $pdf->setXY(158 , 205);
        if($date['day'] < 10){
            $pdf->Cell(0,0,'0'.$date['day']);
        }else{
            $pdf->Cell(0,0,$date['day']);
        }


        //Mois
        $pdf->setX(169);
        if($date['month'] < 10){
            $pdf->Cell(0,0,'0'.$date['month']);
        }else{
            $pdf->Cell(0,0,$date['month']);
        }

        //Année
        $pdf->SetX(180);
        $pdf->Cell(0,0, $date['year']);
        
        
        //Date effet du contrat
        //Jour
        $dateEffet = date_parse($contrat->getDateEffetContrat()->format('Y-m-d H:i:s'));
        $pdf->SetXY(158 , 212);
        if($dateEffet['day'] < 10){
            $pdf->Cell(0,0, '0'.$dateEffet['day']);
        }else{
            $pdf->Cell(0,0, $dateEffet['day']);
        }

        //Mois
        $pdf->SetX(169);
        if ($dateEffet['month'] < 10){
            $pdf->Cell(0,0, '0'.$dateEffet['month']);
        }else{
            $pdf->Cell(0,0, $dateEffet['month']);
        }

        //Année
        $pdf->SetX(180);
        $pdf->Cell(0,0, $dateEffet['year']);

        //periode essai
        $pdf->setXY(30 , 225);
        $pdf->Cell(0,0, $contrat->getDureePeriodeEssai().' jours');

        //Horaire hebdomadaire
        $pdf->setXY(83 , 244);
        $pdf->Cell(0,0 , $contrat->getNbHeures());

        //jour de repos hebdomadaire
        $pdf->SetXY(65 , 272.2);
        $pdf->Cell(0,0 , $contrat->getJourRepos());

        //Panning mensuel
        $pdf->SetXY(65 , 278.5);
        if($contrat->getIsMensuel() == 1){
            $pdf->Cell(0,0, 'Oui');
        }else{
            $pdf->Cell(0,0, 'Non');
        }


        /****************************  DEUXIEME PAGE ****************************/

        $pdf->AddPage();
        $pdf->Image('img/contrat2.jpg',0,0, 210 , 297);

        //Nombre de semaine
        $pdf->setXY(100 , 17);
        $pdf->Cell(0,0,$contrat->getNbSemaines());

        //Salaire horaire de base
        $pdf->setXY(70 , 43);
        $pdf->Cell(0,0, $contrat->getSalaireBrut());

        $pdf->SetX(160);
        $pdf->Cell(0,0,$contrat->getSalaireNet());

        //Salaire mensuel de base
        if ($contrat->getAccueil() == 1){
            $pdf->SetXY(38 , 70);
            $pdf->Cell(0,0, $contrat->getSalaireMensuelBrut());
            $pdf->SetX(75);
            $pdf->Cell(0,0, $contrat->getSalaireMenseulleNet());
        }else if($contrat->getAccueil() == 2){
            $pdf->SetXY(130 , 70);
            $pdf->Cell(0,0, $contrat->getSalaireMensuelBrut());
            $pdf->SetX(168);
            $pdf->Cell(0,0, $contrat->getSalaireMenseulleNet());
        }else if($contrat->getAccueil() == 3){
            $pdf->SetXY(100 , 80);
            $pdf->Cell(0,0, $contrat->getSalaireMensuelBrut());
            $pdf->SetX(168);
            $pdf->Cell(0,0, $contrat->getSalaireMenseulleNet());
        }

        //majoration

        $pdf->SetXY(128 , 90.5);
        $pdf->Cell(0,0,$contrat->getMontantMajoration());

        $pdf->SetX(177);
        $pdf->Cell(0,0,$contrat->getSalaireHoraireMajore());

        //date de paiement du salaire
        $pdf->SetXY(70, 97);

        $datePaiement = date_parse($contrat->getDatePaiementSalaire()->format('Y-m-d H:i:s'));
        $pdf->Cell(0,0,$datePaiement['day'].'/'.$datePaiement['month'].'/'.$datePaiement['year']);
        $datePrevenance = date_parse($contrat->getDelaiPrevenanceConge()->format('Y-m-d H:i:s'));
        //delai prevenance fixation date de congé
        $pdf->SetXY(107 , 130.5);
        $pdf->Cell(0,0,$datePrevenance['day'].'/'.$datePrevenance['month'].'/'.$datePrevenance['year']);


        return new Response($pdf->Output() , 200 , array(
           'Content-Type' => 'application/pdf'
       ));
    }

}
