<?php

namespace App\Http\Controllers\Referrals;

use App\Http\Controllers\Controller;
use App\Mail\Referrals\ReferralReceived;
use App\Referral;
use App\Rules\NotReferringExisting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReferralController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $referrals = request()->user()->referrals()->orderBy('completed', 'asc')->get();

        return view('referrals.index', compact('referrals'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => [
                'required',
                'email',
                new NotReferringExisting()
            ]
        ]);

        $referral = $request->user()->referrals()->create($request->only('email'));

        Mail::to($referral->email)->send(
            new ReferralReceived($request->user(), $referral)
        );

        return back();
    }
}
