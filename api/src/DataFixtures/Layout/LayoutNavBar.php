<?php

namespace App\DataFixtures\Layout;

use App\DataFixtures\Content\AbstractPageFixture;
use App\DataFixtures\Content\ContactPageFixture;
use App\DataFixtures\Content\HomePageFixture;
use App\DataFixtures\Content\HowWeWorkPageFixture;
use App\DataFixtures\Content\PricingPageFixture;
use App\DataFixtures\Content\WhyChooseUsPageFixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Silverback\ApiComponentBundle\DataFixtures\AbstractFixture;
use Silverback\ApiComponentBundle\Entity\Component\Navigation\NavBar\NavBar;
use Silverback\ApiComponentBundle\Entity\Component\Navigation\NavBar\NavBarItem;
use Silverback\ApiComponentBundle\Entity\Content\Page\Page;
use Silverback\ApiComponentBundle\Entity\Layout\Layout;

class LayoutNavBar extends AbstractFixture implements DependentFixtureInterface
{
    private static $pages = [
        'home' => 'Home',
        'how-we-work' => 'How We Work',
        'why-choose-silverback' => 'Why Choose Us?',
        'pricing' => 'Pricing',
        'contact' => 'Contact'
    ];
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        /** @var Layout $layout */
        $layout = $this->getReference(AbstractPageFixture::$layoutReference);

        // Remove old
        $navBar = $layout->getNavBar() ?: new NavBar();
        foreach ($navBar->getComponentGroups() as $componentGroup) {
            foreach ($componentGroup->getComponentLocations() as $componentLocation) {
                $manager->remove($componentLocation);
            }
        }
        $manager->flush();

        // Re-add navigation items
        foreach (self::$pages as $pageReference=>$label) {
            /** @var Page $page */
            $page = $this->getReference(sprintf('page.%s', $pageReference));
            $navBarItem = new NavBarItem();
            $navBarItem
                ->setLabel($label)
                ->setRoute($page->getRoutes()->first() ?: null)
                ->setParentComponent($navBar)
            ;
            $this->addEntity($navBarItem);
        }

        $layout->setNavBar($navBar);
        $this->addEntity($navBar);
        $this->flush($manager);
    }

    /**
     * @return array
     */
    public function getDependencies(): array
    {
        return [
            DefaultLayout::class,
            HomePageFixture::class,
            HowWeWorkPageFixture::class,
            WhyChooseUsPageFixture::class,
            PricingPageFixture::class,
            ContactPageFixture::class
        ];
    }
}
