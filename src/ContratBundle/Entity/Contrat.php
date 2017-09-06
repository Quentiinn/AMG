<?php

namespace ContratBundle\Entity;

/**
 * Contrat
 */
class Contrat
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nomNaissance;

    /**
     * @var string
     */
    private $nomUsage;

    /**
     * @var string
     */
    private $prenom;

    /**
     * @var string
     */
    private $adresse;

    /**
     * @var string
     */
    private $ville;

    /**
     * @var bool
     */
    private $enQualite;

    /**
     * @var string
     */
    private $tel;

    /**
     * @var string
     */
    private $numero;

    /**
     * @var string
     */
    private $nomEnfant;

    /**
     * @var string
     */
    private $prenomEnfant;

    /**
     * @var \DateTime
     */
    private $dateNaissance;

    /**
     * @var \DateTime
     */
    private $dateEffetContrat;

    /**
     * @var int
     */
    private $dureePeriodeEssai;

    /**
     * @var int
     */
    private $nbHeures;

    /**
     * @var int
     */
    private $jourRepos;

    /**
     * @var bool
     */
    private $isMensuel;

    /**
     * @var int
     */
    private $nbSemaines;

    /**
     * @var float
     */
    private $salaireBrut;

    /**
     * @var float
     */
    private $salaireNet;

    /**
     * @var float
     */
    private $salaireMenseulleNet;

    /**
     * @var int
     */
    private $modaliteCongePayes;

    /**
     * @var float
     */
    private $prixIndemnite;

    /**
     * @var int
     */
    private $repasFournis;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomNaissance
     *
     * @param string $nomNaissance
     *
     * @return Contrat
     */
    public function setNomNaissance($nomNaissance)
    {
        $this->nomNaissance = $nomNaissance;

        return $this;
    }

    /**
     * Get nomNaissance
     *
     * @return string
     */
    public function getNomNaissance()
    {
        return $this->nomNaissance;
    }

    /**
     * Set nomUsage
     *
     * @param string $nomUsage
     *
     * @return Contrat
     */
    public function setNomUsage($nomUsage)
    {
        $this->nomUsage = $nomUsage;

        return $this;
    }

    /**
     * Get nomUsage
     *
     * @return string
     */
    public function getNomUsage()
    {
        return $this->nomUsage;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Contrat
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Contrat
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Contrat
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set enQualite
     *
     * @param boolean $enQualite
     *
     * @return Contrat
     */
    public function setEnQualite($enQualite)
    {
        $this->enQualite = $enQualite;

        return $this;
    }

    /**
     * Get enQualite
     *
     * @return bool
     */
    public function getEnQualite()
    {
        return $this->enQualite;
    }

    /**
     * Set tel
     *
     * @param string $tel
     *
     * @return Contrat
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set numero
     *
     * @param string $numero
     *
     * @return Contrat
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return string
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set nomEnfant
     *
     * @param string $nomEnfant
     *
     * @return Contrat
     */
    public function setNomEnfant($nomEnfant)
    {
        $this->nomEnfant = $nomEnfant;

        return $this;
    }

    /**
     * Get nomEnfant
     *
     * @return string
     */
    public function getNomEnfant()
    {
        return $this->nomEnfant;
    }

    /**
     * Set prenomEnfant
     *
     * @param string $prenomEnfant
     *
     * @return Contrat
     */
    public function setPrenomEnfant($prenomEnfant)
    {
        $this->prenomEnfant = $prenomEnfant;

        return $this;
    }

    /**
     * Get prenomEnfant
     *
     * @return string
     */
    public function getPrenomEnfant()
    {
        return $this->prenomEnfant;
    }

    /**
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     *
     * @return Contrat
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set dateEffetContrat
     *
     * @param \DateTime $dateEffetContrat
     *
     * @return Contrat
     */
    public function setDateEffetContrat($dateEffetContrat)
    {
        $this->dateEffetContrat = $dateEffetContrat;

        return $this;
    }

    /**
     * Get dateEffetContrat
     *
     * @return \DateTime
     */
    public function getDateEffetContrat()
    {
        return $this->dateEffetContrat;
    }

    /**
     * Set dureePeriodeEssai
     *
     * @param integer $dureePeriodeEssai
     *
     * @return Contrat
     */
    public function setDureePeriodeEssai($dureePeriodeEssai)
    {
        $this->dureePeriodeEssai = $dureePeriodeEssai;

        return $this;
    }

    /**
     * Get dureePeriodeEssai
     *
     * @return int
     */
    public function getDureePeriodeEssai()
    {
        return $this->dureePeriodeEssai;
    }

    /**
     * Set nbHeures
     *
     * @param integer $nbHeures
     *
     * @return Contrat
     */
    public function setNbHeures($nbHeures)
    {
        $this->nbHeures = $nbHeures;

        return $this;
    }

    /**
     * Get nbHeures
     *
     * @return int
     */
    public function getNbHeures()
    {
        return $this->nbHeures;
    }

    /**
     * Set jourRepos
     *
     * @param integer $jourRepos
     *
     * @return Contrat
     */
    public function setJourRepos($jourRepos)
    {
        $this->jourRepos = $jourRepos;

        return $this;
    }

    /**
     * Get jourRepos
     *
     * @return int
     */
    public function getJourRepos()
    {
        return $this->jourRepos;
    }

    /**
     * Set isMensuel
     *
     * @param boolean $isMensuel
     *
     * @return Contrat
     */
    public function setIsMensuel($isMensuel)
    {
        $this->isMensuel = $isMensuel;

        return $this;
    }

    /**
     * Get isMensuel
     *
     * @return bool
     */
    public function getIsMensuel()
    {
        return $this->isMensuel;
    }

    /**
     * Set nbSemaines
     *
     * @param integer $nbSemaines
     *
     * @return Contrat
     */
    public function setNbSemaines($nbSemaines)
    {
        $this->nbSemaines = $nbSemaines;

        return $this;
    }

    /**
     * Get nbSemaines
     *
     * @return int
     */
    public function getNbSemaines()
    {
        return $this->nbSemaines;
    }

    /**
     * Set salaireBrut
     *
     * @param float $salaireBrut
     *
     * @return Contrat
     */
    public function setSalaireBrut($salaireBrut)
    {
        $this->salaireBrut = $salaireBrut;

        return $this;
    }

    /**
     * Get salaireBrut
     *
     * @return float
     */
    public function getSalaireBrut()
    {
        return $this->salaireBrut;
    }

    /**
     * Set salaireNet
     *
     * @param float $salaireNet
     *
     * @return Contrat
     */
    public function setSalaireNet($salaireNet)
    {
        $this->salaireNet = $salaireNet;

        return $this;
    }

    /**
     * Get salaireNet
     *
     * @return float
     */
    public function getSalaireNet()
    {
        return $this->salaireNet;
    }

    /**
     * Set salaireMenseulleNet
     *
     * @param float $salaireMenseulleNet
     *
     * @return Contrat
     */
    public function setSalaireMenseulleNet($salaireMenseulleNet)
    {
        $this->salaireMenseulleNet = $salaireMenseulleNet;

        return $this;
    }

    /**
     * Get salaireMenseulleNet
     *
     * @return float
     */
    public function getSalaireMenseulleNet()
    {
        return $this->salaireMenseulleNet;
    }

    /**
     * Set modaliteCongePayes
     *
     * @param integer $modaliteCongePayes
     *
     * @return Contrat
     */
    public function setModaliteCongePayes($modaliteCongePayes)
    {
        $this->modaliteCongePayes = $modaliteCongePayes;

        return $this;
    }

    /**
     * Get modaliteCongePayes
     *
     * @return int
     */
    public function getModaliteCongePayes()
    {
        return $this->modaliteCongePayes;
    }

    /**
     * Set prixIndemnite
     *
     * @param float $prixIndemnite
     *
     * @return Contrat
     */
    public function setPrixIndemnite($prixIndemnite)
    {
        $this->prixIndemnite = $prixIndemnite;

        return $this;
    }

    /**
     * Get prixIndemnite
     *
     * @return float
     */
    public function getPrixIndemnite()
    {
        return $this->prixIndemnite;
    }

    /**
     * Set repasFournis
     *
     * @param integer $repasFournis
     *
     * @return Contrat
     */
    public function setRepasFournis($repasFournis)
    {
        $this->repasFournis = $repasFournis;

        return $this;
    }

    /**
     * Get repasFournis
     *
     * @return int
     */
    public function getRepasFournis()
    {
        return $this->repasFournis;
    }
}

