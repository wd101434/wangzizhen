/**
 * Created by 王子真 on 2017/5/24.
 */
window.onload=function () {
    var father=document.getElementById("father");
    var list=document.getElementById("list");
    var round=document.getElementById("round").getElementsByTagName('li');
    var left=document.getElementById("left");
    var right=document.getElementById("right");
    var index=1;
    var animated=false;
    var timer;
    var interval = 5000;

    function yidong(shuzhi) {
        animated=true;
        var newshuzhi=parseInt(list.style.left)+shuzhi;
        var time=300;//位移总时间
        var interval=10;//每次间隔
        var speed=shuzhi/(time/interval);//每次位移量

        //唯一判断函数
        function go() {
            if((speed<0&&parseInt(list.style.left)>newshuzhi)||(speed>0&&parseInt(list.style.left)<newshuzhi))
            {
                list.style.left=parseInt(list.style.left)+speed+"px";
                setTimeout(go,interval);

            }
            else {

                list.style.left=newshuzhi+"px";
                if(newshuzhi>-940){
                    list.style.left=-3760+"px";
                }
                if(newshuzhi<-3760){
                    list.style.left=-940+"px";
                }
                animated = false;

            }
        }
        go();
    }

    function shoubutton() {
        for(var i=0;i<round.length;i++){
            if(round[i].className=="on"){
                round[i].className="";
                break;

            }
        }
        round[index-1].className="on";

    }
    function paly() {
        timer=setTimeout(function () {
            right.onclick();
            paly();
        },interval);
        //自动播放
    }
    function stop() {
        clearInterval(timer);

        //鼠标放上停止播放；
    }

    right.onclick=function () {
        if(animated){
            return;
        }
        if (index==4){
            index=1;
        }
        else {
            index +=1;
        }

        yidong(-940);
        shoubutton();




    }
    left.onclick=function () {
        if (animated){
            return;
        }
        if (index==1){
            index=4;
        }
        else {
            index -=1;
        }
        shoubutton();
        yidong(940);


    }

    for(var i=0;i<round.length;i++){
        round[i].onclick=function () {
            if(this.className=="on"){
                return;
            }
            var myindex=parseInt(this.getAttribute('index'));
            var offset= -940*(myindex-index);
            index=myindex;
            shoubutton();
            if(animated==false){
                yidong(offset);
            }




        }

    }

    father.onmouseover=stop;
    father.onmouseout=paly;
    paly();

}