<?php

namespace eWar\Blog\Connector;

use eWar\Blog\Model\User;
use eWar\Framework\Connector\ConnectorInterface;
use eWar\Framework\Database\Connection;

/**
 * Class UserConnector
 * @package eWar\Blog\Connector
 */
class UserConnector implements ConnectorInterface
{
    /**
     * @var Connection
     */
    private $connection;


    /**
     * UserConnector constructor.
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
     * @param int $userId
     *
     * @return User
     */
    public function getUserById(int $userId) : User
    {
        $user = $this->connection
            ->select()
            ->from('user')
            ->where('id = :id')
            ->bindParam(':id', $userId, 'int')
            ->getSingleResult();

        return $user ? new User($user) : new User();
    }
}
