<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Auth;


use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function save()
    {
        $input = Input::all();

        $alteracao =  \App\User::find(Auth::id());
		$alteracao->endereco       = Input::get('endereco');
		$alteracao->save();

		return Redirect::back()->with('status', 'Endereço alterado: '.$alteracao->endereco);

    }
}
