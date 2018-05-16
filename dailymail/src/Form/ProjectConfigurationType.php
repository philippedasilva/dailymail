<?php

namespace App\Form;

use App\Entity\GoogleSheetConfiguration;
use App\Entity\TrelloConfiguration;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ProjectConfigurationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('trelloConfiguration', EntityType::class, array(
            'class' => TrelloConfiguration::class
                ))
            ->add('googleSheetConfiguration', EntityType::class, array(
                'class' => GoogleSheetConfiguration::class,
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'project_configuration';
    }
}