(function (params) {
    $ = params;
    // menu 列表
    // $(function () {
    //     var height = $("#myswitcher > li").height();
    //     $("#myswitcher > li").hover(function (e,i) {
    //         $(this).trigger("click.uk.switcher");
    //         var temp = $(this).append("<div id='switcher-temp'></div>")
    //         $("#switcher-temp").append($("#my-id").clone())
    //         $("#switcher-temp").css({"top":-($(this).index()*height+12)})
    //         $("#my-id").show();
    //     },function (e,i) {
    //         $("#switcher-temp").remove();
    //         $("#my-id").hide();
    //     })
    // })

    // //右侧 悬浮 猜你喜欢等
    // $(function () {
    //     $(".winfl").hide();
    //     $('[data-uk-scrollspy]').on('inview.uk.scrollspy', function(){
    //         $(".winfl").show();
    //     });
    //     $('[data-uk-scrollspy]').off('outview.uk.scrollspy').on('outview.uk.scrollspy', function(){
    //         $(".winfl").hide();
    //     });
    // })

    // 头部 menu 列表
    $(function () {
        var height = $("#myswitcher > li").height();
        $("#myswitcher .sub").each(function (i) {
            $(this).css({"top":-(i*height+12)})
        })
        $("#myswitcher").slide({ 
            type:"menu",// 效果类型，针对菜单/导航而引入的参数（默认slide）
            titCell:".nLi", //鼠标触发对象
            defaultPlay:false,
            targetCell:".sub", //titCell里面包含的要显示/消失的对象
            effect:"slideDown", //targetCell下拉效果
            delayTime:100 , //效果时间
            returnDefault:true //鼠标移走后返回默认状态，例如默认频道是“预告片”，鼠标移走后会返回“预告片”（默认false）
        });
    });

    // 头部select
    $(document).ready(function () {
        var listmenu = $("[data-uk-form-select] > ul");
        var id = $("[data-uk-form-select] > h3 > span").data("id")
        $("#form_search").attr("action",id);
        $("body").on("click","[data-uk-form-select] > h3",function (e) {
            // body...
            if(listmenu.is(":visible")){
                listmenu.slideUp();
                $("[data-uk-form-select] > h3 img").css({"transform":"rotate(0deg)","transition":"transform 0.5s"})
            }else{
                listmenu.slideDown();
                $("[data-uk-form-select] > h3 img").css({"transform":"rotate(90deg)","transition":"transform 0.5s"})
            }

        })
        listmenu.find("li").click(function () {
            // body...
            $("[data-uk-form-select] > h3 > span").html($(this).html());
            $("[data-uk-form-select] > h3 > span").data("id",$(this).data("id"))
            $("#form_search").attr("action",$("[data-uk-form-select] > h3 > span").data("id"));
            listmenu.slideUp();
            $("[data-uk-form-select] > h3 img").css({"transform":"rotate(0deg)","transition":"transform 0.5s"})
        })
    })
})(jQuery)