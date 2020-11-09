$(document).ready(function(){
        
     var screenSize = $(window).width();
 
    function screenW(){     
     if(screenSize>1024){
         $('.changes1').attr('src','images/character_6.jpg');         
     }else if(screenSize>768){
         $('.changes1').attr('src','images/character_7.jpg');         
         
     }else if(screenSize>640){         
         $('.changes3').attr('src','images/character_5.jpg');
     }else{
         $('.changes3').attr('src','images/character_8.jpg');         
     }
    }
     
    screenW();  //함수호출    
        
    $(window).resize(function(){ 
      screenSize = $(window).width(); 
        
      screenW();//함수호출
    });     

});