<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Car;

class CarsController extends AbstractController
{
    private $em;

    public function __construct(EntityManagerInterface $entityManager){
        $this->em = $entityManager;
    }

    #[Route('/cars', name: 'cars')]
    public function index(): Response
    {
        $repo = $this->em->getRepository(Car::class);
        $cars = $repo->findAll();

        return $this->render('cars/index.html.twig', [
            'cars' => $cars
        ]);
    }

    #[Route('/cars/{id}', name: 'car')]
    public function show($id): Response
    {
        $repo = $this->em->getRepository(Car::class);
        $car = $repo->find($id);

        return $this->render('cars/show.html.twig', [
            'car' => $car
        ]);
    }
}
