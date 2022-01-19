<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CommentRepository;
use App\Repository\CarRepository;

class CommentController extends AbstractController
{
    /**
     * @Route("/api/car/comments/{id}", name="car_comments", methods={"GET"})
     */
    public function commentsCar(CommentRepository $commentRepository, $id): JsonResponse
    {
        $comments = $commentRepository->findBy(['car' => $id]);
        $contents = [];
        
        foreach ($comments as $comment) {
            $content[] = $comment->getContent();
        }

        return new JsonResponse(
            ['comments' => $contents,],
        );
    }
}
