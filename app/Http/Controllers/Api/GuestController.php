<?php

namespace App\Http\Controllers\Api;

use App\Models\Guest;
use App\Mail\MailToAdmin;
use App\Mail\MailToGuest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class GuestController extends Controller
{
    private $validations = [
        'email'                  => 'required|email|max:255',
        'name'                 => 'required|string|max:50|min:5' ,
        'surname'                 => 'required|string|max:50',
        'message'          => 'nullable|string|max:200',
    ];

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request ->all();

        $validator = Validator::make($data, $this->validations);

        if($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ]);
        };

        $newGuest = new Guest();
        $newGuest->email = $data['email'];
        $newGuest->name = $data['name'];
        $newGuest->surname = $data['surname'];
        $newGuest->message = $data['message'];

        $newGuest->save();

        return response()->json([
            'success' => true,

        ]);
    //    return response()->json($request->all());
    }
}
