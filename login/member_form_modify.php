<? 
	session_start(); 

    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>정보수정</title>
		
	<link rel="stylesheet" href="../common/css/common.css">
	<link rel="stylesheet" href="../member/css/member_form.css">
	
	
	<script src="../common/js/jquery-1.12.4.min.js"></script>	
	<script src="../common/js/jquery-migrate-1.4.1.min.js"></script>
    <script src="https://kit.fontawesome.com/b4aa64dfea.js" crossorigin="anonymous"></script>
	
	<script>
	 $(document).ready(function() {
  
  
  
//nick 중복검사		 
$("#nick").keyup(function() {    // id입력 상자에 id값 입력시
    var nick = $('#nick').val();

    $.ajax({
        type: "POST",
        url: "check_nick.php",
        data: "nick="+ nick,  
        cache: false, 
        success: function(data)
        {
             $("#loadtext2").html(data);
        }
    });
});		 


});
	
	
	
	</script>
	<script>
   function check_id()
   {
     window.open("check_id.php?id=" + document.member_form.id.value,
         "IDcheck",
          "left=200,top=200,width=250,height=100,scrollbars=no,resizable=yes");
   }

   function check_nick()
   {
     window.open("../member/check_nick.php?nick=" + document.member_form.nick.value,
         "NICKcheck",
          "left=200,top=200,width=250,height=100,scrollbars=no,resizable=yes");
   }

  
   function check_input()
   {  
      if (!document.member_form.pass.value)
      {
          alert("비밀번호를 입력하세요");    
          document.member_form.pass.focus();
          return;
      }

      if (!document.member_form.pass_confirm.value)
      {
          alert("비밀번호확인을 입력하세요");    
          document.member_form.pass_confirm.focus();
          return;
      }

      if (!document.member_form.name.value)
      {
          alert("이름을 입력하세요");    
          document.member_form.name.focus();
          return;
      }

      if (!document.member_form.nick.value)
      {
          alert("닉네임을 입력하세요");    
          document.member_form.nick.focus();
          return;
      }


      if (!document.member_form.hp2.value || !document.member_form.hp3.value )
      {
          alert("휴대폰 번호를 입력하세요");    
          document.member_form.nick.focus();
          return;
      }

      if (document.member_form.pass.value != 
            document.member_form.pass_confirm.value)
      {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요.");    
          document.member_form.pass.focus();
          document.member_form.pass.select();
          return;
      }

      document.member_form.submit(); 
		   // insert.php 로 변수 전송
   }

   function reset_form()
   {
      document.member_form.id.value = "";
      document.member_form.pass.value = "";
      document.member_form.pass_confirm.value = "";
      document.member_form.name.value = "";
      document.member_form.nick.value = "";
      document.member_form.hp1.value = "010";
      document.member_form.hp2.value = "";
      document.member_form.hp3.value = "";
      document.member_form.email1.value = "";
      document.member_form.email2.value = "";
	  
      document.member_form.id.focus();

      return;
   }
</script>
</head>
<?
    //$userid='aaa';
    
    include "../lib/dbconn.php";

    $sql = "select * from member where id='$userid'";
    $result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);
    //$row[id]....$row[level]

    $hp = explode("-", $row[hp]);  //000-0000-0000
    $hp1 = $hp[0];
    $hp2 = $hp[1];
    $hp3 = $hp[2];

    $email = explode("@", $row[email]);
    $email1 = $email[0];
    $email2 = $email[1];

    mysql_close();
?>

<body>	
	 
	<article id="content">  
	  
	    <div class="joinHeader">
            <h1>
                <a href="../index.html">
                    <img src="../images/joinLogo.jpg" alt="다비치 로고">                        
                </a>                    
            </h1>
            <h2>정보수정</h2>
        </div>

	 	
        <form  name="member_form" method="post" action="modify.php"> 

        <ul>
            <li>
                <label for="id">아이디</label>
                <?= $row[id] ?>
            </li>
            <li>
                <label for="pass">비밀번호</label>
                <input type="password" name="pass" id="pass" value="" placeholder="비밀번호를 입력해주세요." required>
            </li>
            <li>
                <label for="pass_confirm">비밀번호 확인</label>
                <input type="password" name="pass_confirm" id="pass_confirm" value="" placeholder="비밀번호를 확인해주세요." required>
            </li>
            <li>
                <label for="name">이름</label>
                <input type="text" name="name" value="<?= $row[name] ?>"> 
            </li>
            <li>
                <label for="nick">닉네임</label>
                <input type="text" name="nick" id="nick" value="<?= $row[nick] ?>" placeholder="닉네임" required>
                <span id="loadtext2"></span>
            </li>
            <li>
                <label for="hp1">연락처</label>
                <label class="hidden" for="hp1">전화번호앞3자리</label>
     		    <select class="hp" name="hp1" id="hp1"> 
                   <option value='010'>010</option>
                   <option value='011'>011</option>
                   <option value='016'>016</option>
                   <option value='017'>017</option>
                   <option value='018'>018</option>
                   <option value='019'>019</option>
                </select>  - 
                <label class="hidden" for="hp2">전화번호중간4자리</label>
                <input type="text" class="hp" name="hp2" id="hp2" value="<?= $hp2 ?>" required> - <label class="hidden" for="hp3">전화번호끝4자리</label>
                <input type="text" class="hp" name="hp3" id="hp3" value="<?= $hp3 ?>" required>
            </li>
            <li>
                <label for="email">E-Mail</label>
                <label class="hidden" for="email1">이메일아이디</label>
                <input type="text" id="email1" name="email1" value="<?= $email1 ?>" required> @ 
     		    <label class="hidden" for="email2">이메일주소</label>
     		    <input type="text" name="email2" id="email2" value="<?= $email2 ?>" required>
            </li>
            <li class="end">
             <ul>
                 <li>
                     <a href="#" class="join_end" onclick="check_input()">수정완료</a>
                 </li>
                 <li>
                     <a href="#" class="join_again" onclick="reset_form()">다시작성</a>
                 </li>
                 <li>
                     <a href="../index.html" class="join_c">취소</a>
                 </li>
             </ul>
            </li>
        </ul>
	    </form>
	  
	</article>
	
</body>
</html>


