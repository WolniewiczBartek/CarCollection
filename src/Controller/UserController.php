<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;

use Doctrine\ORM\EntityManagerInterface;

class UserController extends AbstractController
{
    private $em;
       
    public function __construct(EntityManagerInterface $entityManager){
        $this->em = $entityManager;
    }


    #[Route('/user', name: 'user_read')]
    public function read(): Response
    {

        return $this->render('user/read.html.twig');
    }

    // #[Route('/user/update', name: 'user_update')]
    // public function update(): Response
    // {
        
    //     return $this->render('user/update.html.twig');
    // }

    #[Route('/user/delete/{id}', name: 'user_delete')]
    public function delete($id): Response
    {
        $repo = $this->em->getRepository(User::class);
        $user = $repo->find($id);

        $this->em->remove($user);
        $this->em->flush();

        return $this->redirectToRoute('app_register');
    }
}
