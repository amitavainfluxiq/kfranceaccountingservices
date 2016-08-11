$(document).ready(function(){


/*
$(".blogdes h3").each(function(i){
    len=$(this).text().length;
    if(len>360)
    {
      $(this).text($(this).text().substr(0,360)+' ... ');
    }
  });
*/

//alert(jQuery("form" ).attr('class'));
//alert(jQuery("form" ).hasClass('sent').length);

    console.log(jQuery("form" ).hasClass( "sent" ).length);
    var formclass=jQuery("form" ).attr('class');
    if(formclass.indexOf('sent')>0){
        jQuery('#popthankyou').modal('show');
        setTimeout(function () {
            jQuery('#popthankyou').modal('hide');
        },6000);
    }


$('.bannerarrowscroll').click(function () {
    $('html, body').animate({scrollTop:$('.homeblock1').offset().top}, 'slow');
    return false;
});


   /* $('.btnthankyou').click(function()
        {
            console.log('popup');
            $('#popthankyou').modal('show');

        }
    );*/


//Home Testimonial cHARACTER lIMIT

   /* $(".hometestimonialblockcontent span").each(function(i){
        len=$(this).text().length;
        if(len>240)
        {
            $(this).text($(this).text().substr(0,240)+' ... ');
        }
    });*/


});
