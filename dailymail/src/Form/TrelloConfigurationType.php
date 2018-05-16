<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TrelloConfigurationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('apikey')
            ->add('token')
            ->add('doneColumnId')
            ->add('codeReviewColumnId')
            ->add('pairTestingColumnId')
            ->add('doingColumnId')
            ->add('sprintColumnId');
    }


    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'App\Entity\TrelloConfiguration',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'trello_configuration';
    }
}