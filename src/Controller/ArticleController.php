<?php

namespace App\Controller;

use App\Module\Article\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class ArticleController extends AbstractController
{
    /**
     * @Route("/articles-by-category")
     * @param Request $request
     * @param ArticleRepository $repository
     * @return JsonResponse
     */
    public function getArticlesByCategory(Request $request, ArticleRepository $repository): JsonResponse
    {
        $param = json_decode($request->getContent(), true);
        $categoryName = $param['category'];
        $articles = $repository->getArticlesByCategoryName($categoryName);
        $articles = count($articles) > 0 ? $articles : 'end';

        return new JsonResponse(['articles' => $articles]);
    }
}
