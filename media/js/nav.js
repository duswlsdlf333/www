
   $(".menuOpen").toggle(function() {
	 $("#gnb").slideDown('slow');
   }, function() {
	 $("#gnb").slideUp('fast');
   });
   
   
    var current=0;// 1=>메뉴열려 0=>메뉴닫혀
   $(window).resize(function(){ 
      var screenSize = $(window).width(); 
      if( screenSize > 768){
        $("#gnb").show();
		 current=1;
      }
      if(current==1 && screenSize < 768){
        $("#gnb").hide();
         current=0;
      }
    }); 
    
