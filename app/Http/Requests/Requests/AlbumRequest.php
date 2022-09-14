<?php

namespace App\Http\Requests\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlbumRequest extends FormRequest
{
    public function messages()
    {
            return [
             'album_name.required'=>'name is required',
             'album_name.unique'=>'name already exists',
             'photos.required'=>'photos is required',
            ];
    }
    public function rules()
    {
        return [
            'album_name'=>'required|max:100|unique:albums,album_name',
            // 'photos' => 'required|mimes:png,jpg,jpeg',
           ];
}
}
