    var wrap = document.querySelector(".wrap");
    var next = document.querySelector(".arrow_right");
    var prev = document.querySelector(".arrow_left");
    var container = document.querySelector(".container");
    var index = 0;
    var dots = document.getElementsByTagName("span");
    // 手动轮播
    next.onclick = function () {
      next_pic();
    }
    prev.onclick = function () {
      prev_pic();
    }
    function next_pic () {
      var newLeft;
      if(wrap.style.left === "-6000px"){
        newLeft = -2000;
      }else{
        newLeft = parseInt(wrap.style.left)-1000;
      }
      wrap.style.left = newLeft + "px";

      index++;
      if(index > 4){
        index = 0;
      }
      showCurrentDot();
    }
    function prev_pic () {
      var newLeft;
      if(wrap.style.left === "0px"){
        newLeft = -4000;
      }else{
        newLeft = parseInt(wrap.style.left)+1000;
      }
      wrap.style.left = newLeft + "px";

      index--;
      if(index < 0){
        index = 4;
      }
      showCurrentDot();
    }
    // 自动轮播
    var timer = null;
    function autoPlay () {
      timer = setInterval(function () {
        next_pic();
      },5000);
    }
    autoPlay();
    container.onmouseenter = function () {
      clearInterval(timer);
    }
    container.onmouseleave = function () {
      autoPlay();    
    }
    // 小圆点动画
    function showCurrentDot () {
      for(var i = 0, len = dots.length; i < len; i++) {
        dots[i].className = "";
      }
      dots[index].className = "on";
    }
    showCurrentDot();
    // 小圆点点击事件
    for (var i = 0, len = dots.length; i < len; i++){
      (function(i){
        dots[i].onclick = function () {
          var dis = index - i;
          if(index == 4 && parseInt(wrap.style.left)!==-5000){
            dis = dis - 5;     
          }
          if(index == 0 && parseInt(wrap.style.left)!== -1000){
            dis = 5 + dis;
          }
          wrap.style.left = (parseInt(wrap.style.left) +  dis * 1000)+"px";
          index = i;
          showCurrentDot();
        }
      })(i);            
    }
  