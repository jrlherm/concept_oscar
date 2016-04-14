<?php

// Include lib
require_once 'simple_html_dom.php';
require_once '../../config/DbConnect.php';

// Get current date
$date = $_GET['date'];


// Begin parsing
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

// End parsing

// Begin API request and include id in db

foreach($item as $oscar){

    $current = '';

    // Curent oscar
   if ($oscar[0][0] == 'ACTOR IN A LEADING ROLE' || $oscar[0][0] == 'ACTOR'){
       $current = 'actor_leading_role';
   } elseif ($oscar[0][0] == 'ACTOR IN A SUPPORTING ROLE'){
       $current = 'actor_supporting_role';
   } elseif ($oscar[0][0] == 'ACTRESS IN A LEADING ROLE' || $oscar[0][0] == 'ACTRESS'){
       $current = 'actress_leading_role';
   } elseif ($oscar[0][0] == 'ACTRESS IN A SUPPORTING ROLE'){
       $current = 'actress_supporting_role';
   } elseif ($oscar[0][0] == 'BEST PICTURE' || $oscar[0][0] == 'BEST MOTION PICTURE' || $oscar[0][0] == 'OUTSTANDING PRODUCTION' || $oscar[0][0] == 'OUTSTANDING MOTION PICTURE'){
       $current = 'best_picture';
   } elseif ($oscar[0][0] == 'DIRECTING') {
       $current = 'directing';
   }

    // API request and include id in db
    for($i = 1; $i < count($oscar); $i += 2) {
        if (($current != '') && ($current != 'directing')) {
            if ($current == 'best_picture') {
                // API request for movie
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, 'https://api.themoviedb.org/3/search/movie?api_key=7293cd7321f0ae4ca7110422285f7f35&query=' . urlencode($oscar[$i][0]));
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($curl);
                curl_close($curl);
                $movie = json_decode($result, true);

                // Validation
                echo $current . '<br>';
                echo 'Le film suivant est recherché dans  l\'API :' . $oscar[$i][0] . '<br>';
                echo 'Un résulat est l\'id: ' . $movie['results'][0]['id'] . ' qui est relier au nom : ' . $movie['results'][0]['original_title'] . '<br>';

                // Insert in sql
                $sql = 'INSERT INTO `' . $current . '`(`year`,`id_api_movie`,`winner`) VALUES (:theyear, :idApiMovie, :winner)';
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(':theyear', $date);
                $stmt->bindValue(':idApiMovie', $movie['results'][0]['id']);
                $stmt->bindValue(':winner', $oscar[$i][1]);
                $stmt->execute();

            } else {
                // API request for movie
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, 'https://api.themoviedb.org/3/search/movie?api_key=7293cd7321f0ae4ca7110422285f7f35&query=' . urlencode($oscar[$i +1][0]));
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($curl);
                curl_close($curl);
                $movie = json_decode($result, true);

                // API request for actor
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, 'https://api.themoviedb.org/3/search/person?api_key=7293cd7321f0ae4ca7110422285f7f35&query=' . urlencode($oscar[$i][0]));
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($curl);
                curl_close($curl);
                $actor = json_decode($result, true);

                // Validation
                echo $current . '<br>';
                echo 'Le film suivant est recherché dans  l\'API :' . $oscar[$i +1 ][0] . '<br>';
                echo 'Un résulat est l\'id: ' . $movie['results'][0]['id'] . ' qui est relier au nom : ' . $movie['results'][0]['original_title'] . '<br>';
                echo 'L\'acteur suivant est recherché dans  l\'API :' . $oscar[$i][0] . '<br>';
                echo 'Un résulat est l\'id: ' . $actor['results'][0]['id'] . ' qui est relier au nom : ' . $actor['results'][0]['name'] . '<br><br>';

                // Insert in sql
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
                // API request for movie
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, 'https://api.themoviedb.org/3/search/movie?api_key=7293cd7321f0ae4ca7110422285f7f35&query=' . urlencode($oscar[$i][0]));
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($curl);
                curl_close($curl);
                $movie = json_decode($result, true);

                // API request for actor
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, 'https://api.themoviedb.org/3/search/person?api_key=7293cd7321f0ae4ca7110422285f7f35&query=' . urlencode($oscar[$i +1][0]));
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($curl);
                curl_close($curl);
                $actor = json_decode($result, true);

                // Validation
                echo $current . '<br>';
                echo 'Le film suivant est recherché dans  l\'API :' . $oscar[$i][0] . '<br>';
                echo 'Un résulat est l\'id: ' . $movie['results'][0]['id'] . ' qui est relier au nom : ' . $movie['results'][0]['original_title'] . '<br>';
                echo 'L\'acteur suivant est recherché dans  l\'API :' . $oscar[$i +1][0] . '<br>';
                echo 'Un résulat est l\'id: ' . $actor['results'][0]['id'] . ' qui est relier au nom : ' . $actor['results'][0]['name'] . '<br><br>';

                // Insert in sql
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
    echo '<br>';
    echo '<br>';
}


