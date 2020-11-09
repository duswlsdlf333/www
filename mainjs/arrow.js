// JavaScript Document

 
	     //var timeonoff;  // 타이머
         var pcnt=1;  // 카운터=순서
		 var totalcnt=3; // 총 개수   ****
		 
	 $('.next_tab').click(function () {
		 pcnt++;  // 카운터를 1씩 증가
		 if(pcnt>totalcnt){  //카운터가 4가되면
		    pcnt=1;  //카운터를 1로 바꾼다
		 }		 
		 
	     //clearInterval(timeonoff );	
         $('.gallery_box_container ul').first().appendTo('.gallery_box_container');
         });


         $('.prev_tab').click(function () {
		   pcnt--;	 //카운트 1씩 감소
		   if(pcnt<1){  //1보다 작아지면
		    pcnt=totalcnt;  //3으로 바꾼다 총개수..
		   }
		   		
			 
	     //clearInterval(timeonoff );	
             $('.gallery_box_container ul').last().prependTo('.gallery_box_container');  //prependTo 가장 위로 보낸다
         });
	/*
		 timeonoff =  setInterval(function () { 
			  pcnt++;
		     if(pcnt>totalcnt){
		         pcnt=1;
		      }
		      $('.num strong').text(pcnt);
		      $('.gallery_box ul').first().appendTo('.gallery_box .gallery_box_container'); // 첫번째 ul 의 첫번째 ul (appendTo 가장 밑으로)
			   
            }, 4000);
	 */
