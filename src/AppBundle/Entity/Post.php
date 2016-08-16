<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="post")
 */
class Post
{
    private $id;
    private $title;
    private $body;
    private $image;
    private $teaser;
    private $teaser_image;
    private $published;
    private $date_created;
    private $date_updated;
}