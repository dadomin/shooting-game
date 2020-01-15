<section id="main">
	<form action="/login" method="POST" id="login">
		<h3>ACCOUNT LOGIN</h3>
		<p>USERID</p>
		<input type="text" name="id">
		<p>PASSWORD</p>
		<input type="password" name="pass">
		<a id="goregi" href="/">Don't have an id?<span><i class="far fa-hand-point-right"></i></span></a>
		<button id="login-btn" type="submit">LOG IN</button>
	</form>
	<form id="register" action="/register" method="POST">
		<i class="fas fa-grip-lines-vertical" id="register-click"></i>
		<h3>REGISTER ACCOUNT</h3>
		<p>USERNAME</p>
		<input type="text" name="name">
		<p>USERID</p>
		<input type="text" name="id">
		<p>PASSWORD</p>
		<input type="password" name="pass">
		<p>COMFIRM PASSWORD</p>
		<input type="password" name="cpass">
		<button type="submit">REGISTER</button>
	</form>

	<span class="dn ris"><?= $r ?></span>

	<span id="register-close"><i class="fas fa-times-circle"></i></span>
</section>

<!-- js코드 -->
<script>
	
	// 회원가입페이지 열릴 때
	$("#register").on("click", (e)=>{
		if($("#register").hasClass("register-on") == false){
			$("#register").addClass("register-on");
			$("#register-click").addClass("register-click-on");
			$("#register-close").addClass("register-close-on");
		}
	});

	// 회원가입페이지 닫힐 때 
	$("#register-close").on("click",(e)=>{
		$("#register").removeClass("register-on");
		$("#register-click").removeClass("register-click-on");
		$("#register-close").removeClass("register-close-on");
	});

	// 강제로 회원가입페이지로 넘어온 경우
	if($(".ris").text() == 1){
		$("#register").trigger("click");
	};
	$("#goregi").on("click", (e)=>{
		e.preventDefault();
		$("#register").trigger("click");	
	});
</script>