<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PublicationCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this datagather.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the datagather.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'       =>'required',
            'publication_category_id' =>'required',
            'photo_id'    =>'required',
            'body'        =>'required'
        ];
    }

//    public function doctor()
//    {
//        return DB::table('doctors')
//            ->join('users', 'doctors.user_id', '=', 'users.id')
//            ->select('doctors.user_id')
//            ->where('doctors.user_id', '=', Auth::id())
//            ->get();
//    }
}
