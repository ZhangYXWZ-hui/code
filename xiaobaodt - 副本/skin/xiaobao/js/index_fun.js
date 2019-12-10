$(document).ready(function () {
    $(".hyzx").slide({titCell:".hd li",mainCell:".bd"});
    $(".ssxx").slide({titCell:".hd li",mainCell:".bd"});


            //楼层左下浮动
    var floorNav = $(".winfl li");
    var floorMain = $(".main>div");

    $(window).scroll(function () {
        var scrollTop = $(this).scrollTop();
        
        if (scrollTop < floorMain.eq(0).offset().top-300) {
            $(".winfl").hide();
            
        }
        else
        {
            if (scrollTop > floorMain.eq(0).offset().top - 300) {
                $(".winfl").show();
                
            }
            floorMain.each(function (i, item) {

                if ($(item).attr("id") && scrollTop > $(this).offset().top - 300) {

                    floorNav.removeClass("uk-active").find("a[href=#"+$(item).attr("id")+"]").parent().addClass("uk-active");
                }
            });
        }
    });

    floorNav.each(function (i, item) {
        $(this).children("a").click(function () {

            scrollToElement($(".main").find("div"+$(item).find("a").attr("href")),300);
            //floorMain.eq(i).css("padding-top", "100px").animate({ paddingTop: 0 }, 300);
            
        });
    });
 
    function scrollToElement(ele, options) {

        options = $.extend({
            duration: 1000,
            transition: 'easeOutExpo',
            offset: 0,
            complete: function(){}
        }, options);

        // get / set parameters
        var target    = ele.offset().top - options.offset,
            docheight = $("body").height(),
            winheight = window.innerHeight;

        if ((target + winheight) > docheight) {
            target = docheight - winheight;
        }

        // animate to target, fire callback when done
        $("html,body").stop().animate({scrollTop: target}, options.duration, options.transition).promise().done(options.complete);
    }
})

