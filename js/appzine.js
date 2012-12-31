function changesize() {
	heightcontent = $(window).height() - (82 + 40);
	heightBodyContent = $('.bodyContent').height()+20;
	if(heightcontent<heightBodyContent) heightcontent = heightBodyContent;
	$(".bodyContent").css("height",heightcontent);
	$(".sidebarContainer").css("height",heightcontent);
}
$(document).ready(function(){
	changesize();
	jQuery(window).resize(function(){
		changesize();
	});
	$(".trigger").click(function(){
		if($(this).next().hasClass("toggle_container")) $(this).toggleClass("active").next().slideToggle("medium");
	});
	if($(".trigger").next().hasClass("father")) $(".trigger.active span").css("display","none");
	$(".sub").click(function(){
		if($(this).next().hasClass("sub-child")) $(this).toggleClass("active").next().slideToggle("medium");
	});
	if($(".trigger.active").next().hasClass("toggle_container")) $(".trigger.active").next().css("display","block");
	if($(".sub.active").next().hasClass("sub-child")) $(".sub.active").next().css("display","block");
	$(".sub.active").parent().parent().css("display","block").prev().addClass("active");
	$(".halign").click(function(){
		if($(this).next().hasClass("halignPro")) $(this).toggleClass("show").next().slideToggle("medium");
	});
	$('.trigger a').click(function(){
		if($(this).parent().next().hasClass("toggle_container")) $(this).parent().toggleClass("active").next().slideToggle("medium");
		var url = $(this).attr('href');
        $.ajax({
            url: url,
            success: function(data) {
            	$(".bodyContent .post .content").html(data);
           }
        });
        return false;
	});
	$('.sub a').click(function(){
		if($(this).parent().next().hasClass("sub-child")) $(this).parent().toggleClass("active").next().slideToggle("medium");
		var url = $(this).attr('href');
        $.ajax({
            url: url,
            success: function(data) {
            	$(".bodyContent .post .content").html(data);
           }
        });
        return false;
	});
});
