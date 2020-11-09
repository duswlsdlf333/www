
	$('.footer_family .arrow').click(function(){
		$('.footer_family .aList').slideDown();			  
	});
	$('.footer_family').mouseleave(function(){
		$('.footer_family .aList').slideUp();			  
	});
	//tab키 처리
	  $('.footer_family .arrow').bind('focus', function () {        
              $('.footer_family .aList').slideDown();	
       });
       $('.footer_family .aList li:last').find('a').bind('blur', function () {        
              $('.footer_family .aList').slideUp();
       });  


