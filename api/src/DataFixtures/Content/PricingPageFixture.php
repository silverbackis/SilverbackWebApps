<?php

namespace App\DataFixtures\Content;

use Doctrine\Common\Persistence\ObjectManager;
use Silverback\ApiComponentBundle\Entity\Component\Hero\Hero;

class PricingPageFixture extends AbstractPageFixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        $pageFixture = $this->getPage('pricing', '/pricing');
        if ($pageFixture->isNew()) {
            $page = $pageFixture->getPage();
            $page
                ->setTitle('Pricing')
            ;

            $hero = (new Hero())
                ->setTitle('Transparent')
                ->setSubtitle('pricing')
                ->setComponentName('PricingHero')
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
