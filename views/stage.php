<h3><?= $user->name ?></h3>
<form action="/logout" method="GET">
	<button>로그아웃</button>
</form>

<canvas id="myGame" width="800" height="700"></canvas>
<button id="gamestart">게임시작</button>
<script>
    // window.addEventListener("load", ()=>{
    //     let app = new App();
    // })
    $("#gamestart").on("click", (e)=>{
    	let app = new App();
    	e.target.classList.add("dn");
    	$("#myGame").addClass("game-start");
    });
</script>