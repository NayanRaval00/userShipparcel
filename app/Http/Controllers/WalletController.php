<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWalletRequest;
use App\Models\Wallet;
use App\Models\WalletTransaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WalletController extends Controller
{
    /**
     * Show Wallet Form
     */
    public function show()
    {
        $transactions = WalletTransaction::where('user_id', Auth::id())->orderBy('issued_date', 'desc')->get();

        return view('users.wallet.show', compact('transactions'));
    }

    /**
     * Create Wallet Amount
     */

    public function store(CreateWalletRequest $request)
    {
        $userId = Auth::id();

        DB::transaction(function () use ($userId, $request) {
            // Create a transaction record
            WalletTransaction::create([
                'user_id' => $userId,
                'invoice_number' => 'INV-' . strtoupper(uniqid()),
                'name' => 'Wallet Top-Up',
                'issued_date' => now(),
                'amount' => $request->amount,
                'status' => 103
            ]);
        });

        return redirect()->back()->with('success', __('message.create_wallet'));
    }
}
