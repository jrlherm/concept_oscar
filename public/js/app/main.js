/**
 * Created by clementlong on 07/04/2016.
 */


$.getJSON(
    'http://api.openweathermap.org/data/2.5/weather?q=Paris&APPID=9e8150c9d6fbf87d678d2cf7f7a2c00a',
    function( data )
    {
        console.log(data);
    }
);
