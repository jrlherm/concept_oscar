<?php

namespace Controller;

use Model\dbRepository;

class AdminController
{
    /**
     * @var \PDO
     */
    private $request;

    /**
     * AdminController constructor.
     * @param \PDO $pdo
     * Set $pdo
     */
    public function __construct(\PDO $pdo)
    {
        $this->request = new dbRepository($pdo);
    }

    /**
     * Parsing controller
     */
    public function parsingAction()
    {
        require APP_ROOT_DIR."/admin/parsing/parse.php";
    }

    /**
     * Graph 1 controller
     */
    public function graph1Action()
    {
        $ceremony = $this->request->getCeremony();

        foreach($ceremony as $year){
            $best = $this->request->getBestPicture($year->year);
            $info = $this->request->getMovie($best->id_api_movie);

            echo $year->year . '<br>';
            echo $info['budget'] . '<br>';
            echo $info['original_title'] . '<br>';
            echo $info['genres'][0]['name'] . '<br><br><br>';

            $this->request->postGraph1($year->year, $info['original_title'], $info['genres'][0]['name'] . ';' .$info['genres'][1]['name'] . ';' .$info['genres'][2]['name'], $info['budget']);
        }
    }

    /**
     * Graph 2 controller
     */
    public function graph2Action()
    {
        $ceremony = $this->request->getCeremony();

        foreach($ceremony as $year){
            $best = $this->request->getBestPicture($year->year);
            $info = $this->request->getMovie($best->id_api_movie);


        }
    }

    /**
     * Graph 3 controller
     */
    public function graph3Action()
    {

    }

}
