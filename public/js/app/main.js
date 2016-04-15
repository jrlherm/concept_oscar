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
    useGradients = nativeCanvasSupport;
    animate = !(iStuff || !nativeCanvasSupport);
})();


function init(){
    //init data
    var json = {
        'label': ['Nominee\'s percentage aged between 0 and 19 years old', 'Nominee\'s percentage aged between 20 and 29 years old', 'Nominee\'s percentage aged between 30 and 39 years old', 'Nominee\'s percentage aged between 40 and 49 years old', 'Nominee\'s percentage aged between 50 and 59 years old', 'Nominee\'s percentage aged between 60 and 69 years old', 'Nominee\'s percentage aged between 70 and 79 years old', 'Age range : 80 years old and more'],
        'values': [
            { 'label':1929, 'values': [4, 12, 45,  8,  6, 15, 10, 10] },
            { 'label':1930, 'values': [4, 12, 45,  8,  6, 15, 10, 10] },
            { 'label':1931, 'values': [4, 12, 45,  8,  6, 15, 10, 10] },
            { 'label':1932, 'values': [4, 12, 45,  8,  6, 15, 10, 10] },
            { 'label':1933, 'values': [4, 12, 45,  8,  6, 15, 10, 10] },
            { 'label':1934, 'values': [4, 12, 45,  8,  6, 15, 10, 10] },
            { 'label':1935, 'values': [4, 12, 45,  8,  6, 15, 10, 10] },
            { 'label':1936, 'values': [4, 12, 45,  8,  6, 15, 10, 10] },
            { 'label':1937, 'values': [4, 12, 45,  8,  6, 15, 10, 10] },
            { 'label':1938, 'values': [4, 12, 45,  8,  6, 15, 10, 10] },
            { 'label':1939, 'values': [5, 14, 40,  9,  6, 15, 10, 10] },
            { 'label':1940, 'values': [5, 14, 40,  9,  6, 15, 10, 10] },
            { 'label':1941, 'values': [5, 14, 40,  9,  6, 15, 10, 10] },
            { 'label':1942, 'values': [5, 14, 40,  9,  6, 15, 10, 10] },
            { 'label':1943, 'values': [5, 14, 40,  9,  6, 15, 10, 10] },
            { 'label':1944, 'values': [5, 14, 40,  9,  6, 15, 10, 10] },
            { 'label':1945, 'values': [5, 14, 40,  9,  6, 15, 10, 10] },
            { 'label':1946, 'values': [5, 14, 40,  9,  6, 15, 10, 10] },
            { 'label':1947, 'values': [5, 14, 40,  9,  6, 15, 10, 10] },
            { 'label':1948, 'values': [5, 14, 40,  9,  6, 15, 10, 10] },
            { 'label':1949, 'values': [5, 14, 40,  9,  6, 15, 10, 10] },
            { 'label':1950, 'values': [5, 14, 40,  9,  6, 15, 10, 10] },
            { 'label':1951, 'values': [5, 14, 40,  9,  6, 15, 10, 10] },
            { 'label':1952, 'values': [5, 14, 40,  9,  6, 15, 10, 10] },
            { 'label':1953, 'values': [5, 14, 40,  9,  6, 15, 10, 10] },
            { 'label':1954, 'values': [5, 14, 40,  9,  6, 15, 10, 10] },
            { 'label':1955, 'values': [5, 14, 40,  9,  6, 15, 10, 10] },
            { 'label':1956, 'values': [5, 14, 40,  9,  6, 15, 10, 10] },
            { 'label':1957, 'values': [5, 14, 40,  9,  6, 15, 10, 10] },
            { 'label':1958, 'values': [5, 14, 40,  9,  6, 15, 10, 10] },
            { 'label':1959, 'values': [4, 12, 45,  8,  6, 15, 10, 10] },
            { 'label':1960, 'values': [4, 12, 45,  8,  6, 15, 10, 10] },
            { 'label':1961, 'values': [4, 15, 42,  5,  6, 15, 13, 10] },
            { 'label':1962, 'values': [4, 15, 42,  5,  6, 15, 13, 10] },
            { 'label':1963, 'values': [4, 15, 42,  5,  6, 15, 13, 10] },
            { 'label':1964, 'values': [4, 15, 42,  5,  6, 15, 13, 10] },
            { 'label':1965, 'values': [4, 15, 42,  5,  6, 15, 13, 10] },
            { 'label':1966, 'values': [4, 15, 42,  5,  6, 15, 13, 10] },
            { 'label':1967, 'values': [4, 15, 42,  5,  6, 15, 13, 10] },
            { 'label':1968, 'values': [4, 15, 42,  5,  6, 15, 13, 10] },
            { 'label':1969, 'values': [4, 15, 42,  5,  6, 15, 13, 10] },
            { 'label':1970, 'values': [4, 15, 42,  5,  6, 15, 13, 10] },
            { 'label':1971, 'values': [4, 15, 42,  5,  6, 15, 13, 10] },
            { 'label':1972, 'values': [4, 15, 42,  5,  6, 15, 13, 10] },
            { 'label':1973, 'values': [4, 12, 45,  8,  6, 15, 10, 10] },
            { 'label':1974, 'values': [4, 12, 45,  8,  6, 15, 10, 10] },
            { 'label':1975, 'values': [4, 12, 45,  8,  6, 15, 10, 10] },
            { 'label':1976, 'values': [4, 12, 45,  8,  6, 15, 10, 10] },
            { 'label':1977, 'values': [4, 12, 45,  8,  6, 15, 10, 10] },
            { 'label':1978, 'values': [4, 12, 45,  8,  6, 15, 10, 10] },
            { 'label':1979, 'values': [4, 12, 45,  8,  6, 15, 10, 10] },
            { 'label':1980, 'values': [4, 12, 45,  8,  6, 15, 10, 10] },
            { 'label':1981, 'values': [4, 12, 45,  8,  6, 15, 10, 10] },
            { 'label':1982, 'values': [4, 12, 45,  8,  6, 15, 10, 10] },
            { 'label':1983, 'values': [4, 12, 45,  8,  6, 15, 10, 10] },
            { 'label':1984, 'values': [6, 12, 47,  6,  6, 15, 10,  8] },
            { 'label':1985, 'values': [6, 12, 47,  6,  6, 15, 10,  8] },
            { 'label':1986, 'values': [6, 12, 47,  6,  6, 15, 10,  8] },
            { 'label':1987, 'values': [6, 12, 47,  6,  6, 15, 10,  8] },
            { 'label':1988, 'values': [6, 12, 47,  6,  6, 15, 10,  8] },
            { 'label':1989, 'values': [6, 12, 47,  6,  6, 15, 10,  8] },
            { 'label':1990, 'values': [6, 12, 47,  6,  6, 15, 10,  8] },
            { 'label':1991, 'values': [6, 12, 47,  6,  6, 15, 10,  8] },
            { 'label':1992, 'values': [6, 12, 47,  6,  6, 15, 10,  8] },
            { 'label':1993, 'values': [6, 12, 47,  6,  6, 15, 10,  8] },
            { 'label':1994, 'values': [6, 12, 47,  6,  6, 15, 10,  8] },
            { 'label':1995, 'values': [6, 12, 47,  6,  6, 15, 10,  8] },
            { 'label':1996, 'values': [6, 12, 47,  6,  6, 15, 10,  8] },
            { 'label':1997, 'values': [6, 12, 47,  6,  6, 15, 10,  8] },
            { 'label':1998, 'values': [6, 12, 47,  6,  6, 15, 10,  8] },
            { 'label':1999, 'values': [6, 12, 47,  6,  6, 15, 10,  8] },
            { 'label':2000, 'values': [6, 12, 47,  6,  6, 15, 10,  8] },
            { 'label':2001, 'values': [6, 12, 47,  6,  6, 15, 10,  8] },
            { 'label':2002, 'values': [6, 12, 47,  6,  6, 15, 10,  8] },
            { 'label':2003, 'values': [6, 12, 47,  6,  6, 15, 10,  8] },
            { 'label':2004, 'values': [6, 12, 47,  6,  6, 15, 10,  8] },
            { 'label':2005, 'values': [6, 12, 47,  6,  6, 15, 10,  8] },
            { 'label':2006, 'values': [6, 12, 47,  6,  6, 15, 10,  8] },
            { 'label':2007, 'values': [6, 12, 47,  6,  6, 15, 10,  8] },
            { 'label':2008, 'values': [6, 12, 47,  6,  6, 15, 10,  8] },
            { 'label':2009, 'values': [6, 12, 47,  6,  6, 15, 10,  8] },
            { 'label':2010, 'values': [6, 12, 47,  6,  6, 15, 10,  8] },
            { 'label':2011, 'values': [4, 12, 45,  8,  6, 15, 10, 10] },
            { 'label':2012, 'values': [4, 12, 45,  8,  6, 15, 10, 10] },
            { 'label':2013, 'values': [4, 12, 45,  8,  6, 15, 10, 10] },
            { 'label':2014, 'values': [4, 12, 45,  8,  6, 15, 10, 10] },
            { 'label':2015, 'values': [4, 12, 45,  8,  6, 15, 10, 10] }
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

init();