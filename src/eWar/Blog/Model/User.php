<?php

namespace eWar\Blog\Model;
/**
 * Class User
 * @package eWar\Blog\Model
 */
class User
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $mail;


    /**
     * User constructor.
     *
     * @param array|null $rawData
     */
    public function __construct(array $rawData = null)
    {
        $this->id = $rawData['id'] ?? null;
        $this->name = $rawData['name'] ?? null;
        $this->mail = $rawData['mail'] ?? null;
    }


    /**
     * @return int
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
     * @return string
     */
    public function getName() : ?string
    {
        return $this->name;
    }


    /**
     * @param string $name
     */
    public function setName(string $name) : void
    {
        $this->name = $name;
    }


    /**
     * @return string
     */
    public function getMail() : ?string
    {
        return $this->mail;
    }


    /**
     * @param string $mail
     */
    public function setMail(string $mail) : void
    {
        $this->mail = $mail;
    }
}
