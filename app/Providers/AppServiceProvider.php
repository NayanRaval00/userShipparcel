<?php

namespace App\Providers;

use App\Models\Wallet;
use App\Models\WalletTransaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

        View::composer('*', function ($view) {
            $walletAmount = 0;

            if (Auth::check()) {

                // $walletTransactions = WalletTransaction::where([
                //     'user_id' => Auth::id(),
                //     'status' => 101
                // ])->get();

                // $walletTransactionsAmount = $walletTransactions->sum('amount');
                $wallet = Wallet::where('user_id', Auth::id())->first();
                // if ($wallet) {
                //     $wallet->update(
                //         [
                //             'amount' => $walletTransactionsAmount
                //         ]
                //     );
                // } else {
                //     Wallet::create([
                //         'amount' => $walletTransactionsAmount,
                //         'user_id' => Auth::id(),
                //         'status' => 1,
                //         'promo_code' => null
                //     ]);

                //     // update status after add amount or update amount
                //     foreach ($walletTransactions as $transaction) {
                //         $transaction->update(['status' => 103]);
                //     }
                // }

                $walletAmount = $wallet ? $wallet->amount : 0;
            }
            $view->with('walletAmount', $walletAmount);
        });
    }
}
