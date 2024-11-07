<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function customerHome()
    {
        return view('customer.home');
    }

    public function showPage404()
    {
        return view('404');
    }

    public function showPage404Admin()
    {
        return view('admin.404_admin');
    }
}
?>
