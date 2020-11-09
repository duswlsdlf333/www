// JavaScript Document


  var cnt=2;  //탭메뉴개수  ***
  
  $('.tabs .contlist:eq(0)').show(); //첫번째 내용만 보여라
  $('.tabs .tab1').addClass('on');
  
  $('.tabs .tab').each(function (index) {  // index=> 0 1 2
    $(this).click(function(){   //각각의 탭메뉴를 클릭하면 
	  $('.tabs .contlist').hide(); // 모든 탭내용을 안보이게 한다
	  $('.tabs .contlist:eq('+index+')').show();
	  for(var i=1;i<=cnt;i++){
           $('.tab'+i).removeClass('on');
      }
      $(this).addClass('on'); 
   });
  });



    $(window).on('scroll',function(){
      //스크롤의 좌표가 변하면.. 스크롤 이벤트
        var scroll = $(window).scrollTop();
        //스크롤top의 좌표를 담는다

        //$('.text').text(scroll);
        //스크롤 좌표의 값을 찍는다.

        //스크롤의 거리의 범위를 처리
        if(scroll>=400 && scroll<900){              
            $('.sub_vision').addClass('boxMove1');
            //첫번째 내용 콘텐츠 애니메이
        }else if(scroll>=900 && scroll<1100){
            $('.sub_mission').addClass('boxMove2');
        }
    });


   
 
    var list1 = document.getElementById('tab1');
    var list2 = document.getElementById('tab2'); 
    var tab1 = document.getElementById('viv1');
    var tab2 = document.getElementById('viv2');
     
    var purl=window.location; //  //호출된 현재창의 주소  sub.html?a=1
    tmp=String(purl).split('?'); //? 이후가 배열에 담김 a=1 //tmp[0]='sub.html', tmp[1]='a=1' 이렇게 ? 앞뒤로 나눠서 배열로 해서 담김
   
   if(tmp[1]!=undefined){ // ?변수=값  이 넘어올때만....
        tmp2=tmp[1].split('='); 
        //tmp2[0]='a', tmp2[1]='1'
       
        if(tmp2[1]==1){
            list1.style.display='block';
            tab1.classList.add('on');
        }else if(tmp2[1]==2){
            list1.style.display='none';
            list2.style.display='block';
            tab1.classList.remove('on');
            tab2.classList.add('on');
        }
   }
      
  
      
   


