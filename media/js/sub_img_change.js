
    var screenSize = $(window).width(); 
	var screenHeight = $(window).height(); 
    
    
    $("#content").css('margin-top', screenHeight);
    if( screenSize > 768){  
        $("#imgBG").attr("src" , "images/sub1_bg.jpg");
        $("#imgBG2").attr("src" , "images/sub2_bg.jpg");
        $("#imgBG3").attr("src" , "images/sub3_bg.jpg");
        $("#imgBG4").attr("src" , "images/sub4_bg.jpg");
      }
    if(screenSize <= 768){  
        $("#imgBG").attr("src" , "images/sub1_img.jpg");
        $("#imgBG2").attr("src" , "images/sub2_img.jpg");
        $("#imgBG3").attr("src" , "images/sub3_img.jpg");
        $("#imgBG4").attr("src" , "images/sub4_img.jpg");
      }
  	
    
    
    
    $(window).resize(function(){ 
      screenSize = $(window).width(); 
      screenHeight = $(window).height();
      $("#content").css('margin-top',screenHeight);
        
        if( screenSize > 768){         
      	
        $("#imgBG").attr("src" , "images/sub1_bg.jpg");
        $("#imgBG2").attr("src" , "images/sub2_bg.jpg");
        $("#imgBG3").attr("src" , "images/sub3_bg.jpg");
        $("#imgBG4").attr("src" , "images/sub4_bg.jpg");
            
      }
      if(screenSize <= 768){
        $("#imgBG").attr("src" , "images/sub1_img.jpg");
        $("#imgBG2").attr("src" , "images/sub2_img.jpg");
        $("#imgBG3").attr("src" , "images/sub3_img.jpg");
        $("#imgBG4").attr("src" , "images/sub4_img.jpg");  
      }
		 
     
    }); 
		
    
    $('.down').click(function () {
        $('html,body').animate({
            'scrollTop': screenHeight
        }, 1000);
    });
    

 var smh = $('.imgTotal').height();

       
         //스크롤의 좌표가 변하면.. 스크롤 이벤트
        $(window).on('scroll',function(){
            var scroll = $(window).scrollTop();
            var winSize= $(window).width();
            
            //스크롤top의 좌표를 담는다
            
            //$('.text').text(scroll);
            //스크롤 좌표의 값을 찍는다.
            
            // $('.btn1').css('background','#0079c2')
            // sticky menu 처리
            if(scroll>smh){ 
                $('#headerArea').css('background','rgba(0,0,50,.9)');               
            }else{
                $('#headerArea').css('background','none');                
            }
            
            if(winSize<=768){    
            if(scroll>800){              
				$('#headerArea').css('background', 'none');
            }else{            			
				$('#headerArea').css('background', 'none');
            }
            } 
            
            
        });
        
         $('.topMove').click(function(){
                  //상단으로 스르륵 이동합니다.
                 $("html,body").stop().animate({"scrollTop":0},1000); 
              });
            
    
    
    
