<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    #[Route('/blog', name: 'blog')]
    public function index(): Response
    {
        return $this->render('blog/index.html.twig', []);
    }

    #[Route('/blog/single_post', name:'single_post')]
    public function single_post(): Response
    {
        return $this->render('blog/single_post.html.twig', []);
    }
}
