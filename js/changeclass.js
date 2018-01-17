
$(function(){
    const menu = window.matchMedia( '(min-width: 1024px)' );
    if (menu.matches) {
          $(window).scroll(function() {

              if ($(this).scrollTop() >= 200) {
               
                  $('#ChangeClass').removeClass('primary_menu');
                  $('#ChangeClass').addClass('secondary_menu');
                  $(".top_menu").hide("fast");

              } else {

                  $('#ChangeClass').removeClass('secondary_menu');
                  $('#ChangeClass').addClass('primary_menu');
                  $(".top_menu").show("fast");

              }
          });
        }else{
           $('#ChangeClass').removeClass('hover_display');
           /*$('#ChangeClass').addClass('secondary_menu');*/
        }


    $('.go-up').click(function(){
        $('body, html').animate({
          scrollTop: '0px'
        }, 800);
      });

      $(window).scroll(function(){
        if( $(this).scrollTop() > 250 ){
          $('.go-up').slideDown(400);
        } else {
          $('.go-up').slideUp(400);
        }
      });



    const mq = window.matchMedia( "(max-width: 700px)" );
    if (mq.matches) {
         
        var Showmenu = 1;
        $(".show_menu").click(function(){
           if(Showmenu == 1){
                  $(this).children(".fa-bars").hide();

                  $(this).children(".fa-arrow-right").show();

                  $(".show_mobile_menu").animate({ "left": "0%"}, 250);

                  $("body").css({"overflow":"hidden"});

                  Showmenu = 0;

              }else{
                  $(".show_mobile_menu").animate({ "left": "100%" }, 250);

                  $("body").css({"overflow":""});

                  $(this).children(".fa-bars").show();

                  $(this).children(".fa-arrow-right").hide();

                  Showmenu = 1;
              }
         
        });


        var submenu = 1;
            $(".menu-item").click(function(){
              if(submenu == 1){
                  $(this).children(".sub-menu").slideDown();

                  submenu = 0;
              }else{
                  $(this).children(".sub-menu").slideUp();
                  submenu = 1;
              }
              
            });
    } 





  });	





