<?php

namespace Controller;

use Model\dbRepository;

class PageController
{
    /**
     * @var \PDO
     */
    private $request;

    /**
     * PageController constructor.
     * @param \PDO $pdo
     * Set $pdo
     */
    public function __construct(\PDO $pdo)
    {
        $this->request = new dbRepository($pdo);
    }

    /**
     * Loader controller
     */
    public function loaderAction()
    {
        /* Model access */

        /* Views */

        include APP_VIEW_DIR."page/loader.php";
        include APP_VIEW_DIR."partial/footer.php";
    }


    /**
     * Home controller
     */
    public function homeAction()
    {
        /* Model access */

        /* Views */

        include APP_VIEW_DIR."partial/header.php";
        include APP_VIEW_DIR."page/home.php";
        include APP_VIEW_DIR."partial/footer.php";
    }


    /**
     * Date controller
     */
    public function dateAction()
    {
        /* Model access */

        /* Views */

        include APP_VIEW_DIR."partial/header.php";
        include APP_VIEW_DIR."page/date.php";
        include APP_VIEW_DIR."partial/footer.php";
    }

}
