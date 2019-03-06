<?php

namespace App\Form\Type;

use Silverback\ApiComponentBundle\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(
            [
                'csrf_protection' => false,
                'attr' => [
                    'novalidate' => 'novalidate'
                ]
            ]
        );
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'name',
                TextType::class,
                [
                    'attr' => [
                        'placeholder' => 'Your name'
                    ],
                    'label' => 'Your Name',
                    'constraints' => [
                        new NotBlank(
                            [
                                'message' => 'Please provide your name'
                            ]
                        ),
                    ]
                ]
            )
            ->add(
                'subject',
                ChoiceType::class,
                [
                    'attr' => [
                        'placeholder' => 'Subject'
                    ],
                    'label' => 'Regarding',
                    'choices' => [
                        'Please select' => '',
                        'General enquiry' => 'enquiry',
                        'Anything else' => 'other',
                        'Invalid option' => '-'
                    ],
                    // 'choices_as_values' => true,
                    'choice_attr' => function ($val, $key, $index) {
                        return $val === '' ? ['disabled' => ''] : [];
                    },
                    'constraints' => [
                        new NotBlank(
                            [
                                'message' => 'Please select what the message is regarding'
                            ]
                        ),
                        new Length(
                            [
                                'min' => 2,
                                'minMessage' => 'The option selected is invalid'
                            ]
                        )
                    ]
                ]
            )
            ->add(

                'email',
                EmailType::class,
                [
                    'attr' => [
                        'placeholder' => 'Your email address'
                    ],
                    'label' => 'Your Email',
                    'constraints' => [
                        new NotBlank(
                            [
                                'message' => 'Please provide a valid email'
                            ]
                        ),
                        new Email(
                            [
                                'message' => "Your email doesn't seems to be valid"
                            ]
                        ),
                    ]
                ]
            )
            ->add(

                'message',
                TextareaType::class,
                [
                    'attr' => [
                        'placeholder' => 'Your message here'
                    ],
                    'label' => 'Message',
                    'constraints' => [
                        new NotBlank(
                            [
                                'message' => 'Please provide a message here'
                            ]
                        )
                    ]
                ]
            )
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'is-primary is-rounded'
                ],
                'label' => 'Send'
            ]);
    }
}
