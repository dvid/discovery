<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Post;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class BlogController extends Controller
{
    private $posts = [
        ['id' => 1, 'title' => 'The octopus','username' => 'octopus', 'avatarUri' => '/images/leanna.jpeg', 'body' => 'Octopus asked me a riddle, outsmarted me', 'date' => 'Dec. 10, 2015', 'url' => ''],
        ['id' => 2, 'title' => '8 legs ...','username' => 'seahorse', 'avatarUri' => '/images/ryan.jpeg', 'body' => 'I counted 8 legs... as they wrapped around me', 'date' => 'Dec. 1, 2015', 'url' => ''],
        ['id' => 3, 'title' => 'Inked!', 'username' => 'calamare', 'avatarUri' => '/images/leanna.jpeg', 'body' => 'Inked!', 'date' => 'Aug. 20, 2015', 'url' => ''],
    ];

    /**
     * @Route("/blog")
     */
    public function indexAction()
    {
        return $this->render('blog/index.html.twig', array(
            'posts' => $this->posts,
        ));
    }

    /**
     * @Route("/blog/new", name="blog_new")
     */
    public function newAction()
    {
        $post = new Post();

        return $this->render('blog/new.html.twig', array(
            'quote' => 'Quo vadis',
        ));
    }

    /**
     * @Route("/blog/list/json", name="blog_list")
     * @Method("GET")
     */
    public function listAction()
    {

        $data = [
            'posts' => $this->posts
        ];

        foreach ($data["posts"] as &$post){
            $post['url'] = '/blog/'.filter_var($post['title'], FILTER_SANITIZE_URL);
        }

        return new JsonResponse($data);
    }

    /**
     * @Route("/blog/{title}", name="blog_post")
     * @Method("GET")
     */
    public function postAction($title)
    {
        foreach ($this->posts as $post)
        {
            $sanitized = filter_var($post['title'], FILTER_SANITIZE_URL);
            if ($sanitized == $title)
            {
                return $this->render('blog/post.html.twig', array(
                    'title' => $post["title"],
                    'body'  => $post["body"]
                ));
            }
        }
    }
}
