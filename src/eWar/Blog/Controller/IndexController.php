<?php

namespace eWar\Blog\Controller;

use eWar\Blog\Connector\ArticleConnector;
use eWar\Framework\Connector\ConnectorPool;
use eWar\Framework\Rendering\Renderer\RendererInterface;
use eWar\Framework\Rendering\ViewControllerInterface;

/**
 * Class IndexController
 * @package eWar\Blog\Controller
 */
class IndexController implements ViewControllerInterface
{
    /**
     * @var ArticleConnector
     */
    private $articleConnector;


    /**
     * IndexController constructor.
     *
     * @param ConnectorPool $connectorPool
     */
    public function __construct(ConnectorPool $connectorPool)
    {
        $this->articleConnector = $connectorPool->getConnector('ArticleConnector');
    }


    /**
     * getConnectors
     * @return array
     */
    public static function getConnectors() : array
    {
        return array(
            ArticleConnector::class,
        );
    }


    /**
     * getPageTitle
     * @return string
     */
    public function getPageTitle() : string
    {
        return 'test titel';
    }


    /**
     * showBlog
     *
     * @param RendererInterface $renderer
     */
    public function showBlog(RendererInterface $renderer) : void
    {
        $articles = $this->articleConnector->getLatestArticles();

        $renderer->output(array('articles' => $articles), 'blog/index/index');
    }
}
