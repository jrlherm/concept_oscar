<?php

namespace Model;

class dbRepository
{
    /**
     * @var \PDO
     */
    private $pdo;

    /**
     * dbRepository constructor.
     * @param \PDO $pdo
     * Set $pdo
     */
    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

}