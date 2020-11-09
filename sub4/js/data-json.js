var mtab1 = document.getElementById('t1');
var mtab2 = document.getElementById('t2');
var mtab3 = document.getElementById('t3');
var mtab4 = document.getElementById('t4');

var xhr = new XMLHttpRequest();                 // XMLHttpRequest 객체를 생성한다.


function ajax_call(localm){
  //alert(xhr.responseText);
  //if(xhr.status === 200) {                      
    responseObject = JSON.parse(xhr.responseText);  
    
	var localText='';                                              
    
    if(localm==1){
        localText='서울 지역';
    }else if(localm==2){
        localText='경기 지역';
    }else if(localm==3){
        localText='영남 지역';
    }else if(localm==4){
        localText='그외 지역';
    }

    var newContent = '';
    
    newContent = '<table>';
    newContent += '<thead><tr><th colspan="2">'+ localText + '</th></tr></thead>';    
    newContent += '<tbody>';
    
    for (var i = 0; i < responseObject.region.length; i++) {
      
      newContent += '<tr>';
      newContent += '<th>'+ responseObject.region[i].borough+'</th>';
      newContent += '<td>'+ responseObject.region[i].name + '</td>';    
      newContent += '</tr>'; 
        
    }
    
    newContent += '</tbody>';
    newContent += '</table>';
 
    document.getElementById('contacts').innerHTML = newContent;

}

xhr.onload = function() {                       // When readystate changes
   ajax_call(1);
};

xhr.open('GET', 'data/data.json', true);        // 요청을 준비한다.
xhr.send(null);                                 // 요청을 전송한다


mtab1.onclick = function(){
   
    xhr.onload = function() {                       // When readystate changes
    ajax_call(1);
        
};

xhr.open('GET', 'data/data.json', true);        // 요청을 준비한다.
xhr.send(null);     
    
}

mtab2.onclick = function(){
   
    xhr.onload = function() {                       // When readystate changes
    ajax_call(2);
        
};

xhr.open('GET', 'data/data2.json', true);        // 요청을 준비한다.
xhr.send(null);     
    
}

mtab3.onclick = function(){
   
    xhr.onload = function() {                       // When readystate changes
    ajax_call(3);
        
};

xhr.open('GET', 'data/data3.json', true);        // 요청을 준비한다.
xhr.send(null);     
    
}

mtab4.onclick = function(){
   
    xhr.onload = function() {                       // When readystate changes
    ajax_call(4);
        
};

xhr.open('GET', 'data/data4.json', true);        // 요청을 준비한다.
xhr.send(null);     
    
}





