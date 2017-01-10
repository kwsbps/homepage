<!DOCTYPE html>
<?
// HTTPS 체크 및 URL 리턴
if(!isset($_SERVER["HTTPS"])) {  
 header('Location: https://www.30cut.com');
}

$mobile_agent = '/(iPod|iPhone|Android|BlackBerry|SymbianOS|SCH-M\d+|Opera Mini|Windows CE|Nokia|SonyEricsson|webOS|PalmOS)/';
if(preg_match($mobile_agent, $_SERVER['HTTP_USER_AGENT'])) {
  header('Location: https://www.30cut.com/index.html');
}


?>

<html>
    <head>
        <meta charset="utf-8">
         <title>30CUT, 카드대출 이자 30% 인하</title>
        <meta name="description" content="농협은행대출, 카드대출 대환, 대환대출, 대환 전문 P2P 플랫폼, 30CUT-NH론, P2P대출, 써티컷, 30컷, 삼십컷">
        <meta name="author" content="30CUT">
		<meta name="title" content="30CUT, 카드대출 이자 30% 인하">
        <meta name="keywords" content="농협은행대출, 카드대출 대환, 대환대출, 대환 전문 P2P 플랫폼, 30CUT-NH론, P2P대출, 써티컷, 30컷, 삼십컷">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="naver-site-verification" content="27b7facbf24c40b39ecf5c5eb079a4af52a45e7e"/> 
    </head>
	
    <frameset rows="1*"> 
    <frame name="main" src="index.html">
    <noframes> 
    
    </noframes>
</frameset>

</html>