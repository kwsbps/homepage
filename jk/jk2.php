<DOCTYPE>
<html>
<meta charset="utf-8">
<title>테스트 화면</title>
<script src="../js/jquery-2.1.4.min.js"></script><!-- jQuery library -->
<script type="text/javascript">
var colors = ['red','blue','green'];
var numbers= [1, 2, 3, 4, 5, 4, 3, 2, 1];

var c = numbers.slice(0,3);
var d = numbers.splice(2,3);
var g = numbers.indexOf(4);


//클래스 및 인스턴스 생성
var user = {
	name : "test1",
	age : 10,
	showInfo : function () 
	{
		document.write("name = " + this.name + ", age = " + this.age);
	}
}

//메서드 접근
user.showInfo();

//탭메뉴 관련 변수
var tabMenu = null;
var menuItems = null;
var selectMenuItem = null;

$(document).ready(function () {
	
	init();

	initEvent();
});

function init() 
{
	tabMenu = $("#tabMenu1");
	menuItems = tabMenu.find('li');
}


function initEvent() 
{
	menuItems.on("click", function() {
		setSelectItem($(this));
	});
}

//menuItem에 해당하는 메뉴 아이템 선택하기
function setSelectItem(menuItem)
{//alert(menuItem.innerHTML);
	if(selectMenuItem)
	{
		selectMenuItem.removeClass("select");
	}
	selectMenuItem = menuItem;
	alert(selectMenuItem.index());
	alert(selectMenuItem.text());
	
	selectMenuItem.addClass("select");
	alert(selectMenuItem.hasClass("select"));
}


</script>
<body>

<p> 첫번째 행 메뉴 </p>
<ul class="tab-menu" id="tabMenu1">
	<li class="menuItem1">test1</li>
	<li class="menuItem1">test2</li>
	<li class="menuItem1">test3</li>
	<li class="menuItem1">test4</li>
	<li class="menuItem1">test5</li>
</ul>
</body>
</html>
