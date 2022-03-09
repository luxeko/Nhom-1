$(window).scroll(function(){
    if($(document).scrollTop() > 0){
            $('#nav_bar').addClass('fix-nav');
    }
    else{
            $('#nav_bar').removeClass('fix-nav');
    }
});
