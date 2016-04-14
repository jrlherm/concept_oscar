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
    console.log($('#date').offsetHeight);
    scrollToCustom(850,document.documentElement.scrollTop || document.body.scrollTop);
});

