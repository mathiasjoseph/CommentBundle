<?php

namespace Miky\Bundle\CommentBundle\Entity;
use Miky\Bundle\AdBundle\Entity\Ad;
use Miky\Bundle\CommentBundle\Model\CommentInterface;
use Miky\Bundle\CommentBundle\Model\ThreadInterface;
use Miky\Bundle\CoreBundle\Entity\Traits\MikyCommonInterface;
use Miky\Bundle\CoreBundle\Entity\Traits\MikyCommonTrait;
use Miky\Bundle\UserBundle\Entity\Customer;
use Miky\Component\Resource\Model\ResourceInterface;

/**
 * Comment
 */
class Comment implements MikyCommonInterface, CommentInterface, ResourceInterface
{
    Use MikyCommonTrait;

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    protected $body;

    /**
     * @var Ad
     */
    protected $ad;

    /**
     * @var string
     */
    protected $authorName;

    /**
     * @var Customer
     */
    protected $author;

    /**
     * @var Thread
     */
    protected $thread;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $website;

    /**
     * @var CommentInterface
     */
    protected $parent;

    /**
     * @var CommentInterface[]
     */
    protected $children;


    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }


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
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param string $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @return string
     */
    public function getAuthorName()
    {
        return $this->authorName;
    }

    /**
     * @param string $authorName
     */
    public function setAuthorName($authorName)
    {
        $this->authorName = $authorName;
    }



    /**
     * @return Thread
     */
    public function getThread()
    {
        return $this->thread;
    }

    /**
     * @param Thread $thread
     */
    public function setThread(ThreadInterface $thread)
    {
        $this->thread = $thread;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * @param string $website
     */
    public function setWebsite($website)
    {
        $this->website = $website;
    }

    /**
     * @return CommentInterface
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param CommentInterface $parent
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    /**
     * @return \Miky\Bundle\CommentBundle\Model\CommentInterface[]
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param \Miky\Bundle\CommentBundle\Model\CommentInterface[] $children
     */
    public function setChildren($children)
    {
        $this->children = $children;
    }

    /**
     * @return Customer
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param Customer $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return Ad
     */
    public function getAd()
    {
        return $this->ad;
    }

    /**
     * @param Ad $ad
     */
    public function setAd($ad)
    {
        $this->ad = $ad;
    }

}
