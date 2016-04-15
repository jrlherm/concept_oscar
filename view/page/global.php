<div id="global">
    <div class="background">
        <div class="line-left"></div>
        <div class="retrospective">
            <h1>oscars</h1>
            <h2>retrospective</h2>
        </div>
        <div class="line-right"></div>
        <div class="scroll">scroll</div>
        <div class="vertical-line"></div>
    </div>
    <div class="graph-container">
        <div class="first-graph">
            <h2>radar chart</h2>
            <h3>genre of nominated movies</h3>
            <canvas id="radarChart" width="840" height="600"></canvas>
        </div>
        <div class="second-graph">
            <h2>line chart</h2>
            <h3>most awarded movie per year</h3>

            <div id="container" class="width-600">
                <div id="center-container">
                    <div id="dataviz"></div>
                </div>
            </div>
        </div>

        <div class="third-graph">
            <h2>pie chart</h2>
            <h3>nominee's age</h3>
        </div>

    </div>
</div>

<script src="public/js/lib/chart.min.js"></script>
<script>
    // Radar Data
    var radarData = {
        labels : ["A c t i o n","D r a m a","R o m a n c e","C o m e d y","W e s t e r n","S c i - f i","T h r i l l e r", "H i s t o r y"],
        datasets : [
            {
                fillColor : "rgba(197,165,78,0.6)",
                data : [15,29,10,31,46,30,11,50] <?  ?>
            },
            {
                fillColor : "rgba(195,195,195,0.5)",
                data : [45,18,9,12,36,47,30,30]
            }
        ]
    };
</script>