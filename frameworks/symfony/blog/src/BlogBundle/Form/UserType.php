<?php

namespace BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('email', EmailType::class, array("label" => "Email address", "required" => "required", "attr" => array("class" => "form-email form-control", "placeholder" => "Enter email")))
                ->add('password', PasswordType::class, array("label" => "Password", "required" => "required", "attr" => array("class" => "form-password form-control", "placeholder" => "Password")))
                ->add('name', TextType::class, array("required" => "required", "attr" => array("class" => "form-name form-control", "placeholder" => "Your name")))
                ->add('surname', TextType::class, array("required" => "required", "attr" => array("class" => "form-surname form-control", "placeholder" => "Your surname")))
                ->add('Register', SubmitType::class, array("attr" => array("class" => "form-submit btn btn-primary")));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BlogBundle\Entity\User'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'blogbundle_user';
    }


}
