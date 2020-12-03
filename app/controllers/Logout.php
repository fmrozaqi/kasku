<?php

/**
 * 
 */
class Logout extends Controller
{
	
	public function index()
	{
		if ($this->model('Murid')->logout()) {
			header('Location:' .BASEURL. '');
		}
	}
}