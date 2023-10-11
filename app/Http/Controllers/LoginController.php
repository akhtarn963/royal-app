<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Session;
use Validator;

class LoginController extends Controller
{
    public function index()
    {
        if (Session::get('is_loggedin')) {
            return redirect()
                ->intended('/')
                ->withSuccess('You are already loggedin');
        } else {
            return view('login');
        }
    }

    public function postLogin(Request $request)
    {
        // 'email' => 'ahsoka.tano@royal-apps.io',
        //     'password' => 'Kryze4President',
        // $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        $response = Http::post('https://candidate-testing.api.royal-apps.io/api/v2/token', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        // $jsonData = $response->json();
        $jsonData = $response->json();

        // echo '<pre>';
        // print_r($jsonData['token_key']);
        if ($jsonData['token_key']) {
            session()->put('is_loggedin', true);
            session()->put('token_key', $jsonData['token_key']);
            session()->put('user_name', $jsonData['user']['first_name'] . ' ' . $jsonData['user']['last_name']);
            return redirect()
                ->intended('/')
                ->withSuccess('You have Successfully loggedin');
        }
        return redirect('login')->withSuccess('Oppes! You have entered invalid credentials');
    }

    public function logout()
    {
        Session::flush();
        return Redirect('login');
    }
}