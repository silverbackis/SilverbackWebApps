<?php

namespace App\DataFixtures\Content;

use App\Form\Handler\ContactHandler;
use App\Form\Type\ContactType;
use Doctrine\Common\Persistence\ObjectManager;
use Silverback\ApiComponentBundle\Entity\Component\Form\Form;
use Silverback\ApiComponentBundle\Entity\Component\Hero\Hero;

class ContactPageFixture extends AbstractPageFixture
{
    public function load(ObjectManager $manager): void
    {
        $pageFixture = $this->getPage('contact', '/contact');
        if ($pageFixture->isNew()) {
            $page = $pageFixture->getPage();
            $page
                ->setTitle('Contact Us')
                ->setMetaDescription('')
            ;

            $this->addComponent((new Hero())->setTitle('Contact Us'), $page);

            $form = new Form();
            $form
                ->setFormType(ContactType::class)
                ->setSuccessHandler(ContactHandler::class)
            ;
            $this->addComponent($form, $page);
        }
        $this->flush($manager);
    }
}
