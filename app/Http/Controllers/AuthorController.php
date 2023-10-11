<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Session;
use Validator;

class AuthorController extends Controller
{
    public function index()
    {
        if (Session::get('is_loggedin')) {
            $response = Http::withHeaders([
                'Authorization' => Session::get('token_key')
            ])->get('https://candidate-testing.api.royal-apps.io/api/v2/authors');
            $jsonData = $response->json();

            // echo '<pre>';
            // print_r($jsonData['items']);
            // exit;
            $authors = $jsonData['items'];
            return view('authors/index', compact('authors'));
        } else {
            return redirect()
                ->intended('/')
                ->withError('You are not loggedin');
        }
    }

    public function add()
    {
        return view('authors/add');
    }

    public function post(Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => Session::get('token_key')
        ])->post('https://candidate-testing.api.royal-apps.io/api/v2/authors', [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'birthday' => $request->birthday,
            'biography' => $request->biography,
            'gender' => $request->gender,
            'place_of_birth' => $request->place_of_birth,
        ]);
        // $jsonData = $response->json();
        $jsonData = $response->json();
        // echo '<pre>';
        // print_r($jsonData);
        // exit;
        return Redirect::route('authors.index');
    }

    public function edit($id)
    {
        if (Session::get('is_loggedin')) {
            $response = Http::withHeaders([
                'Authorization' => Session::get('token_key')
            ])->get('https://candidate-testing.api.royal-apps.io/api/v2/authors/' . $id);
            $jsonData = $response->json();

            // echo '<pre>';
            // print_r($jsonData['items']);
            // exit;
            $author = $jsonData;
            $author['birthday'] = date('Y-m-d', strtotime($jsonData['birthday']));
            return view('authors/edit', compact('author'));
        } else {
            return redirect()
                ->intended('/')
                ->withError('You are not loggedin');
        }
    }

    public function update(Request $request, $id)
    {
        $response = Http::withHeaders([
            'Authorization' => Session::get('token_key')
        ])->put('https://candidate-testing.api.royal-apps.io/api/v2/authors/' . $id, [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'birthday' => $request->birthday,
            'biography' => $request->biography,
            'gender' => $request->gender,
            'place_of_birth' => $request->place_of_birth,
        ]);
        // $jsonData = $response->json();
        $jsonData = $response->json();
        // echo '<pre>';
        // print_r($jsonData);
        // exit;
        return Redirect::route('authors.index');
    }

    public function delete($id)
    {
        $response = Http::withHeaders([
            'Authorization' => Session::get('token_key')
        ])->delete('https://candidate-testing.api.royal-apps.io/api/v2/authors/' . $id);
        // $jsonData = $response->json();
        $jsonData = $response->json();
        // echo '<pre>';
        // print_r($jsonData);
        // exit;
        return Redirect::route('authors.index');
    }

    public function view($id)
    {
        if (Session::get('is_loggedin')) {
            $response = Http::withHeaders([
                'Authorization' => Session::get('token_key')
            ])->get('https://candidate-testing.api.royal-apps.io/api/v2/authors/' . $id);
            $jsonData = $response->json();

            // echo '<pre>';
            // print_r($jsonData['items']);
            // exit;
            $author = $jsonData;
            $author['birthday'] = date('m-d-Y', strtotime($jsonData['birthday']));
            return view('authors/view', compact('author'));
        } else {
            return redirect()
                ->intended('/')
                ->withError('You are not loggedin');
        }
    }

    public function delete_book($author_id, $id)
    {
        $response = Http::withHeaders([
            'Authorization' => Session::get('token_key'),
        ])
            ->delete('https://candidate-testing.api.royal-apps.io/api/v2/books/' . $id);
        // $jsonData = $response->json();
        $jsonData = $response->json();

        return Redirect::route('author.view', $author_id);
    }
}
