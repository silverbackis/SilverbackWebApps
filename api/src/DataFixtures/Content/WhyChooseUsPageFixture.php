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
        $pageFixture = $this->getPage('why-choose-silverback', '/why-choose-silverback');
        if ($pageFixture->isNew()) {
            $page = $pageFixture->getPage();
            $page
                ->setTitle('Why Choose Silverback?')
            ;

            $hero = (new Hero())
                ->setTitle('Why choose')
                ->setSubtitle('Silverback?')
                ->setComponentName('WhyChooseUsHero')
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
