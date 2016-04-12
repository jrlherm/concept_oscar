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

    public function test()
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://api.themoviedb.org/3/movie/550?api_key=7293cd7321f0ae4ca7110422285f7f35');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);

        return json_decode($result); // Json decode
    }

}