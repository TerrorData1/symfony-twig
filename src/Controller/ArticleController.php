<?php

namespace App\Controller;

use App\Repository\RecipeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ArticleController extends AbstractController
{

    // #[Route('/article', name: 'app_article')]
    // public function index(): Response
    // {
    //     return $this->render('article/index.html.twig');
    // }


    // public function index(Request $request): Response
    // {
    //     return $this->render('article/index.html.twig');
    // }

    // #[Route('/article/{slug}-{id}', name: 'article.index', requirements: ['id' => '\d+', 'slug' => '[a-z0-9-]+'])]
    // public function index(Request $request, string $slug, int $id): Response
    // {
    //     return new Response('Ceci est l\'article ' . $slug . ' avec l\'id ' . $id);
    // }


    // chemin avec l'id et slug!!

    // #[Route('/article/{slug}-{id}', name: 'article.show', methods: ['GET'], requirements: ['id' => '\d+', 'slug' => '[a-z0-9-]+'])]
    // public function show(Request $request, string $slug, int $id, RecipeRepository $repo): Response
    // {
    // $recipe = $repo->find($id);
    // return $this->render('article/index.html.twig', [
    //     'recipe' => $recipe
    // ]);
    // }

    //chemin avec slug uniquement et sans l'id!!
    #[Route('/article/{slug}', name: 'article.show', methods: ['GET'], requirements: ['slug' => '[a-z0-9-]+'])]
    public function show(Request $request, string $slug, RecipeRepository $repo): Response
    {

        $recipe = $repo->findOneBy(['slug' => $slug]);
        return $this->render('article/index.html.twig', [
            'recipe' => $recipe
        ]);
    }
}
