<?php

namespace Veldman\Dashboard\Http\Controllers\Dashboard;

use Veldman\Dashboard\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $widgets = [];

        return view('admin::dashboard.index', compact('widgets'));
    }
}
