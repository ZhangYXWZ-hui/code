$(function(){
	//导航
	$('.nav').find("li").hover(
		function(){
			//鼠标移入 原理：移入的时候先去掉所有的样式，然后给this加上所需的样式
			$('.nav').find("li").removeClass('active');
			$(this).addClass('active');
		}
	)

	//document.title = $(window).scrollTop();

	var top = document.querySelector('.part_1').getBoundingClientRect().top;
	var sTop = document.querySelector('body').scrollTop;
	console.log(top+"===="+sTop);
})
