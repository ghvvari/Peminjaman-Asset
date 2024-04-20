<?php

namespace App\Http\Controllers\DepanController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PeminjamanAssetController extends Controller
{
  public function index()
  {
    return view('content.pages.peminjaman-asset');
  }
}
