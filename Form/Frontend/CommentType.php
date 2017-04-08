<?php

namespace Miky\Bundle\CommentBundle\Form\Frontend;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('body', TextareaType::class, array(
                "required" => true,
                'attr' => array('rows' => '7')
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Miky\Bundle\CommentBundle\Entity\Comment'
        ));
    }

    public function getName()
    {
        return 'miky_comment_frontend';
    }
}
