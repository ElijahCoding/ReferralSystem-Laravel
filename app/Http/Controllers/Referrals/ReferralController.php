<?php

namespace App\Http\Controllers\Referrals;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReferralController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('referrals.index');
    }

    public function store(Request $request)
    {
        $request->user()->referrals()->create($request->only('email'));

        return back();
    }
}
