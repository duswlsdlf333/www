<?
   function latest_article($table, $loop, $char_limit) 
   {
		include "dbconn.php";

		$sql = "select * from $table order by num desc limit $loop";
		$result = mysql_query($sql, $connect);

		while ($row = mysql_fetch_array($result))
		{
			$num = $row[num];
			$len_subject = mb_strlen($row[subject], 'utf-8');
			$subject = $row[subject];

			if ($len_subject > $char_limit)
			{
				 $subject = str_replace( "&#039;", "'", $subject);               
                                                       $subject = mb_substr($subject, 0, $char_limit, 'utf-8');
				$subject = $subject."...";
			}

			$regist_day = substr($row[regist_day], 0, 10);

			echo "      
				<li class='col1'>
                <a href='./$table/view.php?table=$table&num=$num'>$subject
                </a>
                </li>
                
                <li class='col2'>$regist_day</li>
                <li class='clear'></li>
			";            
		}
		mysql_close();
   }

   /*
   뉴스 것
   <li>[코리아타임즈] 다비치안경체인, 부모님 추석효도선물 `개인맞춤누진다초점 렌즈` 이벤트<span>20.06.03.</span></li>
                      
   공지사항 것
   <li>2020년 사관 14기 공채 22,23,24기 다비치 가맹점별 채용 예정 인원<span>20.06.03.</span></li>   
   */


?>

