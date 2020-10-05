<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class AdminController
 * @package App\Http\Controllers
 */
class AdminController extends Controller
{
    /**
     * AdminController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function index()
    {
        if (request()->user()->hasRole('admin')) {
            return view('admin.dashboard');
        }

        if (request()->user()->hasRole('user')) {
            return redirect('/home');
        }
    }
}
