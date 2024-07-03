<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Book;
use App\Form\BookType;

#[Route('/admin/book')]
class BookController extends AbstractController
{
    #[Route('/new', name: 'app_admin_book_new')]
    public function new(Request $request): Response
    {
        $book = new Book();
        $form = $this->createForm(BookType::class, $book);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

        }

        return $this->render('admin/book/new.html.twig', [
            'form' => $form,
        ]);
    }
}
