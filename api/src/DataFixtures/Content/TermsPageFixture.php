<?php

namespace App\DataFixtures\Content;

use Doctrine\Common\Persistence\ObjectManager;
use Silverback\ApiComponentBundle\Entity\Component\Hero\Hero;

class TermsPageFixture extends AbstractPageFixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        $pageFixture = $this->getPage('terms', '/terms-privacy');
        if ($pageFixture->isNew()) {
            $page = $pageFixture->getPage();
            $page
                ->setTitle('Terms & Privacy')
                ->setMetaDescription('')
            ;

            $this->addComponent((new Hero())->setTitle('Terms & Privacy'), $page);
            $this->addComponent($this->contentFactory->create(), $page);
        }
        $this->flush($manager);
    }
}
