<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function orders()
    {
        return view('admin.orders');
    }

    public function foods()
    {
        return view('admin.foods');
    }

    public function sales()
    {
        return view('admin.sales');
    }

    public function users()
    {
        return view('admin.users');
    }

    public function modals()
    {
        return view('admin.modals');
    }

    public function tables()
    {
        return view('admin.tables');
    }
}
