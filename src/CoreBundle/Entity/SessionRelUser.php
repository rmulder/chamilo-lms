<?php

/* For licensing terms, see /license.txt */

namespace Chamilo\CoreBundle\Entity;

use Chamilo\CoreBundle\Traits\UserTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * SessionRelUser.
 *
 * @ORM\Table(
 *    name="session_rel_user",
 *      indexes={
 *          @ORM\Index(name="idx_session_rel_user_id_user_moved", columns={"user_id", "moved_to"})
 *      }
 * )
 * @ORM\Entity
 */
class SessionRelUser
{
    use UserTrait;

    public array $relationTypeList = [
        0 => 'student',
        1 => 'drh',
    ];

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Session", inversedBy="users", cascade={"persist"})
     * @ORM\JoinColumn(name="session_id", referencedColumnName="id")
     */
    protected Session $session;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="sessions", cascade={"persist"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected User $user;

    /**
     * @ORM\Column(name="relation_type", type="integer", nullable=false, unique=false)
     */
    protected int $relationType;

    /**
     * @ORM\Column(name="duration", type="integer", nullable=true)
     */
    protected int $duration;

    /**
     * @ORM\Column(name="moved_to", type="integer", nullable=true, unique=false)
     */
    protected ?int $movedTo;

    /**
     * @ORM\Column(name="moved_status", type="integer", nullable=true, unique=false)
     */
    protected ?int $movedStatus;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="moved_at", type="datetime", nullable=true, unique=false)
     */
    protected $movedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="registered_at", type="datetime", nullable=false, unique=false)
     */
    protected $registeredAt;

    public function __construct()
    {
        $this->duration = 0;
        $this->movedTo = null;
        $this->movedStatus = null;
        $this->registeredAt = new \DateTime('now', new \DateTimeZone('UTC'));
    }

    /**
     * Set Session.
     *
     * @param Session $session
     *
     * @return SessionRelUser
     */
    public function setSession($session)
    {
        $this->session = $session;

        return $this;
    }

    public function getSession(): Session
    {
        return $this->session;
    }

    /**
     * Set relationType.
     *
     * @param int $relationType
     *
     * @return SessionRelUser
     */
    public function setRelationType($relationType)
    {
        $this->relationType = $relationType;

        return $this;
    }

    /**
     * Set relationTypeByName.
     *
     * @param string $relationType
     *
     * @return SessionRelUser
     */
    public function setRelationTypeByName($relationType)
    {
        if (isset($this->relationTypeList[$relationType])) {
            $this->setRelationType($this->relationTypeList[$relationType]);
        }

        return $this;
    }

    /**
     * Get relationType.
     *
     * @return int
     */
    public function getRelationType()
    {
        return $this->relationType;
    }

    /**
     * Set movedTo.
     *
     * @param int $movedTo
     *
     * @return SessionRelUser
     */
    public function setMovedTo($movedTo)
    {
        $this->movedTo = $movedTo;

        return $this;
    }

    /**
     * Get movedTo.
     *
     * @return int
     */
    public function getMovedTo()
    {
        return $this->movedTo;
    }

    /**
     * Set movedStatus.
     *
     * @param int $movedStatus
     *
     * @return SessionRelUser
     */
    public function setMovedStatus($movedStatus)
    {
        $this->movedStatus = $movedStatus;

        return $this;
    }

    /**
     * Get movedStatus.
     *
     * @return int
     */
    public function getMovedStatus()
    {
        return $this->movedStatus;
    }

    /**
     * Set movedAt.
     *
     * @param \DateTime $movedAt
     *
     * @return SessionRelUser
     */
    public function setMovedAt($movedAt)
    {
        $this->movedAt = $movedAt;

        return $this;
    }

    /**
     * Get movedAt.
     *
     * @return \DateTime
     */
    public function getMovedAt()
    {
        return $this->movedAt;
    }

    /**
     * Set registeredAt.
     *
     * @return $this
     */
    public function setRegisteredAt(\DateTime $registeredAt)
    {
        $this->registeredAt = $registeredAt;

        return $this;
    }

    /**
     * Get registeredAt.
     *
     * @return \DateTime
     */
    public function getRegisteredAt()
    {
        return $this->registeredAt;
    }

    /**
     * @return int
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param int $duration
     *
     * @return SessionRelUser
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }
}
