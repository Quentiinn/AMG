<?php

namespace ContratBundle\Form;

use Symfony\Component\Form\AbstractType;
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
            ->add('prenom')
            ->add('adresse')
            ->add('ville')
            ->add('enQualite')
            ->add('tel')
            ->add('numero')
            ->add('nomEnfant')
            ->add('prenomEnfant')
            ->add('dateNaissance')
            ->add('dateEffetContrat')
            ->add('dureePeriodeEssai')
            ->add('nbHeures')
            ->add('jourRepos')
            ->add('isMensuel')
            ->add('nbSemaines')
            ->add('salaireBrut')
            ->add('salaireNet')
            ->add('salaireMenseulleNet')
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
