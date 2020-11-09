// JavaScript Document


	var article = $('.article');  // 모든 리스트들
	// article.find('.a').slideUp(100); // 모든 답변 닫아라     
	
	$('.article .trigger').click(function(){ 
        //각각의 질문을 클릭하면 
	var myArticle = $(this).parents('.article'); 
        //클릭한 질문의 리스트 
	
	if(myArticle.hasClass('hide')){ // 클릭한 리스트의 답변이 닫혀있어?  
	    article.find('.a').slideUp(100); // 모든 답변 닫아
		article.removeClass('show').addClass('hide'); //전부 hide 상태로              
	    myArticle.removeClass('hide').addClass('show');         
	    myArticle.find('.a').slideDown(100);        
	 } else {  //클릭한 리스트의 답변이 열려있어? show
	   myArticle.removeClass('show').addClass('hide');  
	   myArticle.find('.a').slideUp(100);       
	}  
  });    
	
	$('.all').toggle(function(){ 
	    article.find('.a').slideDown(100);
	    article.removeClass('hide').addClass('show');       
        $(this).text('모두 닫기▲');
        
	},function(){ 
	    article.find('.a').slideUp(100);
	    article.removeClass('show').addClass('hide');        
        $(this).text('모두 열기▼');
        
	});
	
