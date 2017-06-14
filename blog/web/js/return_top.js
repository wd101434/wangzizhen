/**
 * Created by 王子真 on 2017/6/5.
 */
;$(function () {

    var backbutton=$('#btn_show');
    backbutton.on('click',function () {
       $('html,body').animate({
           scrollTop:0
       },200)
    })
    $(window).on('scroll',function () {
        if($(window).scrollTop()>$(window).height()){
            backbutton.fadeIn();
        }
        else{
            backbutton.fadeOut();
        }
    })
    $(window).trigger('scroll');
})
