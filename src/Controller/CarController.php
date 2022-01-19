<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CarRepository;

class CarController extends AbstractController
{
    /**
     * @Route("/api/car/comments/{id}", name="car_comments", methods={"GET"})
     */
    public function carComments(CarRepository $carRepository, $id ): JsonResponse
    {
        $car = $carRepository->find($id);

        return new JsonResponse(
            [
                'car' => $car,
                'comments' => $car->getComments()
            ],
        );
    }
}
