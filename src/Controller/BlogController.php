<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    #[Route('/blog/{title}', name: 'blog')]
    public function index(): Response
    {
        return $this->json([
            'message' => 'prout',
            'path' => 'src/Controller/BlogController.php'
        ]);
    }



    public function lastBlogPost(): Response
    {

        $blogPost = [
            'title' => 'Les pommes sont bonnes pour la santé'
        ];

        return $this->render('./partials/_last_blog_article.html.twig', ['blogPost' => $blogPost]);
    }
}
