<div id="date">
    <? $current_year++; ?>
    <div class="background" style="background: url('public/img/oscar/<?= $current_year ?>.jpg') center center; background-size: cover;">
        <div class="line-left"></div>
        <div class="previous-year"><a href="date&year=<?php if($current_year - 1 <= '1930'){ echo date('Y')-1; }else{echo $current_year-1;} ?>"><?php if($current_year - 1 <= '1930'){ echo date('Y')-1; }else{echo $current_year-1;} ?></a></div>
        <div class="line-right"></div>
        <div class="next-year"><a href="date&year=<?php if($current_year + 1 >= (date('Y')-1)){ echo '1930'; }else{echo $current_year+1;} ?>"><?php if($current_year + 1 >= (date('Y')-1)){ echo '1930'; }else{echo $current_year+1;} ?></a></div>
        <div class="header"><?= $current_year ?></div>
        <div class="scroll">scroll</div>
        <div class="vertical-line"></div>
    </div>

    <div class="information">
        <div class="info">
            <h4>Best Picture</h4>
            <p><?= $result[5][0] ?></p>
            <img src="http://image.tmdb.org/t/p/w185<?= $result[5][3] ?>" alt="">
        </div>
        <div class="info">
            <h4>Budget</h4>
            <p><?= number_format($result[5][1], 2, ',', ' '); ?> $</p>
        </div>
        <div class="info">
            <h4>Revenue</h4>
            <p><?= number_format($result[5][2], 2, ',', ' '); ?> $</p>
        </div>
        <div class="line"></div>
        <div class="info">
            <h4>Average Budget</h4>
            <p><?= number_format($result[6][0], 2, ',', ' '); ?> $</p>
        </div>
        <div class="info">
            <h4>Average Revenue</h4>
            <p><?= number_format($result[7][0], 2, ',', ' '); ?> $</p>
        </div>
    </div>

    <div class="ceremony-winners">
        <div class="rectangle">
            <h2>the winners of the ceremony</h2>
            <h3>choose a winner</h3>
            <img class="img-1" data-category="Directing" data-name="<?= $result[0][0] ?> - <?= $result[0][2] ?>" src="http://image.tmdb.org/t/p/w185<?= $result[0][1] ?>">
            <img class="img-2" data-category="Actor Leading Role" data-name="<?= $result[1][0] ?> - <?= $result[1][2] ?>" src="http://image.tmdb.org/t/p/w185<?= $result[1][1] ?>">
            <img class="img-3" data-category="Actor Supporting Role" data-name="<?= $result[2][0] ?> - <?= $result[2][2] ?>" src="http://image.tmdb.org/t/p/w185<?= $result[2][1] ?>">
            <img class="img-4" data-category="Actress Leading Role" data-name="<?= $result[3][0] ?> - <?= $result[3][2] ?>" src="http://image.tmdb.org/t/p/w185<?= $result[3][1] ?>">
            <img class="img-5" data-category="Actress Supporting Role" data-name="<?= $result[4][0] ?> - <?= $result[4][2] ?>" src="http://image.tmdb.org/t/p/w185<?= $result[4][1] ?>">
        </div>

        <div class="display-results">
            <div class="category-results">best actor</div>
            <div class="name-results">Léonardo Di Caprio - The Revenant</div>
        </div>
    </div>
</div>
