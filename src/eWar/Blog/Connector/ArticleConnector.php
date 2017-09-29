<?php

namespace eWar\Blog\Connector;

use eWar\Blog\Model\Article;
use eWar\Framework\Connector\ConnectorInterface;
use eWar\Framework\Database\Connection;

/**
 * Class ArticleConnector
 * @package eWar\Blog\Connector
 */
class ArticleConnector implements ConnectorInterface
{
    /**
     * @var Connection
     */
    private $connection;


    /**
     * ArticleConnector constructor.
     *
     * @param Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }


    /**
     * getArticleById
     *
     * @param int $articleId
     *
     * @return Article
     */
    public function getArticleById(int $articleId) : Article
    {
        $article = $this->connection
            ->select()
            ->from('article')
            ->where('id = :id')
            ->bindParam(':id', $articleId, 'int')
            ->getSingleResult();

        return $article ? new Article($article) : new Article();
    }


    /**
     * getLatestArticles
     *
     * @return Article[]
     */
    public function getLatestArticles() : array
    {
        $data = $this->connection
            ->select()
            ->from('article')
            ->getResult();

        return $this->buildArticlesFromArray($data);
    }


    /**
     * buildArticlesFromArray
     *
     * @param array $raw
     *
     * @return array
     */
    private function buildArticlesFromArray(array $raw) : array
    {
        $output = array();

        foreach ($raw as $article) {
            $output[] = new Article($article);
        }

        return $output;
    }
}
