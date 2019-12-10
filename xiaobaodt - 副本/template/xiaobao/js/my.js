$(function() {
  	function  initial(num,initial,time) {
var time = time;
var oldnum = 3600*time/1000;
var o = $('.num2')
var start_Date= new Date(initial);
var sec = (new Date().getTime()-start_Date.getTime())/oldnum;
var nowNum = parseInt(sec + num);
setInterval(function(){++nowNum;o.html(nowNum)},time)
};


initial (500,'2017/5/21 15:00',10000);
// 初始数值，初始日期，增加数值间隔(ms)


});



  $(function() {
  	function  initial(num,initial,time) {
var time = time;
var oldnum = 3600*time/1000;
var o = $('.num')
var start_Date= new Date(initial);
var sec = (new Date().getTime()-start_Date.getTime())/oldnum;
var nowNum = parseInt(sec + num);
setInterval(function(){++nowNum;o.html(nowNum)},time)
};


initial (2,'2017/5/21 15:00',10000);
// 初始数值，初始日期，增加数值间隔(ms)


});





var post_freq = 1;
var user_freq = 5;
setInterval("document.getElementById(\"total_new\").innerHTML = parseInt(document.getElementById(\"total_new\").innerHTML)+1;document.getElementById(\"total_active\").innerHTML = parseInt(document.getElementById(\"total_active\").innerHTML)+1",1000*post_freq);
setInterval("document.getElementById(\"total_user\").innerHTML = parseInt(document.getElementById(\"total_user\").innerHTML)+1",1000*user_freq);
