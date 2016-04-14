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

    public function getMovie($id)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://api.themoviedb.org/3/movie/' . $id . '?api_key=7293cd7321f0ae4ca7110422285f7f35&query=TheBigShort');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);

        return json_decode($result);
    }

    public function getActor($id)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://api.themoviedb.org/3/person/' . $id . '?api_key=7293cd7321f0ae4ca7110422285f7f35&query=TheBigShort');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);

        return json_decode($result);
    }

//    public function initbase(){
//
//        for($i = 87;$i > 0; $i--){
//            $annee = 2014 - (87 - $i);
//            $sql = 'INSERT INTO `oscar`(`year`, `edition`) VALUES (:theyear, :edition)';
//            $stmt = $this->pdo->prepare($sql);
//            $stmt->bindValue(':theyear', $annee);
//            $stmt->bindValue(':edition', $i);
//            $stmt->execute();
//        }
//
//    }
}
