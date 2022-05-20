$(document).ready(function(){

    //FAQS SECTION CLICK TO ADD AND REMOVE

    $(".below a:eq(0)").click(function(){
        $('.below div:eq(0)').fadeToggle(100);
        $('.below div:eq(0)').siblings('div').hide();
    });

    $(".below a:eq(1)").click(function(){
        $('.below div:eq(1)').fadeToggle(100);
        $('.below div:eq(1)').siblings('div').hide();
    });

    $(".below a:eq(2)").click(function(){
        $('.below div:eq(2)').fadeToggle(100);
        $('.below div:eq(2)').siblings('div').hide();
    });

    $(".below a:eq(3)").click(function(){
        $('.below div:eq(3)').fadeToggle(100);
        $('.below div:eq(3)').siblings('div').hide();
    });

    $(".below a:eq(4)").click(function(){
        $('.below div:eq(4)').fadeToggle(100);
        $('.below div:eq(4)').siblings('div').hide();
    });

    $(".below a:eq(5)").click(function(){
        $('.below div:eq(5)').fadeToggle(100);
        $('.below div:eq(5)').siblings('div').hide();
    });

    $(".below a:eq(6)").click(function(){
        $('.below div:eq(6)').fadeToggle(100);
        $('.below div:eq(6)').siblings('div').hide();
    });

    $(".below a:eq(7)").click(function(){
        $('.below div:eq(7)').fadeToggle(100);
        $('.below div:eq(7)').siblings('div').hide();
    });

    $(".below a:eq(8)").click(function(){
        $('.below div:eq(8)').fadeToggle(100);
        $('.below div:eq(8)').siblings('div').hide();
    });

    $(".below a:eq(9)").click(function(){
        $('.below div:eq(9)').fadeToggle(100);
        $('.below div:eq(9)').siblings('div').hide();
    });


    $('.search-btn').click(function(){ 
        $('.search-form').addClass('show-search');
        $('.search-cancel').addClass('show-search');
      })
      $('.search-cancel').click(function(){ 
        $('.search-form').removeClass('show-search');
        $('.search-cancel').removeClass('show-search');
      })
        
});