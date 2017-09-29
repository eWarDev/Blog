<?php

namespace eWar\Blog\Model;

/**
 * Class Article
 * @package eWar\Blog\Model
 */
class Article
{

    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $title;

    /**
     * @var string|null
     */
    private $content;

    /**
     * @var int|null
     */
    private $userId;


    /**
     * Article constructor.
     *
     * @param array|null $rawData
     */
    public function __construct(array $rawData = null)
    {
        $this->id = $rawData['id'] ?? null;
        $this->title = $rawData['title'] ?? null;
        $this->content = $rawData['content'] ?? null;
        $this->userId = $rawData['user_id'] ?? null;
    }


    /**
     * @return int|null
     */
    public function getUserId() : ?int
    {
        return $this->userId;
    }


    /**
     * @param int|null $userId
     */
    public function setUserId($userId) : void
    {
        $this->userId = $userId;
    }


    /**
     * @return string|null
     */
    public function getContent() : ?string
    {
        return $this->content;
    }


    /**
     * @param string $content
     */
    public function setContent(string $content) : void
    {
        $this->content = $content;
    }


    /**
     * @return string|null
     */
    public function getTitle() : ?string
    {
        return $this->title;
    }


    /**
     * @param string $title
     */
    public function setTitle(string $title) : void
    {
        $this->title = $title;
    }


    /**
     * @return int|null
     */
    public function getId() : ?int
    {
        return $this->id;
    }


    /**
     * @param int $id
     */
    public function setId(int $id) : void
    {
        $this->id = $id;
    }


    /**
     * getSummary
     *
     * @param int $length
     *
     * @return bool|string
     */
    public function getSummary(int $length = 300) : string
    {
        return substr($this->content, 0, $length);
    }
}
