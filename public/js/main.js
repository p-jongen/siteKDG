

$( document ).ready(function()
{
    $(".button-collapse").sideNav();
    $('.carousel').carousel();

    //wait 5 seconds before launching the interval, to have a 10 second to first move, then every 5 seconds
    setTimeout(function()
    {
        setInterval(function(){$('.carousel').carousel('next');},5000);
    },5000);


})
