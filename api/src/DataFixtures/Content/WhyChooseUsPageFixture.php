<?php

namespace App\DataFixtures\Content;

use Doctrine\Common\Persistence\ObjectManager;
use Silverback\ApiComponentBundle\Entity\Component\Hero\Hero;

class WhyChooseUsPageFixture extends AbstractPageFixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        $pageFixture = $this->getPage('why-choose-us', '/why-choose-us');
        if ($pageFixture->isNew()) {
            $page = $pageFixture->getPage();
            $page
                ->setTitle('Why Choose Us?')
            ;

            $hero = (new Hero())
                ->setTitle('Why Choose Us?')
            ;
            $this->addComponent($hero, $page);
            $content = $this->contentFactory->create(null, [
                '1',
                'short'
            ]);
            $this->addComponent($content, $page);
        }
        $this->flush($manager);
    }

    public function getDependencies(): array
    {
        return array_merge(parent::getDependencies(), [
        ]);
    }
}