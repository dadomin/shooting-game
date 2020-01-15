<section id="main">
	<form action="" id="login">
		<h3>ACCOUNT LOGIN</h3>
		<p>USERID</p>
		<input type="text">
		<p>PASSWORD</p>
		<input type="text">
		<a href="/">Don't have an id?<span><i class="far fa-hand-point-right"></i></span></a>
		<button id="login-btn" type="submit">LOG IN</button>
		
		
	</form>
	<div id="register">
		<span id="register-click"><i class="fas fa-grip-lines-vertical"></i></span>
	</div>

	<span id="register-close"><i class="fas fa-times-circle"></i></span>
</section>

<script>

	$("#register").on("click", (e)=>{
		$(e.target).css({"right":"-10%","cursor" : "default"});
		$("#register-click").css({"opacity":0});
		$("#register-close").css({"right" : "40px", "transition" : ".6s"});
	});
	$("#register-close").on("click",(e)=>{
		$("#register-close").css({"right" : "-100%", "transition" : ".6s"});
		$("#register").css({"right" : "-95%", "cursor" : "pointer", "transition" : ".6s"});
		$("#register-click").css({"opacity" : 1, "transition" : ".6s"});
	});
</script>