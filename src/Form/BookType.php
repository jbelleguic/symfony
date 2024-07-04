<?php

namespace App\Form;

use App\Entity\Author;
use App\Entity\Book;
use App\Entity\Editor;
use App\Enum\BookStatus;
use Composer\XdebugHandler\Status;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre',
    ])
            ->add('isbn', IntegerType::class, [
                'label' => 'ISBN',
            ])
            ->add('cover', TextType::class, [
                'label' => 'Couverture',
            ])
            ->add('editedAt', DateType::class, [
                'label' => 'Date d\'édition',
                'widget' => 'single_text',
            ])
            ->add('plot', TextType::class, [
                'label' => 'Plott',
            ])
            ->add('status', EnumType::class, [
                'class' => BookStatus::class,
            ])
            ->add('pageNumber', IntegerType::class, [
                'label' => 'Nombre de page',
            ])
            ->add('editor', EntityType::class, [
                'class' => Editor::class,
                'choice_label' => 'id',
            ])
            ->add('authors', EntityType::class, [
                'class' => Author::class,
                'choice_label' => 'name',
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
