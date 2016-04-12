<?php

namespace MonbonHLM\DashboardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Annonce
 *
 * @ORM\Table(name="annonce")
 * @ORM\Entity(repositoryClass="MonbonHLM\DashboardBundle\Repository\AnnonceRepository")
 */
class Annonce
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="reference_locataire", type="string", length=255)
     */
    private $reference_locataire;

    /**
     * @ORM\OneToOne(targetEntity="Bailleur", cascade={"persist"})
     * @ORM\JoinColumn(name="bailleur", referencedColumnName="id")
     **/
    private $reference_bailleur;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;


    /**
     * @ORM\OneToOne(targetEntity="Quartier", cascade={"persist"})
     * @ORM\JoinColumn(name="quartier", referencedColumnName="id")
     **/
    private $quartier;

    /**
     * @ORM\OneToOne(targetEntity="CodePostal", cascade={"persist"})
     * @ORM\JoinColumn(name="codepostal", referencedColumnName="id")
     **/
    private $code_postal;

    /**
     * @var string
     *
     * @ORM\Column(name="etage", type="string", length=255)
     */
    private $etage;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_logement", type="string", length=255)
     */
    private $numero_logement;

    /**
     * @var string
     *
     * @ORM\Column(name="description_complementaire", type="text", length=255)
     */
    private $description_complementaire;

    /**
     * @ORM\OneToOne(targetEntity="Photos_logement", cascade={"persist"})
     * @ORM\JoinColumn(name="photos", referencedColumnName="id")
     **/
    private $photos_logement;

    /**
     * @ORM\OneToOne(targetEntity="TypeLogement", cascade={"persist"})
     * @ORM\JoinColumn(name="type_logement", referencedColumnName="id")
     **/
    private $type_logement;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getReferenceLocataire()
    {
        return $this->reference_locataire;
    }

    /**
     * @param string $reference_locataire
     */
    public function setReferenceLocataire($reference_locataire)
    {
        $this->reference_locataire = $reference_locataire;
    }

    /**
     * @return string
     */
    public function getReferenceBailleur()
    {
        return $this->reference_bailleur;
    }

    /**
     * @param string $reference_bailleur
     */
    public function setReferenceBailleur($reference_bailleur)
    {
        $this->reference_bailleur = $reference_bailleur;
    }

    /**
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param string $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return mixed
     */
    public function getQuartier()
    {
        return $this->quartier;
    }

    /**
     * @param mixed $quartier
     */
    public function setQuartier($quartier)
    {
        $this->quartier = $quartier;
    }

    /**
     * @return string
     */
    public function getCodePostal()
    {
        return $this->code_postal;
    }

    /**
     * @param string $code_postal
     */
    public function setCodePostal($code_postal)
    {
        $this->code_postal = $code_postal;
    }

    /**
     * @return string
     */
    public function getNumeroLogement()
    {
        return $this->numero_logement;
    }

    /**
     * @param string $numero_logement
     */
    public function setNumeroLogement($numero_logement)
    {
        $this->numero_logement = $numero_logement;
    }

    /**
     * @return string
     */
    public function getEtage()
    {
        return $this->etage;
    }

    /**
     * @param string $etage
     */
    public function setEtage($etage)
    {
        $this->etage = $etage;
    }

    /**
     * @return string
     */
    public function getDescriptionComplementaire()
    {
        return $this->description_complementaire;
    }

    /**
     * @param string $description_complementaire
     */
    public function setDescriptionComplementaire($description_complementaire)
    {
        $this->description_complementaire = $description_complementaire;
    }

    /**
     * @return mixed
     */
    public function getPhotosLogement()
    {
        return $this->photos_logement;
    }

    /**
     * @param mixed $photos_logement
     */
    public function setPhotosLogement($photos_logement)
    {
        $this->photos_logement = $photos_logement;
    }

    /**
     * @return mixed
     */
    public function getTypeLogement()
    {
        return $this->type_logement;
    }

    /**
     * @param mixed $type_logement
     */
    public function setTypeLogement($type_logement)
    {
        $this->type_logement = $type_logement;
    }


}
