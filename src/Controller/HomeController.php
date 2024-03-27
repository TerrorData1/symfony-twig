<?php

namespace App\Controller;

use App\Entity\Recipe;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\RecipeRepository;




class HomeController extends AbstractController
{
    #[Route("/", name: "home")]
    function index(Request $request): Response
    {
        // return new Response('Hello, world!');
        return $this->render('home/index.html.twig');
    }

    #[Route('/shop', name: 'shop')]
    public function shop(RecipeRepository $repo, Request $request): Response
    {
        $page = $request->query->getInt('page', 1);
        $limit = 8;
        $recipes = $repo->paginateRecipes($page, $limit);
        $maxPage = ceil($recipes->count() / $limit);
        // dd($recipes->count());
        return $this->render('shop/index.html.twig', [
            'recipes' => $recipes,
            'maxPage' => $maxPage,
            'page' => $page

        ]);
    }
}
