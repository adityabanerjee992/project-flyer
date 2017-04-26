<?php

namespace App\Http\Requests;

use Auth;
use App\Http\Requests\Request;
use App\Flyer;

class CheckFlyerRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Flyer::where([
            'street' => $this->street, 
            'zip' => $this->zip, 
            'user_id' => Auth::user()->id
        ])->exists();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'file' => 'required|mimes:jpg,jpeg,png,bmp'
        ];
    }
}
