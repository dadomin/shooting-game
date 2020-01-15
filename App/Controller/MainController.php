<?php

namespace Damin\Controller;

use Damin\DB;

class MainController extends MasterController {

	public function index()
	{
		$sql = "SELECT COUNT(*) AS cnt FROM `game_user`";
		$cnt = DB::fetch($sql)->cnt;
		if($cnt == 0){
			$this->setData();
		}

		if (isset($_SESSION['user'])) {
			DB::msgAndBack("로그아웃을 하고 다시 로그인 해주세요.");
			exit;
		}

		$r = 0;
		if(isset($_GET['r'])){
			$r = $_GET['r'];
		}

		$this->render("main", ["r" => $r]);
	}

	private function setData()
	{
		$sql = "INSERT INTO `game_user` (`id`,`name`,`pass`) VALUES (?, ?, PASSWORD(?))";
		$id = "admin";
		$name = "관리자";
		$pass = "1234";
		DB::query($sql, [$id, $name, $pass]);
	}

	public function login() {
		$id = $_POST['id'];
		$pass = $_POST['pass'];
		$sql = "SELECT * FROM `game_user` WHERE `id` = ? AND `pass` = PASSWORD(?)";
		$user = DB::fetch($sql, [$id, $pass]);

		if(!$user){
			DB::msgAndBack("아이디나 비밀번호가 잘못되었습니다.");
			exit;
		}


		$_SESSION['user'] = $user;
		DB::msgAndGo("로그인되었습니다.", "/stage");
	}

	public function logout()
	{
		unset($_SESSION['user']);
		DB::msgAndGo("로그아웃되었습니다.", "/");
	}

	public function register()
	{	
		if(isset($_SESSION['user'])){
			DB::msgAndBack("로그아웃 후에 회원가입을 진행해주세요.");
			exit;
		}

		$name = trim($_POST['name']);
		$id = trim($_POST['id']);
		$pass = trim($_POST['pass']);
		$cpass = trim($_POST['cpass']);

		$preg = '/^[a-zA-Z0-9!@#$%^&*()ㄱ-ㅎㅏ-ㅣ가-힣]+$/';
		$pname = preg_match($preg, $name);
		$pid = preg_match($preg, $id);
		$ppass = preg_match($preg, $pass);

		if($name == "" || $id == "" || $pass == "" || $cpass == ""){
			DB::msgAndBack("필수 입력 사항이 비워져있습니다. \\n회원가입란은 모두 필수 입력사항입니다.");
			exit;
		}

		if($pass != $cpass) {
			DB::msgAndBack("비밀번호와 비밀번호 확인란의 값이 일치하지 않습니다.");
			exit;
		}

		if($pname == 0 || $pid == 0 || $ppass == 0) {
			DB::msgAndBack("필수항목은 알파벳, 한글, 숫자, 띄어쓰기, 특수문자(키보드 1부터 0까지)만을 포함해야합니다.");
			exit;
		}

		$idsql = "SELECT * FROM `game_user` WHERE `id` = ?";
		$sameid = DB::fetch($idsql, [$id]);

		$namesql = "SELECT * FROM `game_user` WHERE `name` = ?";
		$samename = DB::fetch($namesql, [$name]);

		if($sameid){
			DB::msgAndBack("동일한 아이디가 이미 존재 합니다.");
			exit;
		}

		if($samename){
			DB::msgAndBack("동일한 이름이 이미 존재합니다.");
			exit;
		}

		$sql = "INSERT INTO `game_user` (`id`,`name`,`pass`) VALUES (?, ?, PASSWORD(?))";
		$cnt = DB::query($sql, [$id, $name, $pass]);
		if($cnt){
			DB::msgAndGo("회원가입이 성공적으로 이루어졌습니다.\\n로그인 해주시기 바랍니다.", "/");
			exit;
		}else {
			DB::msgAndBack("회원가입에 실패하였습니다.");
			exit;
		}
	}
}