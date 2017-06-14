/**
 * Created by 王子真 on 2017/5/4.
 */

var images=[
    '../../images/33.jpg',
    "../../images/44.jpg",
    "../../images/55.jpg",
    "../../images/66.jpg"

];

$(images).each(function () {
    $('<img/>')[0].src = this;
});

var index=0;



setInterval(function(){
    index=(index>=images.length-1)?0:index+1;
    $.backstretch(images[index],{speed:3000});
},15000);
