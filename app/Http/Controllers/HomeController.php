<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     */
    public function index(Request $request)
    {
        if ($request->user()->hasRole('user')) {
            return redirect('/');
        }

        if ($request->user()->hasRole('admin')){
            return redirect('/admin/dashboard');
        }
    }
}
