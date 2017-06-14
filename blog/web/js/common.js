/**
 * Created by 王子真 on 2017/6/4.
 */
function leng_show() {
    var text = document.getElementsByClassName("content");
    for(var i=0;i<=text.length;i++) {
        var str = text[i].innerHTML;
        window.onresize = function () {
            overflowhidden("content", 3, str);
        }
        overflowhidden("content", 3, str);
    }
}

var overflowhidden = function(id, rows, str){
    for (var i=0;i<id.length;i++){
    var text = document.getElementsByClassName(id)[i];
    var style = getComputedStyle(text);
    var lineHeight = style["line-height"];
    var at = rows*parseInt(lineHeight);
    var tempstr = str;
    text.innerHTML = tempstr;
    var len = tempstr.length;
    var i = 0;
    if(text.offsetHeight <= at){                  //如果所有文本在写入html后文本没有溢出，那不需要做溢出处理
        /*text.innerHTML = tempstr;*/
    }
    else {                                        //否则 二分处理需要截断的文本
        var low = 0;
        var high = len;
        var middle;
        while(text.offsetHeight > at){
            middle = (low+high)/2;
            text.innerHTML = tempstr.substring(0,middle);   //写入二分之一的文本内容看是否需要做溢出处理
            if(text.offsetHeight < at){                         //不需要 则写入全部内容看是否需要 修改low的值
                text.innerHTML = tempstr.substring(0,high);
                low = middle;
            }
            else{                                          //写入二分之一的文本内容依旧需要做溢出处理 再对这二分之一的内容的二分之一的部分做判断
                high = middle-1;                           //修改high值
            }
        }
        tempstr = tempstr.substring(0, high)+"...";
        text.innerHTML = tempstr;
        if(text.offsetHeight > at){
            tempstr = tempstr.substring(0, high-3)+"...";
        }
        text.innerHTML = tempstr;
        text.height = at +"px";
    }
    }
}