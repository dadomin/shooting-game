<?php

namespace Damin\Controller;

use Damin\DB;

class StageController extends MasterController {

	public function index()
	{	
		$user = isset($_SESSION['user']) ? $_SESSION['user'] : null;

		if($user == null){
			DB::msgAndGo("로그인 후 이용해주시기 바랍니다.", "/&r=1");
			exit;
		}

		$this->render("stage", ["user" => $user]);
	}
}