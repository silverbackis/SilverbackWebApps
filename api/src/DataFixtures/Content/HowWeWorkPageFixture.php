<?php

namespace App\DataFixtures\Content;

use Doctrine\Common\Persistence\ObjectManager;
use Silverback\ApiComponentBundle\Entity\Component\Hero\Hero;

class HowWeWorkPageFixture extends AbstractPageFixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        $pageFixture = $this->getPage('how-we-work', '/how-we-work');
        if ($pageFixture->isNew()) {
            $page = $pageFixture->getPage();
            $page
                ->setTitle('How We Work')
            ;

            $hero = (new Hero())
                ->setTitle('How we')
                ->setSubtitle('work')
                ->setComponentName('HowWeWorkHero')
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
