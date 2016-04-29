<?php

namespace Proethos2\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Language
 *
 * @ORM\Table(name="upload_type")
 * @ORM\Entity
 */
class UploadType extends Base
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
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @var UploadTypeExtension
     * @ORM\ManyToMany(targetEntity="UploadTypeExtension", inversedBy="extensions")
     * @ORM\JoinTable(name="upload_type_upload_type_extension")
     */
    private $extensions;

    public function __toString() {
        return $this->getName();
    }

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
     * Set name
     *
     * @param string $name
     *
     * @return UploadType
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add extension
     *
     * @param \Proethos2\ModelBundle\Entity\UploadTypeExtension $extension
     *
     * @return UploadType
     */
    public function addExtension(\Proethos2\ModelBundle\Entity\UploadTypeExtension $extension)
    {
        $this->extensions[] = $extension;

        return $this;
    }

    /**
     * Remove extension
     *
     * @param \Proethos2\ModelBundle\Entity\UploadTypeExtension $extension
     */
    public function removeExtension(\Proethos2\ModelBundle\Entity\UploadTypeExtension $extension)
    {
        $this->extensions->removeElement($extension);
    }

    /**
     * Get extensions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getExtensions()
    {
        return $this->extensions;
    }
}