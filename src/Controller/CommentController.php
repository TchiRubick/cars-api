<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CommentRepository;

class CommentController extends AbstractController
{
    /**
     * @Route("/api/car/comments/{id}", name="car_comments", methods={"GET"})
     */
    public function commentsCar(CommentRepository $commentRepository, $id): JsonResponse
    {
        $comments = $commentRepository->findBy(['car' => $id]);
        $contents = [];
        $users = [];
        
        foreach ($comments as $comment) {
            $contents[] = $comment->getContent();
            $users[] = $comment->getUser()->getUsername();
        }

        return new JsonResponse(['comments' => $contents, 'users'=> $users]);
    }
}
