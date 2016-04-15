/**
 * Created by clementlong on 07/04/2016.
 */

$('.home').on('mouseenter mouseleave', function(){
    $('.arrow').toggleClass('arrow-hover');
});

scrollToCustom = function(y, progress) {
    if(y-5 < progress)
        progress = y;
    window.scrollTo(0, progress);
    progress = progress + 4;
    if( y > progress)
        window.setTimeout(function() { scrollToCustom(y, progress); }, 2);
};

$('.scroll').on('click', function(){
    console.log($('.background').offsetHeight);
    scrollToCustom(895,document.documentElement.scrollTop || document.body.scrollTop);
});

$('.rectangle img').on('mouseenter', function(){
    $('.category-results').text($(this).attr('data-category'));
    $('.name-results').text($(this).attr('data-name'));
});

var owl = $('.owl-carousel');

owl.owlCarousel({
    loop:true,
    items: 8,
    center: true
});

owl.on('changed.owl.carousel', function(event) {
    window.setInterval(function(){
        $('.current-year').text($('.center').find('.item').attr('data-year')).attr('href', 'date&year=' + $('.center').find('.item').attr('data-year'));
    }, 200);

});


// ======================================================
// Radar Chart
// ======================================================

// Radar Chart Options
var radarOptions = {

    //Boolean - If we show the scale above the chart data
    scaleOverlay : false,

    //Boolean - If we want to override with a hard coded scale
    scaleOverride : true,

    //** Required if scaleOverride is true **
    //Number - The number of steps in a hard coded scale
    scaleSteps : 5,

    //Number - The value jump in the hard coded scale
    scaleStepWidth : 10,

    //Number - The centre starting value
    scaleStartValue : 0,

    //Boolean - Whether to show lines for each scale point
    scaleShowLine : true,

    //String - Colour of the scale line
    scaleLineColor : "#2C2C2C",

    //Number - Pixel width of the scale line
    scaleLineWidth : 1,

    //Boolean - Whether to show labels on the scale
    scaleShowLabels : false,

    //Interpolated JS string - can access value
    scaleLabel : "<%=value%>",

    //String - Scale label font declaration for the scale label
    scaleFontFamily : "Bebas Neue Book",

    //Number - Scale label font size in pixels
    scaleFontSize : 12,

    //String - Scale label font weight style
    scaleFontStyle : "normal",

    //String - Scale label font colour
    scaleFontColor : "#666",

    //Boolean - Show a backdrop to the scale label
    scaleShowLabelBackdrop : true,

    //String - The colour of the label backdrop
    scaleBackdropColor : "#2C2C2C",

    //Number - The backdrop padding above & below the label in pixels
    scaleBackdropPaddingY : 2,

    //Number - The backdrop padding to the side of the label in pixels
    scaleBackdropPaddingX : 2,

    //Boolean - Whether we show the angle lines out of the radar
    angleShowLineOut : true,

    //String - Colour of the angle line
    angleLineColor : "rgba(255,255,255,0.3)",

    //Number - Pixel width of the angle line
    angleLineWidth : 1,

    //String - Point label font declaration
    pointLabelFontFamily : "Bebas Neue Book",

    //String - Point label font weight
    pointLabelFontStyle : "normal",

    //Number - Point label font size in pixels
    pointLabelFontSize : 15,

    //String - Point label font colour
    pointLabelFontColor : "#C3C3C3",

    // C3C3C3 gris C5A54E jaune

    //Boolean - Whether to show a dot for each point
    pointDot : true,

    //Number - Radius of each point dot in pixels
    pointDotRadius : 3,

    //Number - Pixel width of point dot stroke
    pointDotStrokeWidth : 0.5,

    //Boolean - Whether to show a stroke for datasets
    datasetStroke : true,

    //Number - Pixel width of dataset stroke
    datasetStrokeWidth : 1,

    //Boolean - Whether to fill the dataset with a colour
    datasetStroke : true,

    //Boolean - Whether to animate the chart
    animation : true,

    //Number - Number of animation steps
    animationSteps : 60,

    //String - Animation easing effect
    animationEasing : "easeOutQuart",

    //Function - Fires when the animation is complete
    onAnimationComplete : null

};

//Get the context of the Radar Chart canvas element we want to select
var ctx = document.querySelector('canvas').getContext("2d");

// Create the Radar Chart
var myRadarChart = new Chart(ctx).Radar(radarData, radarOptions);

var labelType, useGradients, nativeTextSupport, animate;

(function() {
    var ua = navigator.userAgent,
        iStuff = ua.match(/iPhone/i) || ua.match(/iPad/i),
        typeOfCanvas = typeof HTMLCanvasElement,
        nativeCanvasSupport = (typeOfCanvas == 'object' || typeOfCanvas == 'function'),
        textSupport = nativeCanvasSupport
            && (typeof document.createElement('canvas').getContext('2d').fillText == 'function');

    //I'm setting this based on the fact that ExCanvas provides text support for IE
    //and that as of today iPhone/iPad current text support is lame
    labelType = (!nativeCanvasSupport || (textSupport && !iStuff))? 'Native' : 'HTML';
    nativeTextSupport = labelType == 'Native';
    animate = !(iStuff || !nativeCanvasSupport);
})();



function init(){
    //init data
    var json = {
        'label': ['Nominee\'s percentage aged between 0 and 19 years old', 'Nominee\'s percentage aged between 20 and 29 years old', 'Nominee\'s percentage aged between 30 and 39 years old', 'Nominee\'s percentage aged between 40 and 49 years old', 'Nominee\'s percentage aged between 50 and 59 years old', 'Nominee\'s percentage aged between 60 and 69 years old', 'Nominee\'s percentage aged between 70 and 79 years old', 'Age range : 80 years old and more'],
        'values': [
            { 'label':1929, 'values': [4, 12, 45,  8,  6, 15, 10, 10] },
            { 'label':1930, 'values': [4, 12, 50,  8,  6, 15, 10, 5] },
            { 'label':1931, 'values': [4, 12, 45,  10,  4, 10, 15, 10] },
            { 'label':1932, 'values': [4, 10, 47,  8,  6, 13, 12, 10] },
            { 'label':1933, 'values': [4, 12, 35,  13,  6, 15, 15, 10] },
            { 'label':1934, 'values': [4, 17, 40,  8,  6, 20, 10, 5] },
            { 'label':1935, 'values': [9, 17, 30,  8,  11, 15, 10, 10] },
            { 'label':1936, 'values': [4, 12, 35,  8,  6, 20, 15, 10] },
            { 'label':1937, 'values': [10, 12, 19,  10,  16, 20, 13, 10] },
            { 'label':1938, 'values': [10, 20, 25,  8,  12, 15, 10, 10] },
            { 'label':1939, 'values': [5, 14, 20,  9,  16, 35, 10, 0] },
            { 'label':1940, 'values': [10, 12, 19,  10,  16, 20, 13, 10] },
            { 'label':1941, 'values': [9, 17, 30,  8,  11, 15, 10, 10] },
            { 'label':1942, 'values': [10, 20, 25,  8,  12, 15, 10, 10] },
            { 'label':1943, 'values': [4, 17, 40,  8,  6, 20, 10, 5] },
            { 'label':1944, 'values': [9, 17, 30,  8,  11, 15, 10, 10] },
            { 'label':1945, 'values': [4, 12, 35,  13,  6, 15, 15, 10] },
            { 'label':1946, 'values': [4, 10, 47,  8,  6, 13, 12, 10] },
            { 'label':1947, 'values': [4, 12, 50,  8,  6, 15, 10, 5]},
            { 'label':1948, 'values': [10, 12, 19,  10,  16, 20, 13, 10] },
            { 'label':1949, 'values': [5, 14, 20,  14,  16, 30, 10, 0] },
            { 'label':1950, 'values': [4, 12, 35,  13,  6, 15, 15, 10] },
            { 'label':1951, 'values': [10, 12, 19,  10,  16, 20, 16, 7] },
            { 'label':1952, 'values': [0, 12, 19,  10,  16, 30, 11, 12] },
            { 'label':1953, 'values': [5, 12, 14, 5,  21, 30, 19, 4] },
            { 'label':1954, 'values': [10, 12, 19,  10,  16, 20, 13, 10] },
            { 'label':1955, 'values': [5, 14, 10,  19,  16, 25, 16, 4] },
            { 'label':1956, 'values': [5, 14, 15,  14,  16, 25, 10, 10] },
            { 'label':1957, 'values': [5, 12, 14, 15,  11, 30, 13, 10]},
            { 'label':1958, 'values': [5, 2, 24, 15,  21, 20, 13, 10] },
            { 'label':1959, 'values': [5, 14, 15,  14,  16, 25, 12, 8] },
            { 'label':1960, 'values': [10, 12, 19,  10,  16, 25, 13, 5] },
            { 'label':1961, 'values': [10, 20, 25,  8,  12, 15, 12, 8] },
            { 'label':1962, 'values': [4, 12, 25,  18,  6, 20, 15, 10] },
            { 'label':1963, 'values': [4, 12, 45,  10,  4, 10, 15, 10] },
            { 'label':1964, 'values': [10, 20, 25,  8,  12, 15, 10, 10] },
            { 'label':1965, 'values': [9, 17, 30,  8,  11, 15, 10, 10] },
            { 'label':1966, 'values': [4, 12, 35,  13,  6, 15, 15, 10] },
            { 'label':1967, 'values': [4, 12, 50,  8,  6, 15, 10, 5] },
            { 'label':1968, 'values': [10, 12, 19,  10,  16, 20, 13, 10] },
            { 'label':1969, 'values': [0, 12, 19,  10,  16, 30, 13, 10] },
            { 'label':1970, 'values': [10, 20, 25,  8,  12, 15, 10, 10] },
            { 'label':1961, 'values': [10, 20, 25,  8,  12, 15, 10, 10] },
            { 'label':1971, 'values': [4, 17, 40,  8,  6, 20, 10, 5] },
            { 'label':1972, 'values': [4, 12, 35,  13,  6, 15, 15, 10] },
            { 'label':1973, 'values': [10, 20, 25,  8,  12, 15, 10, 10]},
            { 'label':1974, 'values': [10, 20, 25,  8,  12, 15, 10, 10] },
            { 'label':1975, 'values': [9, 17, 30,  14,  16, 10, 10, 4] },
            { 'label':1976, 'values': [10, 20, 25,  8,  12, 15, 10, 10]  },
            { 'label':1977, 'values': [4, 17, 40,  8,  6, 20, 10, 5]  },
            { 'label':1978, 'values': [9, 17, 30,  14,  16, 10, 10, 4] },
            { 'label':1979, 'values': [10, 20, 25,  8,  12, 15, 10, 10] },
            { 'label':1980, 'values': [4, 17, 40,  8,  6, 20, 10, 5]},
            { 'label':1981, 'values': [4, 12, 50,  8,  6, 15, 10, 5] },
            { 'label':1982, 'values': [9, 17, 30,  14,  16, 10, 10, 4] },
            { 'label':1983, 'values': [4, 12, 45,  8,  6, 15, 10, 10] },
            { 'label':1984, 'values': [10, 20, 25,  8,  12, 15, 10, 10] },
            { 'label':1985, 'values': [4, 17, 40,  8,  6, 20, 10, 5] },
            { 'label':1986, 'values': [4, 17, 40,  8,  6, 20, 10, 5] },
            { 'label':1987, 'values': [9, 17, 30,  14,  16, 10, 10, 4]},
            { 'label':1988, 'values': [6, 12, 47,  6,  6, 15, 10, 8] },
            { 'label':1989, 'values': [9, 17, 30,  14,  16, 10, 10, 4]},
            { 'label':1990, 'values': [4, 12, 50,  8,  6, 15, 10, 5] },
            { 'label':1991, 'values': [6, 12, 47,  6,  6, 15, 10, 8] },
            { 'label':1992, 'values': [9, 17, 30,  14,  16, 10, 10, 4] },
            { 'label':1993, 'values': [8, 8, 41,  16,  4, 13, 10,  10]},
            { 'label':1994, 'values': [6, 12, 47,  6,  6, 15, 10,  8] },
            { 'label':1995, 'values': [7, 13, 45,  8,  4, 16, 8,  9] },
            { 'label':1996, 'values': [10, 8, 46,  8,  3, 15, 13,  7] },
            { 'label':1997, 'values': [5, 11, 45,  8,  9, 15, 10,  9] },
            { 'label':1998, 'values': [5, 12, 47,  6,  6, 15, 11,  8]},
            { 'label':1999, 'values': [8, 8, 41,  16,  4, 13, 10,  10] },
            { 'label':2000, 'values': [7, 10, 40,  11,  9, 15, 9,  9] },
            { 'label':2001, 'values': [5, 12, 39,  10,  6, 15, 13,  10] },
            { 'label':2002, 'values': [4, 10, 51,  10,  2, 19, 8,  6] },
            { 'label':2003, 'values': [6, 12, 47,  6,  6, 15, 10,  8] },
            { 'label':2004, 'values': [10, 8, 46,  8,  3, 15, 13,  7] },
            { 'label':2005, 'values': [7, 13, 45,  8,  4, 16, 8,  9] },
            { 'label':2006, 'values': [5, 12, 47,  6,  6, 15, 11,  8] },
            { 'label':2007, 'values': [6, 12, 47,  6,  6, 15, 10,  8] },
            { 'label':2008, 'values': [1, 12, 49,  4,  9, 17, 12,  6] },
            { 'label':2009, 'values': [3, 11, 46,  9,  5, 13, 12, 11] },
            { 'label':2010, 'values': [6, 12, 47,  6,  6, 15, 10,  8] },
            { 'label':2011, 'values': [2, 12, 49,  8,  6, 13, 9, 11] },
            { 'label':2012, 'values': [4, 10, 45,  10,  7, 16, 8, 10] },
            { 'label':2013, 'values': [3, 11, 46,  9,  5, 13, 12, 11] },
            { 'label':2014, 'values': [6, 10, 43,  7,  6, 15, 11, 12] },
            { 'label':2015, 'values': [8, 11, 47,  8,  3, 10, 10, 15] }
        ]

    };

    //init PieChart
    var pieChart = new $jit.PieChart({

        //id of the visualization container
        injectInto: 'dataviz',

        //whether to add animations
        animate: true,

        //offsets
        offset: 30,
        sliceOffset: 0,
        labelOffset: 25,

        //slice style
        type: useGradients? 'stacked:gradient' : 'stacked',
        hoveredColor: '#ffffff',

        //whether to show the labels for the slices
        showLabels:true,

        //resize labels according to
        //pie slices values set 7px as
        //min label size
        resizeLabels: 7,

        //label styling
        Label: {
            type: labelType, //Native or HTML
            size: 10,
            family: 'Bebas Neue',
            color: '#c4c4c4'
        },

        //enable tips
        Tips: {
            enable: true,
            onShow: function(tip, elem) {
                tip.innerHTML = "<b>" + elem.name + "</b>: " + elem.value;
            }
        }
    });

    //load JSON data.
    pieChart.loadJSON(json);
    //end
    var list = $jit.id('id-list'),
        button = $jit.id('update');


    //update json on click
    $jit.util.addEvent(button, 'click', function() {
        var util = $jit.util;
        if(util.hasClass(button, 'gray')) return;
        util.removeClass(button, 'white');
        util.addClass(button, 'gray');
        pieChart.updateJSON(json2);
    });

    //dynamically add legend to list
    var legend = pieChart.getLegend(),
        listItems = [];
    for(var name in legend) {
        listItems.push('<div class=\'query-color\' style=\'background-color:'
            + legend[name] +'\'>&nbsp;</div>' + name);
    }
    list.innerHTML = '<li>' + listItems.join('</li><li>') + '</li>';
}




google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawSeriesChart);



function drawSeriesChart() {

    var data = google.visualization.arrayToDataTable([
        ['Movie\'s names',    'Oscar\'s year',  'Number of awards',               'Genre',          'Budget'    ],
        [ '7th Heaven', 1929, 3, 'Romance', 1000000 ],
        [ 'In Old Arizona', 1930, 5, 'Western', 1300000 ],
        [ 'All Quiet on the Western Front', 1931, 2, 'Western', 1200000 ],
        [ 'Cimarron', 1932, 3, 'Western', 1433000 ],
        [ 'Bad Girl', 1933, 2, 'Romance', 1100000 ],
        [ 'Cavalcade', 1934, 3, 'Drama', 1180280 ],
        [ 'It Happened One Night', 1935, 5, 'Romance', 325000 ],
        [ 'The Informer', 1936, 4, 'Drama', 243000 ],
        [ 'Anthony Adverse', 1937, 4, 'Drama', 1000000 ],
        [ 'The Life Of Emile Zola', 1938, 3, 'History', 1000000 ],
        [ 'The Adventures of Robin Hood', 1939, 3, 'Action', 2033000 ],
        [ 'Gone With The Wind', 1940, 8, 'Romance',  3850000 ],
        [ 'The Thief of Bagdad', 1941, 3, 'Action',  1000000 ],
        [ 'How Green Was My Valley', 1942, 5, 'Drama',  800000 ],
        [ 'Mrs. Miniver', 1943, 6, 'Romance', 1340000 ],
        [ 'The Song of Bernadette', 1944, 4, 'Drama', 1600000 ],
        [ 'Going My Way', 1945, 7, 'Comedy', 5000000 ],
        [ 'The Lost Weekend', 1946, 4, 'Drama', 1250000 ],
        [ 'The Best Years of Our Lives', 1947, 7, 'Drama', 2100000 ],
        [ 'Gentleman\'s Agreement', 1948, 3, 'Drama', 1985000 ],
        [ 'Hamlet', 1949, 4, 'Drama', 527530 ],
        [ 'The Heiress', 1950, 4, 'Drama', 2600000 ],
        [ 'All About Eve', 1951, 6, 'Drama',  1400000 ],
        [ 'An American in Paris', 1952, 6, 'Comedy', 2724000 ],
        [ 'The Bad and the Beautiful', 1953, 5, 'Romance', 1558000 ],
        [ 'From Here to Eternity', 1954, 8, 'Drama',  2500000 ],
        [ 'On the Waterfront', 1955, 8, 'Drama',  910000 ],
        [ 'Around the World in 80 Days', 1956, 5, 'Comedy', 6000000 ],
        [ 'The Bridge on the River Kwai', 1957, 7, 'History', 2800000 ],
        [ 'Gigi', 1958, 9, 'Romance', 3319355 ],
        [ 'Ben-Hur', 1959, 11, 'History', 15200000 ],
        [ 'The Apartment', 1960, 5, 'Comedy', 3000000 ],
        [ 'West Side Story', 1961, 10, 'Romance',  6000000 ],
        [ 'Lawrence of Arabia', 1962, 7, 'History', 15000000 ],
        [ 'Tom Jones', 1963, 4, 'Comedy', 1000000 ],
        [ 'My Fair Lady', 1964, 8, 'Romance',  17000000 ],
        [ 'The Sound of Music', 1965, 5, 'Drama',  8200000 ],
        [ 'A Man for All Seasons', 1966, 6, 'Drama',  2000000 ],
        [ 'In the Heat of the Night', 1967, 5, 'Drama', 2000000 ],
        [ 'Oliver!', 1968, 5, 'Drama', 5000000 ],
        [ 'Butch Cassidy and the Sundance Kid', 1969, 4, 'Western',  6000000 ],
        [ 'Patton', 1970, 7, 'History', 12600000 ],
        [ 'The French Connection', 1971, 5, 'Thriller', 1800000 ],
        [ 'Cabaret', 1972, 8, 'Romance',  2285000 ],
        [ 'The Sting', 1973, 7, 'Action',  5500000 ],
        [ 'The Godfather Part II', 1974, 6, 'Drama', 13000000 ],
        [ 'One Flew Over the Cuckoo\'s Nest', 1975, 5, 'Drama', 3000000 ],
        [ 'Network', 1976, 4, 'Comedy', 3800000 ],
        [ 'Star Wars: Episode IV â€“ A New Hope', 1977, 7, 'Science-Fiction', 11000000 ],
        [ 'The Deer Hunter', 1978, 5, 'Drama', 15000000 ],
        [ 'Kramer vs. Kramer', 1979, 5, 'Drama',  8000000 ],
        [ 'Ordinary People', 1980, 4, 'Drama', 6000000 ],
        [ 'Chariots of Fire', 1981, 4, 'History', 3000000 ],
        [ 'Gandhi', 1982, 8, 'History',  22000000 ],
        [ 'Terms of Endearment', 1983, 5, 'Comedy',  8000000 ],
        [ 'Amadeus', 1984, 8, 'History',  18000000 ],
        [ 'Out of Africa', 1985, 7, 'Romantic',  28000000 ],
        [ 'Platoon', 1986, 4, 'History',  6000000 ],
        [ 'The Last Emperor', 1987, 9, 'History', 23800000 ],
        [ 'A Beautiful Mind', 2002, 4,  'Drama', 58000000 ],
        [ 'Chicago', 2003, 6,  'Action', 45000000 ],
        [ 'The Lord of the Rings: The Return of the King', 2004, 11, 'Action', 94000000 ],
        [ 'The Aviator', 2005, 5, 'History', 110000000 ],
        [ 'Brokeback Mountain', 2006, 3, 'Romance', 14000000 ],
        [ 'The Departed', 2007, 4, 'Drama', 90000000 ],
        [ 'No Country for Old Men', 2008, 4,  'Thriller', 25000000 ],
        [ 'Slumdog Millionaire', 2009, 8,  'Drama', 15000000 ],
        [ 'The Hurt Locker', 2010, 6,  'History', 15000000 ],
        [ 'The King\'s Speech', 2011, 4,  'History', 15000000 ],
        [ 'The Artist', 2012, 5, 'Romance', 15000000 ],
        [ 'No Country for Old Men', 2008, 4,  'Thriller', 25000000 ],
        [ 'Slumdog Millionaire', 2009, 8,  'Drama', 15000000 ],
        [ 'The Hurt Locker', 2010, 6,  'History', 15000000 ],
        [ 'The King\'s Speech', 2011, 4,  'History', 15000000 ],
        [ 'The Artist', 2012, 5, 'Romance', 15000000 ],
        [ 'Life Of Pi', 2013, 4, 'Action', 120000000 ],
        [ 'Gravity', 2014, 6, 'Science-Fiction', 100000000 ],
        [ 'Birdman', 2015, 4, 'Comedy', 18000000 ],
        [ 'Mad Max : Fury Road', 2016, 6, 'Science-Fiction', 104924543 ]
    ]);


    var options = {
        // General settings
        title: 'Correlation between the year, the number of nominations, ' + 'the budget and the genre',
        legend: 'none',
        backgroundColor: '#0C0C0C',
        titleTextStyle: {
            color: '#C4C4C4',
            fontName: 'helvetica, arial',
            fontSize: 18,
            opacity: 1,
        },

        // Chart area options
        chartArea: {
            backgroundColor: '#0C0C0C',
            left: 50,
            top: 50,
            width: 1000,
        },

        //Define colors for the labels
        colors: [ '#ddd7ca', '#565247', '#b9c4a5', '#c5a54e', '#776e6e', '#c19d8f', '#5a6654', '#c44e4e' ],


        // Options For X axis
        hAxis: {
            title: 'Year of the oscar edition',
            titleTextStyle: {
                color: '#C4C4C4',
                fontName: 'helvetica, arial',
                fontSize: 16,
                baselineColor: '#C4C4C4'
            },
            gridlines: {
                count: 80,
                color: '#0C0C0C',
            },
            format: '####',
            /*scaleType: null,*/
        },

        // Options For Y axis
        vAxis: {
            'backgroundColor':'red',
            title: 'Number of awards',
            titleTextStyle: {
                color: '#C4C4C4',
                fontName: 'helvetica, arial',
                fontSize: 16,
            },
            baselineColor: '#0C0C0C',
            gridlines: 0,
            ticks: [0,1,2,3,4,5,6,7],

            gridlines: {
                color: '#0C0C0C',
            },

        },

        // Options For The Bubble
        bubble: {
            textStyle: {
                fontSize: 0,
                opacity: 0,
                fontName: 'helvetica, arial'
            },
            opacity: 0.8,
            color: '#C4C4C4',
            stroke: 'transparent',
        },

        // Bulle config
        sizeAxis: {
            maxSize: '170px',
            minSize: '50px',
        },

        // Config du tooltip
        tooltip:
        {
            textStyle:
            {
                color: '#505050'
            },
            showColorCode: false,

        },

        //Animation
        animation: {
            duration: '1000',
            easing: 'easeIn',
            startup: 'true' },


    };

    var chart = new google.visualization.BubbleChart(document.getElementById('series_chart_div'));
    chart.draw(data, options);
}



init();
