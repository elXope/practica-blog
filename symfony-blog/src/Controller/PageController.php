<?php

namespace App\Controller;

use App\Form\ContactFormType;
use App\Entity\Category;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\{Response, Request};
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    #[Route('/', name:'index')]
    public function index(ManagerRegistry $doctrine, Request $request): Response
    {
        $repository = $doctrine->getRepository(Category::class);
        $categories = $repository->findAll();
        return $this->render('page/index.html.twig', [
            'categories' => $categories
        ]);
    }

    #[Route('/about', name:'about')]
    public function about(): Response
    {
        return $this->render('page/about.html.twig', []);
    }

    #[Route('/contact', name:'contact')]
    public function contact(Request $request): Response
    {
        $formulario = $this->createForm(ContactFormType::class);
        $formulario->handleRequest($request);
        if ($formulario->isSubmitted() && $formulario->isValid()) {
            return $this->render('page/thankyou.html.twig', []);
        }

        return $this->render('page/contact.html.twig', [
            'form' => $formulario->createView()
        ]);
    }
}
