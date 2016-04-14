<?php

require_once 'simple_html_dom.php';

$date = $_GET['date'];

$html = file_get_html($date . '.html');

$item = [];

$i = 0;

foreach($html->find('.noteIndent') as $article){

    $j = 0;

    foreach($article->find('a') as $value){
        $item[$i][$j][0] = $value->plaintext;
        $j++;
    }

    $j = 1;

    foreach($article->find('td') as $td){
        if($td->align == 'RIGHT'  && $td->plaintext == '*'){
            $item[$i][$j*2-1][1] = 1;
            $j++;
        } elseif($td->align == 'RIGHT') {
            $item[$i][$j*2-1][1] = 0;
            $j++;
        }
    }

    $i++;
}

//echo '<pre>';
//print_r($item);
//echo '</pre>';

define('DB_HOST', 'localhost');
define('DB_NAME', 'semaine_intensive');
define('DB_USER', 'root');
define('DB_PASS', 'root'); // '' by default on windows

/**
 * DB connect
 */

try
{
    // Try to connect to database
    $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);

    // Set fetch mode to object
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
}
catch (Exception $e)
{
    // Failed to connect
    die($e->getMessage());
}


foreach($item as $oscar){

    $current = '';

    if ($oscar[0][0] == 'ACTOR IN A LEADING ROLE'){
        $current = 'actor_leading_role';
    } elseif ($oscar[0][0] == 'ACTOR IN A SUPPORTING ROLE'){
        $current = 'actor_supporting_role';
    } elseif ($oscar[0][0] == 'ACTRESS IN A LEADING ROLE'){
        $current = 'actress_leading_role';
    } elseif ($oscar[0][0] == 'ACTRESS IN A SUPPORTING ROLE'){
        $current = 'actress_supporting_role';
    } elseif ($oscar[0][0] == 'BEST PICTURE'){
        $current = 'best_picture';
    } elseif ($oscar[0][0] == 'DIRECTING'){
        $current = 'directing';
    }

    for($i = 1; $i < count($oscar); $i += 2) {
        if (($current != '') && ($current != 'directing')) {
            if ($current == 'best_picture') {
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, 'https://api.themoviedb.org/3/search/movie?api_key=7293cd7321f0ae4ca7110422285f7f35&query=TheBigShort&query=' . urlencode($oscar[$i][0]));
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($curl);
                curl_close($curl);
                $movie = json_decode($result, true);

                echo $current . '<br>';
                echo 'Le film suivant est recherché dans  l\'API :' . $oscar[$i][0] . '<br>';
                echo 'Un résulat est l\'id: ' . $movie['results'][0]['id'] . ' qui est relier au nom : ' . $movie['results'][0]['original_title'] . '<br>';

                $sql = 'INSERT INTO `' . $current . '`(`year`,`id_api_movie`,`winner`) VALUES (:theyear, :idApiMovie, :winner)';
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(':theyear', $date);
                $stmt->bindValue(':idApiMovie', $movie['results'][0]['id']);
                $stmt->bindValue(':winner', $oscar[$i][1]);
                $stmt->execute();

            } else {
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, 'https://api.themoviedb.org/3/search/movie?api_key=7293cd7321f0ae4ca7110422285f7f35&query=TheBigShort&query=' . urlencode($oscar[$i +1][0]));
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($curl);
                curl_close($curl);
                $movie = json_decode($result, true);

                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, 'https://api.themoviedb.org/3/search/person?api_key=7293cd7321f0ae4ca7110422285f7f35&query=TheBigShort&query=' . urlencode($oscar[$i][0]));
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($curl);
                curl_close($curl);
                $actor = json_decode($result, true);

                echo $current . '<br>';
                echo 'Le film suivant est recherché dans  l\'API :' . $oscar[$i +1 ][0] . '<br>';
                echo 'Un résulat est l\'id: ' . $movie['results'][0]['id'] . ' qui est relier au nom : ' . $movie['results'][0]['original_title'] . '<br>';
                echo 'L\'acteur suivant est recherché dans  l\'API :' . $oscar[$i][0] . '<br>';
                echo 'Un résulat est l\'id: ' . $actor['results'][0]['id'] . ' qui est relier au nom : ' . $actor['results'][0]['name'] . '<br><br>';

                $sql = 'INSERT INTO `' . $current . '`(`year`, `id_api_people`,`id_api_movie`,`winner`) VALUES (:theyear, :idApiPeople, :idApiMovie, :winner)';
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(':theyear', $date);
                $stmt->bindValue(':idApiPeople', $actor['results'][0]['id']);
                $stmt->bindValue(':idApiMovie', $movie['results'][0]['id']);
                $stmt->bindValue(':winner', $oscar[$i][1]);
                $stmt->execute();
            }
        } else {
            if($current == 'directing') {
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, 'https://api.themoviedb.org/3/search/movie?api_key=7293cd7321f0ae4ca7110422285f7f35&query=TheBigShort&query=' . urlencode($oscar[$i][0]));
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($curl);
                curl_close($curl);
                $movie = json_decode($result, true);

                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, 'https://api.themoviedb.org/3/search/person?api_key=7293cd7321f0ae4ca7110422285f7f35&query=TheBigShort&query=' . urlencode($oscar[$i +1][0]));
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($curl);
                curl_close($curl);
                $actor = json_decode($result, true);

                echo $current . '<br>';
                echo 'Le film suivant est recherché dans  l\'API :' . $oscar[$i][0] . '<br>';
                echo 'Un résulat est l\'id: ' . $movie['results'][0]['id'] . ' qui est relier au nom : ' . $movie['results'][0]['original_title'] . '<br>';
                echo 'L\'acteur suivant est recherché dans  l\'API :' . $oscar[$i +1][0] . '<br>';
                echo 'Un résulat est l\'id: ' . $actor['results'][0]['id'] . ' qui est relier au nom : ' . $actor['results'][0]['name'] . '<br><br>';

                $sql = 'INSERT INTO `' . $current . '`(`year`, `id_api_director`,`id_api_movie`,`winner`) VALUES (:theyear, :idApiPeople, :idApiMovie, :winner)';
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(':theyear', $date);
                $stmt->bindValue(':idApiPeople', $actor['results'][0]['id']);
                $stmt->bindValue(':idApiMovie', $movie['results'][0]['id']);
                $stmt->bindValue(':winner', $oscar[$i][1]);
                $stmt->execute();
            }
        }
    }

//    if($current != 'directing'){
//            $curl = curl_init();
//            curl_setopt($curl, CURLOPT_URL, 'https://api.themoviedb.org/3/search/movie?api_key=7293cd7321f0ae4ca7110422285f7f35&query=TheBigShort&query=' . $oscar[$i] );
//            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//            $result = curl_exec($curl);
//            curl_close($curl);
//            $movie = json_decode($result, true);
//            echo '<pre>';
//            var_dump($movie['results'][0]['id']);
//            echo '</pre>';
//            sleep(1);
//        }
//    } else {
//        echo 'director';
//    }

    echo '<br>';
    echo '<br>';
    echo '<br>';

}


//sleep(11);