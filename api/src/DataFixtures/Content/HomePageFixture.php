<?php

namespace App\DataFixtures\Content;

use Doctrine\Common\Persistence\ObjectManager;
use Silverback\ApiComponentBundle\Entity\Component\Hero\Hero;

class HomePageFixture extends AbstractPageFixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        $pageFixture = $this->getPage('home', '/');
        if ($pageFixture->isNew()) {
            $page = $pageFixture->getPage();
            $page
                ->setTitle('')
                ->setMetaDescription('Welcome to Silverback Web Apps')
            ;

            $hero = (new Hero())
                ->setTitle('It\'s <span class="small">about</span>')
                ->setSubtitle('time')
                ->setComponentName('HomeHero')
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
