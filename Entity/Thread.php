<?php

namespace Miky\Bundle\CommentBundle\Entity;
use Miky\Bundle\CommentBundle\Model\CommentInterface;
use Miky\Bundle\CommentBundle\Model\ThreadInterface;

/**
 * Thread
 */
class Thread implements ThreadInterface
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    protected $namespace;

    /**
     * @var bool
     */
    protected $isCommentable = true;

    /**
     * @var int
     */
    protected $numComments = 0;

    /**
     * Denormalized date of the last comment
     *
     * @var DateTime
     */
    protected $lastCommentAt = null;

    /**
     * Url of the page where the thread lives
     *
     * @var string
     */
    protected $permalink;

    /**
     * @var CommentInterface
     */
    protected $comments;


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
     * @return string
     */
    public function getNamespace()
    {
        return $this->namespace;
    }

    /**
     * @param string $namespace
     */
    public function setNamespace($namespace)
    {
        $this->namespace = $namespace;
    }

    /**
     * @return boolean
     */
    public function isIsCommentable()
    {
        return $this->isCommentable;
    }

    /**
     * @param boolean $isCommentable
     */
    public function setIsCommentable($isCommentable)
    {
        $this->isCommentable = $isCommentable;
    }

    /**
     * @return int
     */
    public function getNumComments()
    {
        return $this->numComments;
    }

    /**
     * @param int $numComments
     */
    public function setNumComments($numComments)
    {
        $this->numComments = $numComments;
    }

    /**
     * @return DateTime
     */
    public function getLastCommentAt()
    {
        return $this->lastCommentAt;
    }

    /**
     * @param DateTime $lastCommentAt
     */
    public function setLastCommentAt($lastCommentAt)
    {
        $this->lastCommentAt = $lastCommentAt;
    }

    /**
     * @return string
     */
    public function getPermalink()
    {
        return $this->permalink;
    }

    /**
     * @param string $permalink
     */
    public function setPermalink($permalink)
    {
        $this->permalink = $permalink;
    }

    /**
     * @return CommentInterface
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param CommentInterface $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add comment
     *
     * @param \Miky\Bundle\CommentBundle\Entity\Comment $comment
     *
     * @return Thread
     */
    public function addComment(\Miky\Bundle\CommentBundle\Entity\Comment $comment)
    {
        $this->comments[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \Miky\Bundle\CommentBundle\Entity\Comment $comment
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeComment(\Miky\Bundle\CommentBundle\Entity\Comment $comment)
    {
        return $this->comments->removeElement($comment);
    }

    /**
     * Get isCommentable
     *
     * @return bool
     */
    public function getIsCommentable()
    {
        return $this->isCommentable;
    }
}
