<?
	session_start();
    @extract($_GET); 
    @extract($_POST); 
    @extract($_SESSION);  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>로그인</title>
    
    <link href="css/member.css" rel="stylesheet">
    <link rel="stylesheet" href="../common/css/common.css">  
</head>
<body>
  <article id="content">
   
    <div class="Header">
        <h1>
            <a href="../index.html">
                <img src="../images/joinLogo.jpg" alt="다비치 로고">
            </a>                    
        </h1>
        <h2>로그인</h2>
    </div>
       
        <form  name="member_form" method="post" action="login.php"> 
       
		<div id="login_form">
			
            <div class="id_pw_input">
                <ul>
                    <li>
                    <label class="hidden" for="id">ID</label>
                    <input type="text" name="id" class="login_input" placeholder="아이디를 입력해주세요.(영문/숫자만 가능)" >	
                    </li>
                    <li>
                    <label class="hidden" for="pass">PASSWORD</label>
                    <input type="password" name="pass" class="login_input" placeholder="비밀번호를 입력해주세요." >	
                    </li>
                </ul>
            </div>					

            <div class="login_button">
                <input type="submit" value="로그인">
                <a href="../index.html">취소</a>
            </div>

            <div class="join_button">
                <p>온오프라인 통합멤버쉽, 맞춤서비스, 다비치포인트 등<br>다비치의 풍성한 혜택을 모두 제공받으시려면!</p>                
                <a href="../member/join.html">회원가입</a>
            </div>
                    
			 		 
		</div> <!-- end of form_login -->

	    </form>
  
  </article>
  <p class="last"><strong>"다비치"</strong>는 <span>세상을 맑고 밝게 다 비춘다</span>는 순 우리말로 소외된 어려운 이웃까지 맑고 밝게 다 비춘다는 의미로 다비치입니다.</p>       
    
</body>
</html>