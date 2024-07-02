<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Author;
use App\Repository\AuthorRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Doctrine\ORM\EntityManagerInterface;



class AuthorController extends AbstractController
{
   
    #[Route('/authors', name: 'app_authors', methods: ['GET'])]
    public function list(AuthorRepository $authorRepository): Response {
        
        return $this->render('author/index.html.twig', [
            'authors' => $authorRepository->findAll(),
        ]);
    }
    #[Route('authors/new',name:"app_new_author", methods: ['GET', 'POST'])]
    function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        // creates a task object and initializes some data for this example
        $author = new Author();

        $form = $this->createFormBuilder($author)
            ->add('author_name', TextType::class)
            ->add('biography', TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Create Author'])
            ->getForm();

            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $entityManager->persist($author);
                $entityManager->flush();      
                return $this->redirectToRoute('app_authors'); // Redirect to author list page
            }
        
            return $this->render('author/new.html.twig', [
                'form' => $form
            ]);
        }

    #[Route('authors/{id}', name: 'app_author', methods: ['GET'])]
    public function show(Author $author):Response
    {
        if (!isset($author)) {
            throw $this->createNotFoundException('The author does not exist');
        }
        return $this->render('author/show.html.twig', ['author' =>$author]);
    }

   
 
}
