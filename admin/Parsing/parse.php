<?php

require_once 'simple_html_dom.php';

$html = file_get_html('2015.html');

$item = [];

$i = 0;

foreach($html->find('.noteIndent') as $article){

    $j = 0;

    foreach($article->find('a') as $value){
        $item[$i][$j] = $value->plaintext;
        $j++;
    }

    $i++;
}

//echo '<pre>';
//print_r($item);
//echo '</pre>';

foreach($item as $oscar){

    $current = '';

    if ($oscar[0] == 'ACTOR IN A LEADING ROLE'){
        $current = 'actor_leading_role';
    } elseif ($oscar[0] == 'ACTOR IN A SUPPORTING ROLE'){
        $current = 'actor_supporting_role';
    } elseif ($oscar[0] == 'ACTRESS IN A LEADING ROLE'){
        $current = 'actress_leading_role';
    } elseif ($oscar[0] == 'ACTRESS IN A SUPPORTING ROLE'){
        $current = 'actress_supporting_role';
    } elseif ($oscar[0] == 'BEST PICTURE'){
        $current = 'best_picture';
    } elseif ($oscar[0] == 'DIRECTING'){
        $current = 'directing';
    }

    if($current != '' || $current == 'directing'){

        if($current == 'best_picture') {
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, 'https://api.themoviedb.org/3/search/movie?api_key=7293cd7321f0ae4ca7110422285f7f35&query=TheBigShort&query=' . urlencode($oscar[1]) );
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($curl);
            curl_close($curl);
            $movie = json_decode($result, true);

            echo 'Pour la recherche de film pour ' . $oscar[1] . '<br>';
            echo 'l id est ' . $movie['results'][0]['id'] . ' et le nom ' . $movie['results'][0]['original_title'];
        } else {
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, 'https://api.themoviedb.org/3/search/movie?api_key=7293cd7321f0ae4ca7110422285f7f35&query=TheBigShort&query=' . urlencode($oscar[2]) );
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($curl);
            curl_close($curl);
            $movie = json_decode($result, true);

            echo $current;
            echo 'Pour la recherche de film pour ' . $oscar[2] . '<br>';
            echo 'l id est ' . $movie['results'][0]['id'] . ' et le nom ' . $movie['results'][0]['original_title'];
        }
    }

//    if($current != 'directing'){
//        for($i = 1; $i < count($oscar); $i += 2){
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
    echo '<br>';
    echo '<br>';

}


//sleep(11);