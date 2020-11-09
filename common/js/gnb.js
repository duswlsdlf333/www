 
    $('.dropdownmenu').hover(
        function() { 
            $('.dropdownmenu .menu ul').fadeIn('fast',function(){$(this).stop();});
            //모든 서브를 열어라
            
	       $('#headerArea').animate({height:340},'fast').clearQueue();
            //서브메뉴가 열렸을 때의 헤더의 높이
         },
        function() {	    
	      $('.dropdownmenu .menu ul').fadeOut('fast');
            //모든 서브를 닫아주세요.
          $('#headerArea').animate({height:132},'fast').clearQueue();
            //서브가 닫혔을 때의 헤더의 높이
        });
               
            
       //tab키처리
         $('.dropdownmenu .menu .depth1').on('focus', function () {        
                $('.dropdownmenu .menu ul').slideDown('fast');
                $('#headerArea').animate({height:340},'fast').clearQueue();  
          });

         $('.dropdownmenu .m6 li:last').find('a').on('blur', function () {        
                  $('.dropdownmenu .menu ul').slideUp('fast');
                 $('#headerArea').animate({height:132},'fast').clearQueue();
         });       
