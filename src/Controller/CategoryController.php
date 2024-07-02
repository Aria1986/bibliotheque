<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CategoryController extends AbstractController
{
    #[Route('/categories', name: 'app_categories', methods: ['GET'])]
    public function index(CategoryRepository $categoryRepository): Response
    {
        return $this->render('category/index.html.twig', [
            'categories' =>  $categoryRepository->findAll(),
        ]);
    }

    #[Route('catefories/new', name:"app_new_category", methods:['GET', 'POST'])]
    public function new(Request $request,EntityManagerInterface $entityManager): Response
    {
        $category = new Category();
        $form = $this->createFormBuilder($category)
            ->add('category_name', TextType::class)
            ->add('save', SubmitType::class)
            ->getForm();
        $form->handleRequest($category);
        if($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($category);
            $entityManager->flush();      
            return $this->redirectToRoute('app_categories'); // Redirect to author list page
        }
    
        return $this->render('category/new.html.twig', [
            'form' => $form
        ]);
    }
    
    #[Route('/categories/{id}', name: 'app_category', methods: ['GET'])]
    public function show(Category $category): Response
    {
        return $this->render('category/show.html.twig', [
            'category' =>  $category]);
    }
}
