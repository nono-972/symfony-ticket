<?php

namespace App\Form;

use App\Entity\Ticket;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TicketType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, [
               'label'=>'Titre du ticket'
            ])
            ->add('description', TextType::class, [
                'label'=>''
            ])
            ->add('statut', ChoiceType::class, [
                'label'=>'Statut',
                'choices'=>[
                 'Ouvert'=>'Le ticket vient d\'être créé',
                 'En cours'=> 'Un technicien travaille sur le problème',
                 'Résolu'=>'Leproblème a été traîté',
                 'Fermée'=>'Le traitement du ticket est terminé',
                ]
            ])
            ->add('priorite', ChoiceType::class, [
                'label'=>'Priorite',
                'choices'=>[ 
                 'Faible'=>'Problème sans impacte important',
                 'Normale'=>'Problème gênant mais non bloquant',
                 'Haute'=>'Problème empêchant une activité importante',
                 'Urgente'=>'incident critique nécessitant une intervention rapide'
                ]
            ])
            ->add('DateCreation', DateType::class, [
                'label'=>'Date'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ticket::class,
        ]);
    }
}
