<?php

namespace App\Http\Controllers\DepanController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function index()
  {
    return view('content.pages.dashboard-karyawan');
  }
}
