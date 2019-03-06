<?php

namespace App\DataFixtures\Model;

use Silverback\ApiComponentBundle\Entity\Content\Page\Page;
use Silverback\ApiComponentBundle\Entity\Route\Route;

class PageFixtureModel
{
    /** @var Route */
    private $route;
    /** @var Page */
    private $page;
    /** @var bool */
    private $isNew;

    /**
     * PageFixtureModel constructor.
     * @param Route $route
     * @param Page $page
     * @param bool $isNew
     */
    public function __construct(Route $route, Page $page, bool $isNew)
    {
        $this->route = $route;
        $this->page = $page;
        $this->isNew = $isNew;
    }

    /**
     * @return Route
     */
    public function getRoute(): Route
    {
        return $this->route;
    }

    /**
     * @return Page
     */
    public function getPage(): Page
    {
        return $this->page;
    }

    /**
     * @return bool
     */
    public function isNew(): bool
    {
        return $this->isNew;
    }
}
