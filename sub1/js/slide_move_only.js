
     $('.slideMenu a').click(function(){ // 각각의 메뉴를 클릭하면
          var value=0;

          //* $(this).is('link1') / $(this).is('#link1')  클래스, 아이디 쓸 수 있다. hasClass 클래스만 잡는다. 

          if($(this).hasClass('link1')){                      
            // value = 338;                       
            value= $('.content_area section:eq(0)').offset().top-120;   

          }else if($(this).hasClass('link2')){
             // value = 1347;                      
            value= $('.content_area section:eq(1)').offset().top-128; 

          }else if($(this).hasClass('link3')){
            //  value = 2356;                      
            value= $('.content_area section:eq(2)').offset().top-98; 

          }

        $("html,body").stop().animate({"scrollTop":value},1000);
      });

       


        
        $('.slideMenu li:eq(0)').find('a').addClass('spy');
        //첫번째 서브메뉴 활성화
        
         //스크롤의 좌표가 변하면.. 스크롤 이벤트
        $(window).on('scroll',function(){
            var scroll = $(window).scrollTop();
            //스크롤top의 좌표를 담는다
            
           // $('.text').text(scroll);
            //스크롤 좌표의 값을 찍는다.
            
            
            // sticky menu 처리
            if(scroll>700){ 
                $('.slideMenu').addClass('navOn');
                //스크롤의 거리가 350px 이상이면 서브메뉴 고정
                $('header').hide();
            }else{
                $('.slideMenu').removeClass('navOn');
                //스크롤의 거리가 350px 보다 작으면 서브메뉴 원래 상태로
                $('header').show();
            }
            
            
            $('.slideMenu li').find('a').removeClass('spy');
            //모든 서브메뉴 비활성화~ 불꺼!!!
           
            //스크롤의 거리의 범위를 처리
            if(scroll>=0 && scroll<1700){
                $('.slideMenu li:eq(0)').find('a').addClass('spy');
                //첫번째 서브메뉴 활성화
               
            }else if(scroll>=1700 && scroll<2700){
                $('.slideMenu li:eq(1)').find('a').addClass('spy');
                //두번째 서브메뉴 활성화                
                
            }else if(scroll>=2700 && scroll<3300){
                $('.slideMenu li:eq(2)').find('a').addClass('spy');
                //세번째 서브메뉴 활성화               
                
            }
            
        });




