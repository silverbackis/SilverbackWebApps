<?php

namespace App\DataFixtures\Content;

use Doctrine\Common\Persistence\ObjectManager;
use Silverback\ApiComponentBundle\Entity\Component\ComponentLocation;
use Silverback\ApiComponentBundle\Entity\Component\Content\Content;
use Silverback\ApiComponentBundle\Entity\Component\Feature\Columns\FeatureColumns;
use Silverback\ApiComponentBundle\Entity\Component\Feature\Columns\FeatureColumnsItem;
use Silverback\ApiComponentBundle\Entity\Component\Feature\TextList\FeatureTextList;
use Silverback\ApiComponentBundle\Entity\Component\Feature\TextList\FeatureTextListItem;
use Silverback\ApiComponentBundle\Entity\Component\Hero\Hero;
use Silverback\ApiComponentBundle\Entity\Content\AbstractContent;
use Silverback\ApiComponentBundle\Entity\Content\ComponentGroup\ComponentGroup;
use Symfony\Component\HttpFoundation\File\File;

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
                ->setTitle('It\'s <span class="is-small">about</span>')
                ->setSubtitle('time')
                ->setComponentName('HomeHero')
            ;
            $this->addComponent($hero, $page);
            $this->addComponent($this->getFutureContent(), $page);
            $this->getSpeedFeatures($manager, $page);
            $this->getExpertFeatures($manager, $page);
            $this->addComponent($this->getCategoryFeatureList(), $page);
            $this->addComponent($this->getPricingContent(), $page);
        }
        $this->flush($manager);
    }

    private function getSpeedFeatures(ObjectManager $manager, AbstractContent $page): FeatureColumns
    {
        $features = new FeatureColumns();
        $features
            ->setTitle('speed is of the <span class="has-text-white">essence</span>')
            ->setClassName('is-speed')
            ->setComponentName('HomeSpeedFeatures')
        ;
        /** @var ComponentGroup $componentGroup */
        $componentGroup = $features->getComponentGroups()->first();
        $this->addComponent($features, $page);
        $this->flush($manager);

        $items = [
            [
                'title' => 'Quick & professional planning of pages',
                'fileName' => 'feature-plan.png'
            ],
            [
                'title' => 'Experienced designers deliver fast turnarounds',
                'fileName' => 'feature-design.png'
            ],
            [
                'title' => 'Awesome coders bring you a site to life in ultra fast time',
                'fileName' => 'feature-code.png'
            ]
        ];

        foreach ($items as $item) {
            $featureItem = new FeatureColumnsItem();
            $featureItem->setTitle($item['title']);
            $this->addComponent($featureItem, $componentGroup);
            $this->flush($manager);
            $this->fixtureFileUploader->upload(
                $featureItem,
                new File(sprintf('%s/home/%s', $this->sourceFileDir, $item['fileName']))
            );
        }

        return $features;
    }

    private function getExpertFeatures(ObjectManager $manager, AbstractContent $page): FeatureColumns
    {
        $features = new FeatureColumns();
        $features
            ->setTitle('relax with <span class="has-text-white">expert know how</span>')
            ->setClassName('is-expert')
            ->setComponentName('HomeExpertFeatures')
        ;
        /** @var ComponentGroup $componentGroup */
        $componentGroup = $features->getComponentGroups()->first();
        $this->addComponent($features, $page);
        $this->flush($manager);

        $items = [
            [
                'title' => 'Super-fast web page load times',
                'fileName' => 'feature-speed.svg'
            ],
            [
                'title' => 'Security taken seriously every step of the way',
                'fileName' => 'feature-security.svg'
            ],
            [
                'title' => 'Search-engine friendly features built into every page',
                'fileName' => 'feature-seo.svg'
            ]
        ];
        foreach ($items as $item) {
            $featureItem = new FeatureColumnsItem();
            $featureItem->setTitle($item['title']);
            $this->addComponent($featureItem, $componentGroup);
            $this->flush($manager);
            $this->fixtureFileUploader->upload(
                $featureItem,
                new File(sprintf('%s/home/%s', $this->sourceFileDir, $item['fileName']))
            );
        }

        return $features;
    }

    private function getCategoryFeatureList(): FeatureTextList
    {
        $featureList = new FeatureTextList();
        $featureList->setTitle('perfect <span class="has-text-secondary">for...</span>');
        /** @var ComponentGroup $componentGroup */
        $componentGroup = $featureList->getComponentGroups()->first();
        $items = [
            'Hairdresser',
            'Restaurants',
            'Tradesmen',
            'Cleaners',
            'Beauty Therapists',
            'Dog Groomers',
            'Self-Employed',
            'Artists',
            'Photographers',
            'Tutors',
            'Consultants',
            'Financial Services',
            'Charities',
            'Crafts',
            'Personal Trainers',
            'Mechanic',
            'Agents',
            'Writers'
        ];
        foreach ($items as $item) {
            $this->addComponent(
                (new FeatureTextListItem())->setTitle($item),
                $componentGroup
            );
        }

        return $featureList;
    }

    private function getFutureContent(): Content
    {
        $content = new Content();
        $content
            ->setContent('Progressive Web Apps (PWAs) are the future of websites and at Silverback we ensure your website is designed and developed to embrace these latest technologies to the fullest')
            ->setClassName('is-feature has-arrow')
            ->setTitle('the future of <span class="has-text-secondary">websites</span>')
        ;
        return $content;
    }

    private function getPricingContent(): Content
    {
        $content = new Content();
        $content
            ->setContent('Tell us what pages you want or we can help you work it out and we will send over an itemised quote ASAP. We can build and deploy a `minimum viable product` (MVP) for most web apps within our MVP starter package')
            ->setClassName('is-feature')
            ->setComponentName('HomePricingContent')
            ->setTitle('web app <span class="has-text-secondary">pricing</span>')
        ;
        return $content;
    }

    public function getDependencies(): array
    {
        return array_merge(parent::getDependencies(), [
        ]);
    }
}
