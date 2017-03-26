<?php
/**
 * Created by PhpStorm.
 * User: miky
 * Date: 25/10/16
 * Time: 22:44
 */

namespace Miky\Bundle\CommentBundle\Model;


interface CommentInterface
{
    const STATE_VISIBLE = 0;
    const STATE_DELETED = 1;
    const STATE_SPAM = 2;
    const STATE_PENDING = 3;


}