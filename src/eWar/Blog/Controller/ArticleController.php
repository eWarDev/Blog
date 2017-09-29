<?php

namespace eWar\Blog\Controller;

use eWar\Blog\Connector\ArticleConnector;
use eWar\Blog\Connector\UserConnector;
use eWar\Framework\Connector\ConnectorPool;
use eWar\Framework\Http\RequestObject;
use eWar\Framework\Rendering\Renderer\RendererInterface;
use eWar\Framework\Rendering\ViewControllerInterface;

/**
 * Class ArticleController
 * @package eWar\Blog\Controller
 */
class ArticleController implements ViewControllerInterface
{
    /**
     * @var ArticleConnector
     */
    private $articleConnector;

    /**
     * @var UserConnector
     */
    private $userConnector;


    /**
     * ArticleController constructor.
     *
     * @param ConnectorPool $connectorPool
     */
    public function __construct(ConnectorPool $connectorPool)
    {
        $this->articleConnector = $connectorPool->getConnector('ArticleConnector');
        $this->userConnector = $connectorPool->getConnector('UserConnector');
    }


    /**
     * getConnectors
     * @return array
     */
    public static function getConnectors() : array
    {
        return array(
            ArticleConnector::class,
            UserConnector::class,
        );
    }


    /**
     * getPageTitle
     * @return string
     */
    public function getPageTitle() : string
    {
        return 'Ich bin ein Artikel';
    }


    /**
     * showArticle
     *
     * @param RendererInterface $renderer
     * @param RequestObject     $requestData
     */
    public function showArticle(RendererInterface $renderer, RequestObject $requestData) : void
    {
        $payload = $requestData->getPayload();
        $article = $this->articleConnector->getArticleById($payload['id']);

        if (! $article->getId()) {
            $renderer->throwError(404);
        }

        $user = $this->userConnector->getUserById($article->getUserId());
        $renderer->output(array('article' => $article, 'author' => $user), 'blog/article/single');
    }
}
