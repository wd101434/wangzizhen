/**
 * Created by 王子真 on 2017/5/3.
 */
;$(function () {
    //设置侧栏
    var shezhicelan=$('#shezhicelan'),
        homeset=$('#homeset'),
        celanreturn=$('#celanrerurn');
    homeset.on('click',function () {
        shezhicelan.css("left",0
        );

    })
    celanreturn.on('click',function () {
        shezhicelan.css("left",-shezhicelan.width()
        );
    })
    //博客侧栏
    var articlecelan=$('.articlecelan'),
        article_foot=$('#article_foot'),
        article_home_button=$('#article_home_button');

    article_home_button.on('click',function () {
        articlecelan.css("right",-20);
        article_foot.css("right",-20);


    })


})

