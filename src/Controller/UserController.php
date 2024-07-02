<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
    function new(Request $request): Response
    {
        // creates a task object and initializes some data for this example
        $task = new User();
        $task->setTask('Write a blog post');
        $task->setDueDate(new \DateTimeImmutable('tomorrow'));

        $form = $this->createFormBuilder($task)
            ->add('task', TextType::class)
            ->add('dueDate', DateType::class)
            ->add('save', SubmitType::class, ['label' => 'Create Task'])
            ->getForm();

        // ...
    }

    #[Route('/inscription', name:"app_inscription")]
    public function formInscription(): Response
    {
        return $this ->render('user/inscription.html.twig');
    }

    #[Route('/contact', name:'app_contact')]
    public function contactForm():Response
    {
        return $this->render('contact.html.twig');
    }
    // #[Route('/createUser', name: 'app_create_user')]
    // public function createUser(): 
    // {
    //     $stmt = $pdo->prepare("UPDATE users SET name = :name WHERE email = :email");
    //     $name = 'Alice Johnson';
    //     $email = 'alice@example.com';
    //     $stmt->bindParam(':name', $name);
    //     $stmt->bindParam(':email', $email);
    //     $stmt->execute();

    //     echo "User name updated successfully";
            
    // }


}
