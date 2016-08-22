<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PostRepository")
 * @ORM\Table(name="post")
 */
class Post
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string")
     */
    private $title;
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $body;
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $image;
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $teaser;
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $teaser_image;
    /**
     * @ORM\Column(type="boolean")
     */
    private $published;
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_created;
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_updated;

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function setBody($body)
    {
        $this->body = $body;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getTeaser()
    {
        return $this->teaser;
    }

    public function setTeaser($teaser)
    {
        $this->teaser = $teaser;
    }

    public function getTeaserImage()
    {
        return $this->teaser_image;
    }

    public function setTeaserImage($teaser_image)
    {
        $this->teaser_image = $teaser_image;
    }

    public function getPublished()
    {
        return $this->published;
    }

    public function setPublished($published)
    {
        $this->published = $published;
    }

    public function getDateCreated()
    {
        return new \DateTime('-'.rand(0, 100).' days');
    }

    public function setDateCreated($date_created)
    {
        $this->date_created = $date_created;
    }

    public function getDateUpdated()
    {
        return new \DateTime('-'.rand(0, 100).' days');
    }

    public function setDateUpdated($date_updated)
    {
        $this->date_updated = $date_updated;
    }
}