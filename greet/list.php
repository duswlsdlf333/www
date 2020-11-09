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
    <title>공지사항</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="css/greet.css">
    <link rel="stylesheet" href="../sub5/common/sub5common.css">    
    
    <script src="../common/js/prefixfree.min.js"></script>
    <script src="https://kit.fontawesome.com/b4aa64dfea.js" crossorigin="anonymous"></script>
    
</head>
<?
	include "../lib/dbconn.php";

	
  if (!$scale){
    $scale=10;			// 한 화면에 표시되는 글 수
  }
    
    if ($mode=="search")
	{
		if(!$search)
		{
			echo("
				<script>
				 window.alert('검색할 단어를 입력해 주세요!');
			     history.go(-1);
				</script>
			");
			exit;
		}

		$sql = "select * from greet where $find like '%$search%' order by num desc";
	}
	else
	{
		$sql = "select * from greet order by num desc";
	}

	$result = mysql_query($sql, $connect);

	$total_record = mysql_num_rows($result); // 전체 글 수

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	if (!$page)                 // 페이지번호($page)가 0 일 때
		$page = 1;              // 페이지 번호를 1로 초기화
 
	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $scale;      

	$number = $total_record - $start;
?>

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
                                <li><a href="../sub4/sub4_3.html">신규 가맹점</a></li>
                                <li><a href="../sub4/sub4_4.html">가맹 문의</a></li>
                            </ul>
                        </li>
                        <li class="m5 menu">
                            <h3><a class="depth1" href="../news/list.php">홍보센터</a></h3>
                            <ul>
                                <li><a href="../news/list.php">NEWS</a></li>
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
                    <li><a id="nav1" href="../news/list.php">NEWS</a></li>
                    <li><a class="current" id="nav2" href="list.php">공지사항</a></li>
                    <li><a id="nav3" href="../sub5/sub5_3.html">EVENT</a></li>
                    <li><a id="nav4" href="../sub5/sub5_4.html">홍보영상</a></li>
                    <li><a id="nav5" href="../sub5/sub5_5.html">Q&amp;A</a></li>    
                </ul>
        </div>    



<article id="content">
            <div class="title_area">
               <div class="lineMap">
                   <span>Home</span> &gt; <span>홍보센터</span> &gt; <strong>공지사항</strong>
               </div> 
               <h2>공지사항</h2>    
            </div>


<div class="content_area">

	<section class="announce">   

		<form  name="board_form" method="post" action="list.php?mode=search"> 
		<div id="list_search">
			<div id="list_search1">Total: <?= $total_record ?> 건</div>
			<div class="list_search_group">
                <div id="list_search3">
                    <select name="find">
                        <option value='subject'>제목</option>
                        <option value='content'>내용</option>
                        <option value='nick'>별명</option>
                        <option value='name'>이름</option>
                    </select></div>
                <div id="list_search4"><input type="text" name="search"></div>
                <div id="list_search5"><input type="submit" value="검색"></div>    
                
			</div>			
		</div>
		</form>
		
		<select name="scale" onchange="location.href='list.php?scale='+this.value">
                    <option value=''>보기</option>
                    <option value='5'>5</option>
                    <option value='10'>10</option>
                    <option value='15'>15</option>
                    <option value='20'>20</option>
        </select>
		
		

		<div class="clear"></div>

		<div id="list_top_title">
			<ul>
				<li id="list_title1">번호</li>
				<li id="list_title2">제목</li>
				<li id="list_title3">글쓴이</li>
				<li id="list_title4">등록일</li>
				<li id="list_title5">조회</li>
			</ul>		
		</div>

		<div id="list_content">
<?		
   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysql_data_seek($result, $i);       
      // 가져올 레코드로 위치(포인터) 이동  
      $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	  $item_num     = $row[num];
	  $item_id      = $row[id];
	  $item_name    = $row[name];
  	  $item_nick    = $row[nick];
	  $item_hit     = $row[hit];

      $item_date    = $row[regist_day];
	  $item_date = substr($item_date, 0, 10);  

	  $item_subject = str_replace(" ", "&nbsp;", $row[subject]);

?>
			<div id="list_item">
				<div id="list_item1"><?= $number ?></div>
				<div id="list_item2"><a href="view.php?num=<?=$item_num?>&page=<?=$page?>"><?= $item_subject ?></a></div>
				<div id="list_item3"><?= $item_nick ?></div>
				<div id="list_item4"><?= $item_date ?></div>
				<div id="list_item5"><?= $item_hit ?></div>
			</div>
<?
   	   $number--;
   }
?>
			<div id="page_button">
				<div id="page_num">◀ 이전 &nbsp;&nbsp;&nbsp;&nbsp; 
<?
   // 게시판 목록 하단에 페이지 링크 번호 출력
   for ($i=1; $i<=$total_page; $i++)
   {
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
			echo "<b> $i </b>";
		}
		else
		{ 
           if($mode=="search"){
             echo "<a href='list.php?page=$i&scale=$scale&mode=search&find=$find&search=$search'> $i </a>"; 
            }else{    
            
			  echo "<a href='list.php?page=$i&scale=$scale'> $i </a>";
           }
		}      
   }
?>			
			&nbsp;&nbsp;&nbsp;&nbsp;다음 ▶</div>
				<div id="button">
					<a href="list.php?page=<?=$page?>">목록</a>&nbsp;
<? 
	if($userid=="duswlsdlf333")
	{
?>
		<a href="write_form.php">글쓰기</a>
<?
	}
?>
				</div>
			
		
        </div> <!-- end of list content -->

		<div class="clear"></div>

	</div> <!-- end of col2 -->
  </section>
 
 </div> 
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
 
 
  
    
</div>
  
   <script src="../common/js/jquery-1.12.4.min.js"></script>  
   <script src="../common/js/jquery-migrate-1.4.1.min.js"></script>
   <script src="../common/js/gnb.js"></script>
   <script src="../common/js/slide_move.js"></script>
   <script src="../common/js/select.js"></script>    


</body>
</html>