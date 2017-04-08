<?php

namespace Miky\Bundle\CommentBundle\Form\Backend;


use Miky\Bundle\AdBundle\Entity\Ad;
use Miky\Bundle\UserBundle\Entity\Customer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentAdminType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("ad", EntityType::class,array(
                "class" => Ad::class,
                "attr" => array("disabled" => true),
                'label'=> 'miky.ui.ad',
                'choice_label' => 'title'
            ))
            ->add("author", EntityType::class,array(
                "class" => Customer::class,
                "attr" => array("disabled" => true),
                'label'=> 'miky.ui.author',
                'choice_label' => 'username'
            ))
            ->add('body', TextareaType::class, array(
                "required" => true,
                'attr' => array('rows' => '7'),
              'label'=> 'miky.ui.content'

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
        return 'miky_comment_admin';
    }
}
