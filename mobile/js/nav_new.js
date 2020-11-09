   
 	
   $(".btn").click(function() { //메뉴버튼 클릭시
       
       var documentHeight =  $(document).height();
       //실제 페이지의 높이 = $(document).height();
       $(".box").css('height',documentHeight);
       $("#gnb").css('height',documentHeight);
       //반투명박스와 네비의 높이를 실제 페이지의 높이로 바꾸어라   

       $("#gnb").animate({right:0,opacity:1}, 'slow');
       $(".box").show();
       $("#headerArea").css('position', 'absolute');
   });
   
   $(".box,.mclose").click(function() { //닫기버튼 클릭시
     $("#gnb").animate({right:'-100%',opacity:0}, 'fast');
     $(".box").hide();
     $("#headerArea").css('position', 'fixed');   
   });
     
    //2depth 메뉴 교대로 열기 처리 
    var onoff=[false,false,false,false,false,false];
		//onoff[0]=false, onoff[1]=false, onoff[2]=false...
    var arrcount=onoff.length; //6 배열의 방 개수
    
//    console.log(arrcount);
    
    $('#gnb .depth1>a').click(function(){
        var ind=$(this).parents('.depth1').index();
        //각 메인메뉴 클릭시 해당 index를 뽑아낸다. 0-5
		
//        console.log(ind);
        
       if(onoff[ind]==false){  //클릭한 해당 메뉴의 서브가 닫혀있는가?
        //$('#gnb .depth1 ul').hide();
        $(this).next('ul').slideDown('fast');
        $(this).parents('.depth1').siblings('li').find('ul').slideUp('fast'); 	//하나 누를때 다른 아이는 닫히게 하는 코드
                   
         for(var i=0; i<arrcount; i++) onoff[i]=false; 	//하나 누를때 다른 아이는 닫히게 하는 코드
         onoff[ind]=true;           
		   
		 $('.depth1 span').text('+');
		 $(this).find('span').text('-');
         $(this).css('color', '#0079c2');
         $(this).parents('.depth1').siblings('li').find('a').css('color', '#333');    
            
       }else{	//클릭한 해당 메뉴의 서브가 열려있는가?
         $(this).next('ul').slideUp('fast'); 
         onoff[ind]=false; 
		   
		 $(this).find('span').text('+');
         $(this).css('color', '#333');   
       }
    });    
