<?php namespace Config;

use CodeIgniter\Config\BaseConfig;

class Filters extends BaseConfig
{
	// Makes reading things below nicer,
	// and simpler to change out script that's used.
	public $aliases = [
		'csrf'     => \CodeIgniter\Filters\CSRF::class,
		'toolbar'  => \CodeIgniter\Filters\DebugToolbar::class,
		'honeypot' => \CodeIgniter\Filters\Honeypot::class,
		'auth'     => \App\Filters\Auth::class,
		'admin'    => \App\Filters\Admin::class,
		'logout'   => \App\Filters\Logout::class,
		"accessform" => \App\Filters\Api\V1\Post\GetForm::class,
		"datasend" => \App\Filters\Api\V1\Post\Send::class,
	];

	// Always applied before every request
	public $globals = [
		'before' => [
			//'honeypot'
			// 'csrf',
		],
		'after'  => [
			'toolbar',
			//'honeypot'
		],
	];

	// Works on all of a particular HTTP method
	// (GET, POST, etc) as BEFORE filters only
	//     like: 'post' => ['CSRF', 'throttle'],
	public $methods = [];

	// List filter aliases and any before/after uri patterns
	// that they should run on, like:
	//    'isLoggedIn' => ['before' => ['account/*', 'profiles/*']],
	public $filters = [
		"auth" => [
			"before" => [
				"admin/*"
			]
		],
		"admin" => [
			"before" => [
				"/"
			]
		],
		"logout" => [
			"before" => [
				"/logout"
			]
		],
		"accessform" => [
			"before" => [
				"/get/form"
			]
		],
		"datasend" => [
			"before" => [
				"api/v1/post/send"
			]
		]
	];
}
