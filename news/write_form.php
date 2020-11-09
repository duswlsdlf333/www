<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
    //새글쓰기 =>  $table='consert'
    //수정 => $table=concert  $mode=modify  $num=1  $page=1


	include "../lib/dbconn.php";

	if ($mode=="modify") //수정 글쓰기면
	{
		$sql = "select * from $table where num=$num";
		$result = mysql_query($sql, $connect);

		$row = mysql_fetch_array($result);       
	
		$item_subject     = $row[subject];
		$item_content     = $row[content];

		$item_file_0 = $row[file_name_0];
		$item_file_1 = $row[file_name_1];
		$item_file_2 = $row[file_name_2];

		$copied_file_0 = $row[file_copied_0];
		$copied_file_1 = $row[file_copied_1];
		$copied_file_2 = $row[file_copied_2];
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">    
    <title>NEWS</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="../greet/css/greet.css">
    <link rel="stylesheet" href="../sub5/common/sub5common.css">
    
    <script src="../common/js/prefixfree.min.js"></script>
    <script src="https://kit.fontawesome.com/b4aa64dfea.js" crossorigin="anonymous"></script>    
    
<script>
  function check_input()
   {
      if (!document.board_form.subject.value)
      {
          alert("제목을 입력하세요!");    
          document.board_form.subject.focus();
          return;
      }

      if (!document.board_form.content.value)
      {
          alert("내용을 입력하세요!");    
          document.board_form.content.focus();
          return;
      }
      document.board_form.submit();
   }
</script>

</head>

<body>

<div id="skipNav">
     <a href="#content">본문 바로가기</a>
     <a href="#gnb">글로벌 네비게이션 바로가기</a>
</div>  


<div id="wrap">
 
 <header id="headerArea">
         <div class="header_inner">          
           <h1 class="logo">
               <a href="../index.html">다비치로고</a>               
           </h1>
           <div class="header_right">
               <div class="header_top">
                   <ul>
<?
    if(!$userid)  	{
?>                           
                      
        <li class="log"><a href="../login/login_form.php">로그인</a></li>
        <li class="joi"><a href="../member/join.html">회원가입</a></li>
                               
        <li>                       
           <form  name="board_form" method="post" action="../news/list.php?mode=search"> 

            <div id="list_search">			
            <!--	
                <div id="list_search3">
                    <label class="hidden" for="find">상품명</label>
                    <select name="find" id="find">
                        <option value='subject'>제목</option>
                        <option value='content'>내용</option>
                        <option value='nick'>별명</option>
                        <option value='name'>이름</option>
                    </select>
                </div>
                -->
                <label class="hidden" for="find">상품명</label>
                <input type="hidden" name="find" value="subject">

                <div id="list_search4">

                <label class="hidden" for="search">상품검색어입력</label>
                <input type="text" name="search" placeholder="상품명검색"></div>
                <div id="list_search5"><input type="image" src="../images/search.png">                
                </div>
            </div>
            </form>
		</li>
		
<?
	}
	else  
	{
?>         
                       <li class="nic"><?=$usernick?></li>           
                       <li class="log"><a href="../login/logout.php">로그아웃</a></li>
                       <li class="joi"><a href="../login/member_form_modify.php">정보수정</a></li>
                       <li>                       
           <form  name="board_form" method="post" action="../news/list.php?mode=search"> 

            <div id="list_search">			
            <!--	
                <div id="list_search3">
                    <label class="hidden" for="find">상품명</label>
                    <select name="find" id="find">
                        <option value='subject'>제목</option>
                        <option value='content'>내용</option>
                        <option value='nick'>별명</option>
                        <option value='name'>이름</option>
                    </select>
                </div>
                -->
                <label class="hidden" for="find">상품명</label>
                <input type="hidden" name="find" value="subject">

                <div id="list_search4">

                <label class="hidden" for="search">상품검색어입력</label>
                <input type="text" name="search" placeholder="상품명검색"></div>
                <div id="list_search5"><input type="image" src="../images/search.png">                
                </div>
            </div>
            </form>
		</li>
<?
	}
?>                       
                   </ul>                   
               </div>
               <nav id="gnb">
                  <h2 class="hidden">글로벌네비게이션영역</h2>
                
                  <ul class="dropdownmenu">
                        <li class="m1 menu">
                            <h3><a class="depth1" href="../sub1/sub1_1.html">기업소개</a></h3>
                            <ul>
                                <li><a href="../sub1/sub1_1.html">CEO 인사말</a></li>
                                <li><a href="../sub1/sub1_2.html">경영이념</a></li>
                                <li><a href="../sub1/sub1_3.html">회사연혁</a></li>
                                <li><a href="../sub1/sub1_4.html">회사CI</a></li>
                                <li><a href="../sub1/sub1_5.html">본사위치</a></li>
                            </ul>
                        </li>
                        <li class="m2 menu">
                            <h3><a class="depth1" href="../sub2/sub2_1.html">제품안내</a></h3>
                            <ul>
                                <li><a href="../sub2/sub2_1.html">안경</a></li>
                                <li><a href="../sub2/sub2_2.html">선글라스</a></li>
                                <li><a href="../sub2/sub2_3.html">콘택트렌즈</a></li>
                            </ul>
                        </li>
                        <li class="m3 menu">
                            <h3><a class="depth1" href="../sub3/sub3_1.html">차별화 시스템</a></h3>
                            <ul>
                                <li><a href="../sub3/sub3_1.html">AI-GO VCS</a></li>
                                <li><a href="../sub3/sub3_2.html">눈의 불편 체크</a></li>
                                <li><a href="../sub3/sub3_3.html">연령별 맞춤안경</a></li>   
                            </ul>
                        </li>
                        <li class="m4 menu">
                            <h3><a class="depth1" href="../sub4/sub4_1.html">가맹개설</a></h3>
                            <ul>
                                <li><a href="../sub4/sub4_1.html">가맹 안내</a></li>
                                <li><a href="../sub4/sub4_2.html">가맹 절차</a></li>
                                <li><a href="../sub4/sub4_3.html">신규 가맹
                                점</a></li>
                                <li><a href="../sub4/sub4_4.html">가맹 문의</a></li>
                            </ul>
                        </li>
                        <li class="m5 menu">
                            <h3><a class="depth1" href="list.php">홍보센터</a></h3>
                            <ul>
                                <li><a href="list.php">NEWS</a></li>
                                <li><a href="../greet/list.php">공지사항</a></li>
                                <li><a href="../sub5/sub5_3.html">EVENT</a></li>
                                <li><a href="../sub5/sub5_4.html">홍보영상</a></li>
                                <li><a href="../sub5/sub5_5.html">Q&amp;A</a></li>                               
                            </ul>
                        </li>
                        <li class="m6 menu">
                            <h3><a class="depth1" href="../sub6/sub6_1.html">인재양성</a></h3>
                            <ul>
                                <li><a href="../sub6/sub6_1.html">아카데미 소개</a></li>
                                <li><a href="../sub6/sub6_2.html">아카데미 활동</a></li>
                                <li><a href="../sub6/sub6_3.html">아카데미 과정</a></li>                                
                            </ul>
                        </li>
                  </ul>                  
                                                                            
                  
               </nav>
           </div>
         </div>              
       </header>     
 
 <!-- 메인 비주얼 영역 -->
             
       <div class="visual">           
           <img src="../sub5/common/images/sub5_visual.jpg" alt="">
           <div>
               <h3>홍보센터</h3>
               <p>세상을 밝게 비추는 다비치를 알려드립니다.</p>
           </div>
       </div>                                                                                                                                                                                            
                                                                                                                                                                                                                                                                                                     
   <!-- 서브 네비 영역 -->
                                     
        <div class="subNav">
                <ul>
                    <li><a class="current" id="nav1" href="list.php">NEWS</a></li>
                    <li><a id="nav2" href="../greet/list.php">공지사항</a></li>
                    <li><a id="nav3" href="../sub5/sub5_3.html">EVENT</a></li>
                    <li><a id="nav4" href="../sub5_4.html">홍보영상</a></li>
                    <li><a id="nav5" href="../sub5_5.html">Q&amp;A</a></li> 
                </ul>
        </div>    
    
 <article id="content">
    <div class="title_area">
       <div class="lineMap">
           <span>Home</span> &gt; <span>홍보센터</span> &gt; <strong>NEWS</strong>
       </div> 
       <h2>NEWS</h2>    
    </div>
 
	

	<div class="content_area">        
		<h3>글쓰기</h3>
<?
	if($mode=="modify")  // 수정 모드일 때 
	{

?>
        <form name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>&table=<?=$table?>" enctype="multipart/form-data"> 
<? 
	}
	else     // 새글쓰기 모드 
	{
?>
        <form  name="board_form" method="post" action="insert.php?table=<?=$table?>" enctype="multipart/form-data"> 
<?
	}
?>		
		<div id="write_form">
			<div class="write_line"></div>
			
			<div id="write_row1">
				<div class="col1"> 닉네임 </div>
				<div class="col2"><?=$usernick?></div>
<?
	if( $userid && ($mode != "modify") )
	{   //새글쓰기 에서만 HTML 쓰기가 보인다
?>	
				<div class="col3"><input type="checkbox" name="html_ok" value="y"> HTML 쓰기</div>
<?
	}
?>	
			</div>
			
			<div class="write_line"></div>
			
			<div id="write_row2"><div class="col1">제목</div>
			                     <div class="col2"><input type="text" name="subject" value="<?=$item_subject?>"></div>
			</div>
			
			<div class="write_line"></div>
			
			<div id="write_row3"><div class="col1">내용</div>
			                     <div class="col2"><textarea rows="15" cols="79" name="content"><?=$item_content?></textarea></div>
			</div>
			
			<div class="write_line"></div>
			
			<div id="write_row4"><div class="col1">이미지파일1</div>
			                     <div class="col2"><input type="file" name="upfile[]"></div>
			</div>
			<div class="clear"></div>
<? 	if ($mode=="modify" && $item_file_0)
	{
?>
			<div class="delete_ok"><?=$item_file_0?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="0"> 삭제</div>
			<div class="clear"></div>
<?
	}
?>
			<div class="write_line"></div>
			
			
			
			<div id="write_row5"><div class="col1">이미지파일2</div>
			                     <div class="col2"><input type="file" name="upfile[]"></div>
			</div>
<? 	if ($mode=="modify" && $item_file_1)
	{
?>
			<div class="delete_ok"><?=$item_file_1?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="1">삭제</div>
			<div class="clear"></div>
<?
	}
?>
			<div class="write_line"></div>
			<div class="clear"></div>
			<div id="write_row6"><div class="col1">이미지파일3</div>
			                     <div class="col2"><input type="file" name="upfile[]"></div>
			</div>
<? 	if ($mode=="modify" && $item_file_2)
	{
?>
			<div class="delete_ok"><?=$item_file_2?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="2">삭제</div>
			<div class="clear"></div>
<?
	}
?>
			<div class="write_line"></div>

			<div class="clear"></div>
		</div>

		<div id="write_button">
            <input type="submit" value="완료">
            <a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>
		</div>
		</form>
        </form>
	</div> <!-- end of col2 -->
 </article>
  <a class="topMove" href="javascript:void(0);"><span>↑</span></a>
                                        
                                                                                                                        
    <footer id="footerArea">
         <div class="footer_inner">
           <div class="footer_left">
              
              <div>     
                <a href="#">
                    <img src="../common/images/footer_logo.jpg" alt="다비치 로고">
                </a>
                    
                <ul class="foot_nav">                 
                     <li><a href="../sub1/sub1_1.html">기업소개</a>
                     </li>
                     <li><a href="#">이용약관</a>
                     </li>
                     <li><a href="#">개인정보 취급방침</a>
                     </li>
                     <li><a href="../sub1/sub1_5.html">오시는 길</a>
                     </li>
                     <li><a href="../sub5/sub5_5.html">Q&#38;A</a>
                     </li>
                </ul>  
              </div>              
              
              <address>
                  서울시 용산구 서계동 223-56 (만리재로 190-1) (주)다비치안경체인 본사,
                  대표이사 김인규<br>
                  사업자등록번호 764-81-01136(보청기지검 159-85-01083), 
                  체인본사 02-752-6177 
              </address>
          
              <p>COPYRIGHTGHT&copy;DAVICH OPTICAL. ALL RIGHTS RESERVED.</p>  
           </div>       
           
           
           
           <div class="footer_right">              
              
               <div class="footer_family">                                  
                   <a class="arrow" href="javascript:void(0);">Family Site <span>+</span></a>                  
                   <ul class="aList">
                        <li><a href="http://www.bibiem.co.kr" target="_blank" title="bibiem 새창에 열림">bibiem</a></li>
                        <li><a href="http://davichlens.com" target="_blank" title="다비치렌즈 새창에 열림">다비치렌즈</a></li>
                        <li><a href="http://www.davichhearing.com" target="_blank" title="다비치보청기 새창에 열림">다비치보청기</a></li>
                        <li><a href="https://www.kvisionoptical.com" target="_blank" title="K비젼안경 새창에 열림">K비젼안경</a></li>                       
                   </ul>                   
               </div>
               <div class="footer_platform">
                   <ul>
                       <li>
                          <a href="javascript:void(0);">
                            <span class="hidden">인스타그램</span>
                            <i class="fab fa-instagram-square"></i>  
                          </a>
                       </li>
                       <li>
                          <a href="javascript:void(0);">
                            <span class="hidden">유튜브</span>
                            <i class="fab fa-youtube-square"></i>  
                          </a>
                       </li>
                       <li>
                          <a href="javascript:void(0);">
                            <span class="hidden">페이스북</span>
                            <i class="fab fa-facebook-square"></i>  
                          </a>
                       </li>
                   </ul>                   
               </div>               
           </div>
         </div>         
       </footer>
 
</div> <!-- end of wrap -->  

   <script src="../common/js/jquery-1.12.4.min.js"></script>  
   <script src="../common/js/jquery-migrate-1.4.1.min.js"></script>
   <script src="../common/js/gnb.js"></script>
   <script src="../common/js/slide_move.js"></script>
   <script src="../common/js/select.js"></script>    
   
</body>
</html>