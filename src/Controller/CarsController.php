<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Car;
use App\Entity\User;
use App\Form\CarFormType;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class CarsController extends AbstractController
{
    private $em;

    public function __construct(EntityManagerInterface $entityManager){
        $this->em = $entityManager;
    }

    #[Route('/', name: 'cars_redirect')]
    public function to_cars(): Response
    {
        return $this->redirectToRoute('cars_show');
    }

    #[Route('/cars', name: 'cars_show')]
    public function index(): Response
    {
        $repo = $this->em->getRepository(Car::class);
        $cars = $repo->findAll();

        return $this->render('cars/index.html.twig', [
            'cars' => $cars
        ]);
    }

    #[Route('/cars/create', name: 'car_create')]
    public function create(Request $request): Response
    {
        $car = new Car();
        $form = $this->createForm(CarFormType::class, $car);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $newCar = $form->getData();

            $imagePath = $form->get('ImagePath')->getData();
            if($imagePath){
                $newFileName = uniqid().'.'.$imagePath->guessExtension();

                try{
                    $imagePath->move($this->getParameter(
                        'kernel.project_dir').'/public/uploads',
                        $newFileName
                    );
                } 
                catch(FileException $e) {
                    return new Response($e->getMessage());
                }

                $newCar->setImagePath('/uploads/'.$newFileName);
            }
            $description = $form->get('Description')->getData();
            if(!$description){
                $newCar->setDescription("This is ".$newCar->getBrand()." ".$newCar->getModel()." description.");
            }
            $user = $this->getUser();
            $user->addCar($newCar);

            $this->em->persist($newCar);
            $this->em->persist($user);
            $this->em->flush();

            return $this->redirectToRoute('cars_show');
        }

        return $this->render('cars/create.html.twig',[
            'form' => $form->createView()
        ]);
    }

    #[Route('/cars/other', name: 'cars_other')]
    public function other(): Response 
    {   
        $repo = $this->em->getRepository(Car::class);
        $cars = $repo->findAll();

        return $this->render('cars/other.html.twig', [
            'cars' => $cars
        ]);
    }

    #[Route('/cars/add/{id}', name: 'car_add')]
    public function add($id): Response
    {
        $repo = $this->em->getRepository(Car::class);
        $car = $repo->find($id);
        
        $user = $this->getUser();
        $user->addCar($car);

        $this->em->persist($user);
        $this->em->flush();

        return $this->redirectToRoute('cars_show');
    }

    #[Route('/cars/update/{id}', name: 'car_update')]
    public function update($id, Request $request): Response 
    {   
        $repo = $this->em->getRepository(Car::class);
        $car = $repo->find($id);
        $form = $this->createForm(CarFormType::class, $car);

        $form->handleRequest($request);
        $imagePath = $form->get('ImagePath')->getData();

        if($form->isSubmitted() && $form->isValid()){
            if($imagePath){
                $newFileName = uniqid().'.'.$imagePath->guessExtension();

                try{
                    $imagePath->move($this->getParameter(
                        'kernel.project_dir').'/public/uploads',
                        $newFileName
                    );
                } 
                catch(FileException $e) {
                    return new Response($e->getMessage());
                }

                $car->setImagePath('/uploads/'.$newFileName);
            }
            
            $car->setBrand($form->get('Brand')->getData());
            $car->setModel($form->get('Model')->getData());
            $car->setProductionYear($form->get('ProductionYear')->getData());
            $car->setHorsePower($form->get('HorsePower')->getData());
            
            $this->em->flush();

            return $this->redirectToRoute('cars_show');

        }
        return $this->render('cars/update.html.twig', [
            'car' => $car,
            'form' => $form->createView()
        ]);
    }

    #[Route('/cars/delete/{id}', name: 'car_delete')]
    public function delete($id): Response 
    {
        $repo = $this->em->getRepository(Car::class);
        $car = $repo->find($id);

        $user = $this->getUser();
        $user->removeCar($car);

        $this->em->persist($user);
        $this->em->flush();

        return $this->redirectToRoute('cars_show');
    }

    #[Route('/cars/{id}', name: 'car_show')]
    public function show($id): Response
    {
        $repo = $this->em->getRepository(Car::class);
        $car = $repo->find($id);

        return $this->render('cars/show.html.twig', [
            'car' => $car
        ]);
    }

    
}
