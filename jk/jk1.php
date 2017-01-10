<html>
<head>
<meta charset="utf-8">
	<title>제이쿼리 테스트</title>
	<script src="/js/include.js"></script><!-- custom js functions -->
	<script src="/js/jquery-2.1.4.min.js"></script><!-- jQuery library -->
	<script>
		$(document).ready( function () 
		{	//alert($('#root').children().html());
			
			var nodes = $('#root').children();

		  alert('number of nodes is ' + nodes.length);
		  var txt = "";
		  $('#root').children().each( function ()
			{
				txt += $(this).text();
			//	alert($(this).text());
				txt += ' ';	
			});
			//alert(txt);

			//alert($('p').text());
			//alert($('p').children().text());
			//alert($('span').parent().text());
			//alert()
			$('#dd').prepend('<h2>power of state</h2>');
			//$('h2').clone().prependTo('span');
			var members = ["Kim","Jung","Yoond","Tae"];
			//$('p').html(members.join("<br/>"));
			var div_list = $('div#root_div');
			//$.each(members, function(index, value) {
			//	div_list.append("<li>" + value + "</li>");
			//});
			var names = $("li").get();
			$('div#root_div_1').text("the length of li "+names.length);
			members = $.grep(members, function(n, i) { return n.length > 4;  });
			$('div#root_div_2').html(members.join("<br/>"));
			$('.bold').bind('click', function () {
				alert('you have clicked bold');
			});
			$('.italic').bind('click', function () {
				alert('you have clicked italic');
			});
			$('.buttons').bind('click', function() {
				alert('you have clikced the ' +$(this).text()+' buttons');
				$('.buttons').unbind('click');
			});
			$('.buttons').click(function (e) {
				var target = $(e.target);
				if(target.is('.bold')) {
					alert('you have clicked the bold buttons!!');
				}
				if(target.is('.italic')) {
					alert('you have clicked the italic buttons!!');
				}
			});
			$('.bold').click(function () {
				alert('you have double-clicked ');
			});
			$('#test1').bind('mousedown', function() {
				alert('mouse down');
				
			});
			$('#test1').bind('mouseup', function() {
				alert('mouse up');
				
			});
			$('body').mouseover(function (e) {
				$('#test2').text(e.screenX + ' ' + e.screenY);
			});

			$('#test3').css('opacity', 0.4);

			$('#test3').bind('mouseover', function () {
				$('#test3').css('opacity', 1.0);
			});
			$('#test3').bind('mouseout', function () {
				$('#test3').css('opacity', 0.3);
			});
			//$('#test3').bind('mousedown', function () {
			//	$('#test3').css('fontSize', function () {  return $(this).opacity()-0.1;  });
			//});
			//$('.message').hide('slow');
			//$('.readmore').show();
			$('#readmore').click(function () {
				$('.message').toggle();
				//$('.message').toggleClass("message1");
			});
			$( "button" ).click(function() {

			$( ".pp" ).toggle();
			$('.message').toggle();
			});
			
			$('#message2').css({'border':'2px solid','text-align':'center','font-weight':'bold'}).hide();
			$('#message3').css({'border':'2px solid','text-align':'center','font-weight':'bold'}).click(function () 
			{
				$(this).slideUp('slow');
				$('#message2').slideDown('slow');
			});
			
			$('#img_1').click(function () 
			{	
				
				$(this).animate({left:800, width:$(this).width()*2, height:$(this).height()*2}, 3200
				//$(this).slideUp('slow');
				
					, function () {
					$(this).fadeTo('slow',0)
					$(this).fadeTo('slow',1)
					$(this).animate({left:0, width:$(this).width()*0.5, height:$(this).height()*0.5},3200)
					
				});
				
			});
			var aa ="";
			$('.infobox').keypress(function (e) 
			{	aa += String.fromCharCode(e.keyCode);
				$('#keylogger').text('what you just pressed is ' + aa);	
			});
		
		$('#main_bar_1 .mainmenu ul').hide();
		$('#main_bar_1 .mainmenu ul li ul').hide();
		$('#main_bar_1 .mainmenu').hover(function () {
			$('#main_bar_1 ul.dropdown ul li > a').addClass("hover");
			$('> ul', this).show();
			
			//$(this).find('> ul').show();
		}, function () {
			$(this).removeClass("hover");
		//	$('ul', this).hide();
			$(this).find('ul').hide();
			});

		$("#main_bar_1 .mainmenu ul li:has(ul)").find('a:first').append(" >");
		$("#main_bar_1 .mainmenu ul li:has(ul)").hover(function () {
			$(this).find('> ul').show();
			}, function () {
				$(this).find('> ul').hide();
				
			});
		});
	</script>
</head>
<style>
#test3{width:300px;height:300px;font-size:20px;}
.message1::before {background:pink;content:"aaaa";}
#img_1{position:relative;}
/*ul {width:200px;}
ul li ul{list-style-type:none; margin:5px; width:200px;}
li {display:inline;}
.hover {background:#000;}
a {display:block;border-bottom:1px solid #fff;text-decoration:none;background:#00f;color:#fff;padding:0.5em;}*/
body {height:5000px;}
#main_bar_1 {position:absolute;top:0;left:0;}
#main_bar_1 .mainmenu {float:left;width:200px;list-style-type:none;margin-right:20px;}
#main_bar_1 a {width:200px; display:block; text-decoration:none;background:#00f;color:#fff;padding:0.5em;border-bottom:1px solid #fff;}
#main_bar_1 li.mainmenu ul {margin:0px;list-style-type:none;padding:0;position:absolute;}
/*#main_bar_1 ul.dropdown ul li > a:hover {background:red;}
#main_bar_1 ul.dropdown li.mainmenu > a:hover {background:gray;}*/
#main_bar_1 ul.dropdown ul ul {left:100%;top:0;}
.hover {background:red;color:red;position:relative;}
#main_bar_1:after {content:""; display:block; clear:both;}


</style>
<body>
	<div id="main_bar_1">
		
		<ul class="dropdown">
			<li class="mainmenu"><a href="http://example.com">books11</a>
				<ul>
					<li><a href="http://example.com">aa</a>
						<ul>
							<li><a class="hover" href="http://example.com">aa-1</a></li>
							<li><a href="http://example.com">aa-2</a></li>
						</ul>
					</li>
					<li><a href="http://example.com">bb</a></li>
					<li><a href="http://example.com">cc</a></li>
					<li><a href="http://example.com">dd</a></li>
				</ul>
			</li>
		</ul>
		<ul class="dropdown">
			<li class="mainmenu"><a href="http://example.com">books22</a>
				<ul>
					<li><a  href="http://example.com">gg</a></li>
					<li><a  href="http://example.com">hh</a></li>
				</ul>
			</li>
		</ul>
	</div>

<span>ddddddddd</span>
<div id="main_bar_2">
	<ul class="dropdown">
		<li class="mainmenu"><a href="http://example.com">books11</a>
			<ul>
				<li><a href="http://example.com">aa</a>
					<ul>
						<li><a href="http://example.com">aa-1</a></li>
						<li><a href="http://example.com">aa-2</a></li>
					</ul>
				</li>
				<li><a href="http://example.com">bb</a></li>
				<li><a href="http://example.com">cc</a></li>
				<li><a href="http://example.com">dd</a></li>
			</ul>
		</li>
	</ul>
	<ul class="dropdown">
		<li class="mainmenu"><a href="http://example.com">books22</a>
			<ul>
				<li><a  href="http://example.com">gg</a></li>
				<li><a  href="http://example.com">hh</a></li>
			</ul>
		</li>
	</ul>
</div>
</body>
</html>




<!--
	<div id="root">
		<div>Darjeeling</div>
		<div>Assam</div>
		<div>Kelana</div>
		<p id="dd">aaaaaaaaa<span>bbbbbbbbbbb</span>ccccccc<a>ddddd</a>eeeee</p>
		<div id="root_div"></div>
		<div>
			<li>kims</li>
			<li>jungs</li>
		</div>

		<div id="root_div_1">
		</div>
		<div id="root_div_2">
		</div>
		<span class="bold buttons">Bold</span>
		<span class="italic buttons">italic</span>
		<div id="test1">test1</div>
		<div id="test2"></div>
		<div id="test3">5555555555555</div>
		<span class="pp">read more....</span>
		<span class="pp" style="display:none;">read less....</span>
		<div class="message">test test test test test test test test test </div>
		<button>Toggle</button>
		<p id="message2">
		jquery mastering
		</p>
		<p id="message3">
		that's not a problem
		</p>

		<img id="img_1" src="../img/btn1.png">imagine it's image</span>
		<input class="infobox" type="text" style="display:block;">
		<p id="keylogger"></p>
	</div>
	-->