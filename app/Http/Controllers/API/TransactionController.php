<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Resources\TransactionResource;
use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index ()
    {
        $transactions = Transaction::whereHas('sender', function ($query) {
            $query->where('user_id', Auth::id());
        })->orWhereHas('receiver', function ($query) {
            $query->where('user_id', Auth::id());
        })->get();

        return TransactionResource::collection($transactions);
    }

    /**
     * @param StoreTransactionRequest $request
     * @return TransactionResource|\Illuminate\Http\JsonResponse
     */
    public function store(StoreTransactionRequest $request)
    {
        $amount = $request->input('amount');

        $sender_account = Account::where('user_id', Auth::id())
            ->where('number', $request->input('sender_number'))
            ->where('current_balance', '>=', $amount)
            ->firstOrFail();

        $receiver_account = Account::where('number', $request->input('receiver_number'))
            ->firstOrFail();

        try {
            DB::beginTransaction();

            $transaction = Transaction::create([
                'sender_id' => $sender_account->id,
                'receiver_id' => $receiver_account->id,
                'user_id' => Auth::id(),
                'type' => 'transfer',
                'amount' => $amount,
                'title' => $request->input('title')
            ]);

            // ToDo: store this transaction to favorite accounts

            $receiver_account->current_balance = $receiver_account->current_balance + $amount;
            $receiver_account->save();

            $sender_account->current_balance = $sender_account->current_balance - $amount;
            $sender_account->save();

            DB::commit();

            return new TransactionResource($transaction);
        } catch (\Exception $e) {
            \Log::error('TransactionController::store '.$e->getMessage());

            DB::rollBack();

            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
}
