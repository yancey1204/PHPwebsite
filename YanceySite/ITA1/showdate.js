$(document).ready(function(){
  $(".section").mouseover(function(){
    $(".date").addClass("mouseenter");
	$('.title').addClass("mouseoverTitle");
  });
  
  $(".section").mouseout(function(){
	  $(".date").removeClass("mouseenter");
	$('.title').removeClass("mouseoverTitle");
	  });
});