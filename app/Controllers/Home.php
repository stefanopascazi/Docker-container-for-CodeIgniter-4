<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data['title'] = "codeigniter";
		$page = "home";
		if( ! is_file(APPPATH . "Views/" .$page . ".php" ) )
		{
			throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
		}
		return view($page, $data);
	}
	//--------------------------------------------------------------------

}
