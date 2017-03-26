<?php

namespace Miky\Bundle\CommentBundle\Entity;
use Miky\Bundle\CommentBundle\Model\Polls;

/**
 * Rating
 */
class Rating
{
    /**
     * @var int
     */
    private $id;


    protected $group;


    /**
     * @var 
     */
    protected $target;

    /**
     * @var float
     */
    protected $result;

    /**
     * @var Polls[]
     */
    protected $polls;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
