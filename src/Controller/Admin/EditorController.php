<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Editor;
use App\Form\EditorType;

#[Route('/admin/editor')]
class EditorController extends AbstractController
{
    #[Route('/new', name: 'app_admin_editor_new')]
    public function new(Request $request): Response
    {
        $editor = new Editor();
        $form = $this->createForm(EditorType::class, $editor);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

        }

        return $this->render('admin/editor/new.html.twig', [
            'form' => $form,
        ]);
    }
}
