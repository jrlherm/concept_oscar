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

    /**
     * Get a json about a movie
     * @param $id
     * @return mixed
     */
    public function getMovie($id)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://api.themoviedb.org/3/movie/' . $id . '?api_key=7293cd7321f0ae4ca7110422285f7f35&query=TheBigShort');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);

        return json_decode($result, true);
    }

    /**
     * Get a json about an actor
     * @param $id
     * @return mixed
     */
    public function getActor($id)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://api.themoviedb.org/3/person/' . $id . '?api_key=7293cd7321f0ae4ca7110422285f7f35&query=TheBigShort');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);

        return json_decode($result, true);
    }


    /**
     * Get a json about an actor pict
     * @param $id
     * @return mixed
     */
    public function getActorPict($id)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://api.themoviedb.org/3/person/' . $id . '/images?api_key=7293cd7321f0ae4ca7110422285f7f35&query=TheBigShort');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);

        return json_decode($result, true);
    }


    /**
     * Init oscar table
     */
    public function initbase(){

        for($i = 87;$i > 0; $i--){
            $annee = 2014 - (87 - $i);
            $sql = 'INSERT INTO `oscar`(`year`, `edition`) VALUES (:theyear, :edition)';
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':theyear', $annee);
            $stmt->bindValue(':edition', $i);
            $stmt->execute();
        }

    }

    /**
     * Get all ceremony
     */
    public function getCeremony(){
        /* SQL */
        $sql = "SELECT * FROM `oscar` WHERE 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        $data = [];
        while($row = $stmt->fetchObject()){
            $data[] = $row;
        }
        return $data;
    }

    /**
     * Get id_api_movie form the winner of best picture
     * @param $year
     * @return mixed
     */
    public function getBestPicture($year){
        /* SQL */
        $sql = "SELECT `id_api_movie` FROM `best_picture` WHERE `year` = " . $year . " && `winner` = 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        $data = $stmt->fetchObject();
        return $data;
    }

    /**
     * @param $year
     * @return array
     */
    public function getAllOnDate($year){
        $sql = "SELECT * FROM `directing` WHERE `year` = " . $year . " && `winner` = 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchObject();

        $sql2 = "SELECT * FROM `actor_leading_role` WHERE `year` = " . $year . " && `winner` = 1";
        $stmt2 = $this->pdo->prepare($sql2);
        $stmt2->execute();
        $data2 = $stmt2->fetchObject();

        $sql3 = "SELECT * FROM `actor_supporting_role` WHERE `year` = " . $year . " && `winner` = 1";
        $stmt3 = $this->pdo->prepare($sql3);
        $stmt3->execute();
        $data3 = $stmt3->fetchObject();

        $sql4 = "SELECT * FROM `actress_leading_role` WHERE `year` = " . $year . " && `winner` = 1";
        $stmt4 = $this->pdo->prepare($sql4);
        $stmt4->execute();
        $data4 = $stmt4->fetchObject();

        $sql5 = "SELECT * FROM `actress_supporting_role` WHERE `year` = " . $year . " && `winner` = 1";
        $stmt5 = $this->pdo->prepare($sql5);
        $stmt5->execute();
        $data5 = $stmt5->fetchObject();

        $sql6 = "SELECT * FROM `best_picture` WHERE `year` = " . $year . " && `winner` = 1";
        $stmt6 = $this->pdo->prepare($sql6);
        $stmt6->execute();
        $data6 = $stmt6->fetchObject();

//        var_dump($data->id_api_director);
//        var_dump($data2->id_api_people);
//        var_dump($data3->id_api_people);
//        var_dump($data4->id_api_people);
//        var_dump($data5->id_api_people);

        $info1 = $this->getActor($data->id_api_director);
        $info2 = $this->getActor($data2->id_api_people);
        $info3 = $this->getActor($data3->id_api_people);
        $info4 = $this->getActor($data4->id_api_people);
        $info5 = $this->getActor($data5->id_api_people);

        $movie1 = $this->getMovie($data->id_api_movie);
        $movie2 = $this->getMovie($data2->id_api_movie);
        $movie3 = $this->getMovie($data3->id_api_movie);
        $movie4 = $this->getMovie($data4->id_api_movie);
        $movie5 = $this->getMovie($data5->id_api_movie);
        $movie6 = $this->getMovie($data6->id_api_movie);

//        echo '<img data-info="" src="http://image.tmdb.org/t/p/w185' . $picture1['profiles'][0]['file_path'] . '">';
//        echo '<img src="http://image.tmdb.org/t/p/w185' . $picture2['profiles'][0]['file_path'] . '">';
//        echo '<img src="http://image.tmdb.org/t/p/w185' . $picture3['profiles'][0]['file_path'] . '">';
//        echo '<img src="http://image.tmdb.org/t/p/w185' . $picture4['profiles'][0]['file_path'] . '">';
//        echo '<img src="http://image.tmdb.org/t/p/w185' . $picture5['profiles'][0]['file_path'] . '">';

        return [
            [$info1['name'], $info1['profile_path'], $movie1['original_title']],
            [$info2['name'], $info2['profile_path'], $movie2['original_title']],
            [$info3['name'], $info3['profile_path'], $movie3['original_title']],
            [$info4['name'], $info4['profile_path'], $movie4['original_title']],
            [$info5['name'], $info5['profile_path'], $movie5['original_title']],
            [$movie6['original_title'], $movie6['budget'], $movie6['revenue'], $movie6['poster_path']],
            [ floor(($movie1['budget'] + $movie2['budget'] + $movie3['budget'] + $movie4['budget'] + $movie5['budget'] + $movie6['budget']) / 6)],
            [ floor(($movie1['revenue'] + $movie2['revenue'] + $movie3['revenue'] + $movie4['revenue'] + $movie5['revenue'] + $movie6['revenue']) / 6)],
        ];

    }

    /**
     * Admin : Post data for graph1 in a db
     * @param $year
     * @param $name
     * @param $genre
     * @param $budget
     */
    public function postGraph1($year, $name, $genre, $budget){
        $sql = 'INSERT INTO `graph1`(`year`, `name_movie`, `budget_movie`,`category_movie`) VALUES (:theyear, :thename, :budget, :category)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':theyear', $year);
        $stmt->bindValue(':thename', $name);
        $stmt->bindValue(':budget', $budget);
        $stmt->bindValue(':category', $genre);
        $stmt->execute();
    }

}
