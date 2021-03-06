<?php

/* For licensing terms, see /license.txt */

namespace Chamilo\CoreBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Language.
 *
 * @ORM\Table(
 *     name="language",
 *     options={"row_format":"DYNAMIC"}
 * )
 * @ORM\Entity(repositoryClass="Chamilo\CoreBundle\Repository\LanguageRepository")
 */
class Language
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="original_name", type="string", length=255, nullable=true)
     */
    protected string $originalName;

    /**
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="english_name", type="string", length=255, nullable=true)
     */
    protected string $englishName;

    /**
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="isocode", type="string", length=10, nullable=true)
     */
    protected string $isocode;

    /**
     * @var bool
     *
     * @ORM\Column(name="available", type="boolean", nullable=false)
     */
    protected $available;

    /**
     * @var Language
     * @ORM\ManyToOne(targetEntity="Language", inversedBy="subLanguages")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", nullable=true)
     */
    protected $parent;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Language", mappedBy="parent")
     */
    protected $subLanguages;

    public function __construct()
    {
        //$this->children = new ArrayCollection();
    }

    /**
     * Set originalName.
     *
     * @param string $originalName
     *
     * @return Language
     */
    public function setOriginalName($originalName)
    {
        $this->originalName = $originalName;

        return $this;
    }

    /**
     * Get originalName.
     *
     * @return string
     */
    public function getOriginalName()
    {
        return $this->originalName;
    }

    /**
     * Set englishName.
     *
     * @param string $englishName
     *
     * @return Language
     */
    public function setEnglishName($englishName)
    {
        $this->englishName = $englishName;

        return $this;
    }

    /**
     * Get englishName.
     *
     * @return string
     */
    public function getEnglishName()
    {
        return $this->englishName;
    }

    /**
     * Set isocode.
     *
     * @param string $isocode
     *
     * @return Language
     */
    public function setIsocode($isocode)
    {
        $this->isocode = $isocode;

        return $this;
    }

    /**
     * Get isocode.
     *
     * @return string
     */
    public function getIsocode()
    {
        return $this->isocode;
    }

    /**
     * Set available.
     *
     * @param bool $available
     *
     * @return Language
     */
    public function setAvailable($available)
    {
        $this->available = $available;

        return $this;
    }

    /**
     * Get available.
     *
     * @return bool
     */
    public function getAvailable()
    {
        return $this->available;
    }

    /**
     * Set parent.
     *
     * @return Language
     */
    public function setParent(self $parent)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent.
     *
     * @return Language
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Get subLanguages.
     *
     * @return ArrayCollection
     */
    public function getSubLanguages()
    {
        return $this->subLanguages;
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
