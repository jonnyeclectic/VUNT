<?php

class Home extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		echo "Here's some shit";
	}
	
	public function index(){
		echo "<br> INDEX";
	}
	
	public function help(){
		echo "<br> HELP button";
	}
}
