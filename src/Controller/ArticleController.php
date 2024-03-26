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

    #[Route('/article/{slug}-{id}', name: 'article.show', methods: ['GET'], requirements: ['id' => '\d+', 'slug' => '[a-z0-9-]+'])]
    public function show(Request $request, string $slug, int $id, RecipeRepository $repo): Response
    {

        // $recipe = new Recipe();

        $recipe = $repo->find($id);


        return $this->render('article/index.html.twig', [
            'recipe' => $recipe
        ]);
        // dd($slug, $id);
        //     // return $this->render('article/index.html.twig', [
        //     //     'controller_name' => 'ArticleController',
        //     // ]);
    }
}
