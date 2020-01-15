<?php

namespace Damin\Controller;

use Damin\DB;

class MainController extends MasterController {

	public function index()
	{
		$this->render("main", []);
	}
}