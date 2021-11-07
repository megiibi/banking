<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAccountRequest;
use App\Http\Resources\AccountResource;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class AccountController extends Controller
{
    public function index()
    {
        $accounts = Account::where('user_id', Auth::id())->get();

        return AccountResource::collection($accounts);
    }

    public function store(StoreAccountRequest $request)
    {
        try {
            $account = Account::create([
                'name' => $request->input('name'),
                'number' => rand(100000000000, 999999999999), //ToDo: validate the uniqueness
                'iban' => Str::random(36), //ToDo: validate the uniqueness
                'user_id' => Auth::id(),
                'current_balance' => 0
            ]);

            return new AccountResource($account);

        } catch (\Exception $e) {
            \Log::error('TransactionController::store '.$e->getMessage());

            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
}
