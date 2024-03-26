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
    public function shop(RecipeRepository $repo): Response
    {

        $recipes = $repo->findWithDurationLowerThan(20);
        return $this->render('shop/index.html.twig', [
            'recipes' => $recipes
            // $shop = $repo->findAll();
            // return $this->render('shop/index.html.twig', [
            //     'shop' => $shop
        ]);
    }
}
