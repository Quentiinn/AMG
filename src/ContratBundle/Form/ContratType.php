<?php

namespace ContratBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class ContratType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomNaissance')
            ->add('nomUsage')
            ->add('prenom' , TextType::class, array('label' => 'Prénom'))
            ->add('adresse')
            ->add('ville')
            ->add('code' , IntegerType::class , array('label' => 'Code Postal'))
            ->add('enQualite' , ChoiceType::class , array(
                'choices' => array(
                    'père' => '1',
                    'mère' => '2',
                    'tuteur' => '3',
                    'autre' => '4'
                ) , 'label' => 'En qualité de'
            ))
            ->add('tel' , TextType::class , array('label' => 'Téléphone') )
            ->add('numero' , TextType::class , array('label' => 'N° Urssaf ou Pajemploi'))
            ->add('nomEnfant')
            ->add('prenomEnfant')
            ->add('dateNaissance' ,DateType::class, array('label' => 'Date de naissance de l\'enfant ' ,  'years' => range(1990 , 2030)))
            ->add('dateEffetContrat',DateType::class, array('label' => 'Date d\'effet du contrat' , 'years' => range(1990 , 2030)))
            ->add('dureePeriodeEssai' , IntegerType::class , array('label' => 'Durée de la periode d\'essai'))
            ->add('nbHeures' , IntegerType::class , array('label' => 'Horaire hebdomadaire - nombre d\'heures'))
            ->add('jourRepos' )
            ->add('isMensuel' , CheckboxType::class , array('label' => 'Planning mensuel s\'il y a lieu'))
            ->add('nbSemaines' , IntegerType::class , array('label' => 'Nombres de semaines'))
            ->add('salaireBrut', MoneyType::class , array('label' => 'Salaire horaire brut de base'))
            ->add('salaireNet' , MoneyType::class , array('label' => 'Salaire horaire net de base'))
            ->add('accueil' , ChoiceType::class , array(
                'choices' => array(
                    'Si l\'accueil s\'effectue sur une année complète' => '1',
                    'Si l\'accueil s\'effectue sur une année incomplète' => '2',
                    'Si l\'accueil est occasionel' => '3',
                ) , 'label' => 'Salaire mensuel de base'
            ))
            ->add('salaireMenseulleNet' , MoneyType::class , array('label' => 'Salaire mensuel net'))
            ->add('salaireMensuelBrut' , MoneyType::class , array('label' => 'Salaire mensuel brut'))
            ->add('salaireHoraireMajore' , MoneyType::class , array('label' => 'Salaire horaire majoré'))
            ->add('datePaiementSalaire' , DateType::class , array('label' => 'Date de paiement du salaire'))
            ->add('delaiPrevenanceConge' , DateType::class , array('label' => 'Péciser le délai de prévenace de fixation des dates de congés'))
            ->add('montantMajoration')
            ->add('modaliteCongePayes')
            ->add('prixIndemnite')
            ->add('repasFournis')
            ->add('save', SubmitType::class, array('label' => 'Ajout d\'un contrat'));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ContratBundle\Entity\Contrat'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'contratbundle_contrat';
    }


}
