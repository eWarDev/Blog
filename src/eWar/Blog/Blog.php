<?php

namespace eWar\Blog;

use eWar\Framework\AbstractApplication;

/**
 * Class Blog
 * @package eWar\Blog
 */
class Blog extends AbstractApplication
{
    /**
     * getRoutes
     * @return array
     */
    public function getRoutes() : array
    {
        return (array) json_decode(file_get_contents(GLOBAL_DIR . '/config/routes.json'));
    }
}
