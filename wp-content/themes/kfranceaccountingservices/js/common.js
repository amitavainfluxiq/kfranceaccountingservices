$(document).ready(function(){


$(".blogdes h3").each(function(i){
    len=$(this).text().length;
    if(len>360)
    {
      $(this).text($(this).text().substr(0,360)+' ... ');
    }
  });



$('.bannerarrowscroll').click(function () {
    $('html, body').animate({scrollTop:$('.homeblock1').offset().top}, 'slow');
    return false;
});


    $('.referrals8').click(function()
        {
            console.log('popup');
            $('#referrals8').modal('show');

        }
    );





});
