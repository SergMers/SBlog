<?php

namespace MSBlogBundle\Controller;

use MSBlogBundle\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Post controller.
 *
 */
class PostController extends Controller
{
    /**
     * Lists all post entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $posts = $em->getRepository('MSBlogBundle:Post')->findAll();
        $posts = $this->get('ms_services.aside')->Hello();
        return $this->render('MSBlogBundle:post:index.html.twig', array(
            'posts' => $posts,
        ));
    }

    /**
     * Finds and displays a post entity.
     *
     */
    public function showAction(Post $post)
    {
        
        return $this->render('MSBlogBundle:post:show.html.twig', array(
            'post' => $post,
            'delete_form' => '$deleteForm->createView()',
        ));
    }

}
