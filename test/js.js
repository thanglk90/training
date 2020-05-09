$(document).ready(function(){
	let ulA = $("ul.tab-list li a");
	ulA.click(function(){
	  let tabBox = $(".wrapper .tab-box");
	  let vlink = $(this).attr('link');
	  
	  ulA.removeClass("current");
	  $(this).addClass("current");
	  
	  tabBox.removeClass("current");
	  $(".tab-box." + vlink).addClass("current");
	  
	});

});