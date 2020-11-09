<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

    // $table=concert   $num=1   $page=1

	include "../lib/dbconn.php";

	$sql = "select * from $table where num=$num";
	$result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
  	$item_nick    = $row[nick];
	$item_hit     = $row[hit];

	$image_name[0]   = $row[file_name_0];  // 첨부파일의 실제 이름
	$image_name[1]   = $row[file_name_1];
	$image_name[2]   = $row[file_name_2];


	$image_copied[0] = $row[file_copied_0];  // 날짜/시간으로 바뀐 이름
	$image_copied[1] = $row[file_copied_1];
	$image_copied[2] = $row[file_copied_2];

    $item_date    = $row[regist_day];
	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	$item_content = $row[content];
	$is_html      = $row[is_html];

	if ($is_html!="y")
	{
		$item_content = str_replace(" ", "&nbsp;", $item_content);
		$item_content = str_replace("\n", "<br>", $item_content);
	}
    if ($is_html="y")
	{
        $item_content = str_replace("&lt;", "<", $item_content);
	    $item_content = str_replace("&gt;", ">", $item_content);
    }

	
	for ($i=0; $i<3; $i++)   // 0~2 첨부된 이미지 처리를 위한 반복문
	{
		if ($image_copied[$i]) //업로드한 파일이 존재하면 0 1 2
		{
			$imageinfo = GetImageSize("./data/".$image_copied[$i]);
            //GetImageSize(서버에 업로드된 파일 경로 파일명) 
              //        => 배열형태의 리턴값
              // => 파일의 $imageinfo[0]너비와 $imageinfo[1]높이값, $imageinfo[2]종류
			$image_width[$i] = $imageinfo[0];  //파일너비
			$image_height[$i] = $imageinfo[1]; //파일높이
			$image_type[$i]  = $imageinfo[2];  //파일종류

            if ($image_width[$i] > 785) // 첨부된 이미지의 최대너비를 785로 지정
				$image_width[$i] = 785;
		}
		else  // 업로드된 이미지가 없으면 
		{
			$image_width[$i] = "";
			$image_height[$i] = "";
			$image_type[$i]  = "";
		}
	}

	$new_hit = $item_hit + 1;

	$sql = "update $table set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
	mysql_query($sql, $connect);
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
    function del(href) 
    {
        if(confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) {
                document.location.href = href;
        }
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
		<div id="view_title">
			<div id="view_title1"><?= $item_subject ?></div><div id="view_title2"><?= $item_nick ?> | 조회 : <?= $item_hit ?>  
			                      | <?= $item_date ?> </div>	
		</div>

		<div id="view_content">
<?
	for ($i=0; $i<3; $i++)  //업로드된 이미지를 출력한다
	{
		if ($image_copied[$i])
		{
			$img_name = $image_copied[$i];
			$img_name = "./data/".$img_name; 
             // ./data/2019_03_22_10_07_15_0.jpg
			$img_width = $image_width[$i];
			
			echo "<img src='$img_name' width='$img_width'>"."<br><br>";
		}
	}
?>
			<?= $item_content ?>
		</div>

		<div id="view_button">
				<a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>&nbsp;
<? 
	if($userid==$item_id || $userid=="duswlsdlf333" || $userlevel==1 )
	{
?>
				<a href="write_form.php?table=<?=$table?>&mode=modify&num=<?=$num?>&page=<?=$page?>">수정</a>&nbsp;
				<a href="javascript:del('delete.php?table=<?=$table?>&num=<?=$num?>')">삭제</a>&nbsp;
<?
	}
?>
<? 
	if($userid=="duswlsdlf333")
	{
?>
				<a href="write_form.php?table=<?=$table?>">글쓰기</a>
<?
	}
?>
		</div>

		<div class="clear"></div>

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