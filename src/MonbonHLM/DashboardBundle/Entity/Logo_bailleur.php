<?php
namespace MonbonHLM\DashboardBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Logo
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="MonbonHLM\DashboardBundle\Entity\Logo_bailleurRepository")
 * @ORM\HasLifecycleCallbacks
 * @Assert\Callback(methods={"isFileUploadedOrExists"})
 */
class Logo_bailleur
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255)
     */
    private $path;
    /**
     * @Assert\Image(
     *     minWidth = 150,
     *     maxWidth = 3000,
     *     minHeight = 150,
     *     maxHeight = 3000
     * )
     */
    public $file;
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
    public function getAbsolutePath()
    {
        return null === $this->path ? null : $this->getUploadRootDir().'/'.$this->id.'.'.$this->path;
    }
    public function getWebPath()
    {
        return null === $this->path ? null : $this->getUploadDir().'/'.$this->path;
    }
    protected function getUploadRootDir()
    {
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }
    protected function getUploadDir()
    {
        return 'uploads/profilePic';
    }
    private $filenameForRemove;
    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->file) {
            // do whatever you want to generate a unique name
            $filename = sha1(uniqid(mt_rand(), true));
            $this->path = $filename.'.'.$this->file->guessExtension();
        }
    }
    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->file) {
            return;
        }
        $this->file->move($this->getUploadRootDir(), $this->id.'.'.$this->file->guessExtension());
        $this->file = null;
    }
    /**
     * @ORM\PreRemove()
     */
    public function storeFilenameForRemove()
    {
        $this->filenameForRemove = $this->getAbsolutePath();
    }
    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if ($this->filenameForRemove) {
            unlink($this->filenameForRemove);
        }
    }
    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set path
     *
     * @param string $path
     *
     * @return ProfilePic
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }
}
