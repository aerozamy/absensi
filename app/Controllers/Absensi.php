<?php

namespace App\Controllers;

class Absensi extends BaseController
{
	public function index()
	{
		return view('contents/dashboard');
	}

	public function harian()
	{
		return view('contents/absensi');
	}

	public function rekap()
	{
		return view('contents/rekap');
	}

	//--------------------------------------------------------------------

}
