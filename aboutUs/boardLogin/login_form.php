<? session_start(); ?>
<!DOCTYPE HTML>
<html>
<head> 
<meta charset="UTF-8">
<link href="../css/common.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/member.css" rel="stylesheet" type="text/css" media="all">
</head>

<body>
<div id="wrap">




  <div id="content">
	
	<div id="col2">
        <form  name="member_form" method="post" action="login.php"> 
		<div id="title">
			<img src="../img/title_login.gif">
		</div>


       
		<div id="login_form">
		     <img id="login_msg" src="../img/login_msg.gif">
			 <div class="clear"></div>

			 <div id="login1">
				<img src="../img/login_key.gif">
			 </div>
			 <div id="login2">
				<div id="id_input_button">
					<div id="id_pw_title">
						<ul>
						<li><img src="../img/id_title.gif"></li>
						<li><img src="../img/pw_title.gif"></li>
						</ul>
					</div>
					<div id="id_pw_input">
						<ul>
						<li><input type="text" name="id" class="login_input"></li>
						<li><input type="password" name="pass" class="login_input"></li>
						</ul>						
					</div>
					<div id="login_button">
						<input type="image" src="../img/login_button.gif">
					</div>
				</div>
				

				
				
			 </div>			 
		</div> <!-- end of form_login -->

	    </form>
	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
</div> <!-- end of wrap -->

</body>
</html>