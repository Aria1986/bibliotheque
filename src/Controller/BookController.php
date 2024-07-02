<?php

namespace App\Controller;

use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Book;
use App\Form\BookFormType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class BookController extends AbstractController
{
    #[Route("/home", name: "app_home")]
    public function index(): Response {
        return $this->render('library/index.html.twig', [
            'message' => 'Bienvenue à la bibliothèque',
        ]);
    }
    #[Route('/books', name: 'app_books', methods: ['GET'])]
    public function list(BookRepository $bookRepository): Response {
        
        return $this->render('book/list.html.twig', [
            'books' => $bookRepository->findAll(),
        ]);
    }

    #[Route('books/new', name: 'app_new_book', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $book = new Book();
        $form = $this->createForm(BookFormType::class, $book);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($book);
            $entityManager->flush();
            return $this->redirectToRoute('app_books');
        }

        return $this->render('book/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('books/{id}', name: 'app_details', methods: ['GET'])]
    public function bookDetails(Book $book):Response
    {
        // $url = $this->generateUrl('app_details',['id' => $id]);
        // $this->logger->info("CONTROLLEUR LibraryController/book_details/{id}");
        if (!isset($book)) {
            throw $this->createNotFoundException('The book does not exist');
        }
        return $this->render('book/detail.html.twig', ['book' =>$book]);
    }


}
    

