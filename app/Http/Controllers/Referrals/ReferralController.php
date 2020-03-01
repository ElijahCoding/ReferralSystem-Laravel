<?php

namespace App\Http\Controllers\Referrals;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReferralController extends Controller
{
    public function index()
    {
        return view('referrals.index');
    }

    public function store(Request $request)
    {

    }
}
