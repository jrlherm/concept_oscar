<div id="home">
    <div class="intro">
        <div class="presentation">
            <h2>what is it ?</h2>
            <div class="loader"></div>
            <p>The Oscars Retrospective let you see the data of all Academy Awards ceremonies since 1929. You can rediscover the Oscars through a new perspective, the data. We created three charts in order to represent nominee’s age, movies genre and budgets. To visualize them, click on the « discover » button, or if you want navigate through the Oscars year by year, scroll with the selector..</p>
        </div>
        <h6 class="scroll">scroll</h6>
        <div class="line"></div>
        <div class="round"></div>
    </div>

    <div class="retrospective">
        <h1>oscars</h1>
        <h2>retrospective</h2>
        <div class="button"><a href="global">discover</a></div>
    </div>


    <div class="date">
        <h1>Explore the history</h1>
        <h3>Choose a date</h3>
        <div class="year-selector">
            <div class="effect effect-left">

            </div>
            <div class="effect effect-right">

            </div>
            <div class="line"></div>
            <div class="owl-carousel">
                <? foreach($ceremony as $year){
                    $new_year = (date('Y') - 1  - ($year->year - 1930));
                    echo '<div class="item" data-year="' . $new_year .'">' . $new_year .'</div>';
                } ?>
            </div>
        </div>
        <a class="current-year" href="date&year=<?= date('Y') - 1 ?>"><?= date('Y') - 1 ?></a>
    </div>

    <div class="facts">
        <div class="left">
            <div class="left1">
                <h3>facts and figures about the american's awards</h3>
                <h6>the most nominations received by any movie is</h6>
                <h2>14</h2>
            </div>
            <div class="left2">
                <h6 class="center">the only actors to win posthumous acting awards<br>are both australian<br> - peter finch and heath ledger</h6>
                <h6>number of nominations for meryl streep, the most of any performer</h6>
                <h4>17</h4>
            </div>
        </div>
        <div class="right">
            <div class="right1">
                <h4>8.5</h4>
                <h6>weight of the<br>statue in pounds</h6>
                <h4>13.5</h4>
                <h6>height of the<br>statue in inches</h6>
            </div>
            <div class="right2">
                <h4>5/16/29</h4>
                <h6>the first academy<br>awards are held. tickets for the event cost 5$</h6>
                <h4>0</h4>
                <h6>number of best director awards given to alfred hitchcock and stanley kubrick</h6>
            </div>
        </div>
    </div>

</div>

