<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // ToDo: check that sender_id belongs to one of the accounts of the current user
        return [
            'sender_number' => 'required|exists:accounts,number',
            'receiver_number' => 'required|exists:accounts,number',
            'amount' => 'required|numeric|min:0|not_in:0', // ToDo: validate the current_balance of the sender account
            'title' => 'required|string|min:5|max:128',
            'favourite' => 'nullable|boolean'
        ];
    }
}
