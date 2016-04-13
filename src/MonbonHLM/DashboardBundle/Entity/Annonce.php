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
     * @ORM\ManyToOne(targetEntity="MonbonHLM\UserBundle\Entity\Utilisateurs")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     *
     */
    private $auteur;

    /**
     * @var string
     *
     * @ORM\Column(name="reference_locataire", type="string", length=255)
     */
    private $reference_locataire;

    /**
     * @ORM\ManyToOne(targetEntity="Bailleur", cascade={"persist"})
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
     * @ORM\ManyToOne(targetEntity="Quartier", cascade={"persist"})
     * @ORM\JoinColumn(name="quartier", referencedColumnName="id")
     **/
    private $quartier;

    /**
     * @ORM\ManyToOne(targetEntity="CodePostal", cascade={"persist"})
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
     * @ORM\OneToOne(targetEntity="PhotoPrincipal", cascade={"persist"})
     * @ORM\JoinColumn(name="photoP", referencedColumnName="id")
     **/
    private $photo_principal;

    /**
     * @ORM\OneToOne(targetEntity="Photo2", cascade={"persist"})
     * @ORM\JoinColumn(name="photo2", referencedColumnName="id")
     **/
    private $photo_2;

    /**
     * @ORM\OneToOne(targetEntity="Photo3", cascade={"persist"})
     * @ORM\JoinColumn(name="photo3", referencedColumnName="id")
     **/
    private $photo_3;

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
     * @return mixed
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * @param mixed $auteur
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;
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
    public function getPhotoPrincipal()
    {
        return $this->photo_principal;
    }

    /**
     * @param mixed $photo_principal
     */
    public function setPhotoPrincipal($photo_principal)
    {
        $this->photo_principal = $photo_principal;
    }

    /**
     * @return mixed
     */
    public function getPhoto2()
    {
        return $this->photo_2;
    }

    /**
     * @param mixed $photo_2
     */
    public function setPhoto2($photo_2)
    {
        $this->photo_2 = $photo_2;
    }

    /**
     * @return mixed
     */
    public function getPhoto3()
    {
        return $this->photo_3;
    }

    /**
     * @param mixed $photo_3
     */
    public function setPhoto3($photo_3)
    {
        $this->photo_3 = $photo_3;
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
