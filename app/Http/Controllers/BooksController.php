<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Session;
use Validator;

class BooksController extends Controller
{
    public function index()
    {
        if (Session::get('is_loggedin')) {
            $response = Http::withHeaders([
                'Authorization' => Session::get('token_key')
            ])->get('https://candidate-testing.api.royal-apps.io/api/v2/books');
            $jsonData = $response->json();

            // echo '<pre>';
            // print_r($jsonData['items']);
            // exit;
            $books = $jsonData['items'];
            return view('books/index', compact('books'));
        } else {
            return redirect()
                ->intended('/')
                ->withError('You are not loggedin');
        }
    }

    public function add()
    {
        $response = Http::withHeaders([
            'Authorization' => Session::get('token_key')
        ])->get('https://candidate-testing.api.royal-apps.io/api/v2/authors');
        $jsonData = $response->json();

        // echo '<pre>';
        // print_r($jsonData['items']);
        // exit;
        $authors = $jsonData['items'];
        return view('books/add', compact('authors'));
    }

    public function post(Request $request)
    {
        $data = json_encode([
            'author' => ['id' => (int) $request->author],
            'title' => $request->title,
            'release_date' => $request->release_date,
            'description' => $request->description,
            'isbn' => $request->isbn,
            'format' => $request->format,
            'number_of_pages' => (int) $request->number_of_pages,
        ]);
        $response = Http::withBody($data, 'application/json')
            ->withHeaders([
                'Authorization' => Session::get('token_key'),
            ])
            ->post('https://candidate-testing.api.royal-apps.io/api/v2/books');
        // $jsonData = $response->json();
        $jsonData = $response->json();

        return Redirect::route('books.index');
    }

    public function edit($id)
    {
        $response = Http::withHeaders([
            'Authorization' => Session::get('token_key')
        ])->get('https://candidate-testing.api.royal-apps.io/api/v2/authors');
        $jsonData = $response->json();
        $authors = $jsonData['items'];

        $response1 = Http::withHeaders([
            'Authorization' => Session::get('token_key')
        ])->get('https://candidate-testing.api.royal-apps.io/api/v2/books/' . $id);
        $jsonData1 = $response1->json();
        $book = $jsonData1;
        $book['release_date'] = date('Y-m-d', strtotime($jsonData1['release_date']));
        return view('books/edit', compact('authors', 'book'));
    }

    public function update(Request $request, $id)
    {
        $data = json_encode([
            'author' => ['id' => (int) $request->author],
            'title' => $request->title,
            'release_date' => $request->release_date,
            'description' => $request->description,
            'isbn' => $request->isbn,
            'format' => $request->format,
            'number_of_pages' => (int) $request->number_of_pages,
        ]);
        $response = Http::withBody($data, 'application/json')
            ->withHeaders([
                'Authorization' => Session::get('token_key'),
            ])
            ->put('https://candidate-testing.api.royal-apps.io/api/v2/books/' . $id);
        // $jsonData = $response->json();
        $jsonData = $response->json();

        return Redirect::route('books.index');
    }

    public function delete($id)
    {
        $response = Http::withHeaders([
            'Authorization' => Session::get('token_key'),
        ])
            ->delete('https://candidate-testing.api.royal-apps.io/api/v2/books/' . $id);
        // $jsonData = $response->json();
        $jsonData = $response->json();

        return Redirect::route('books.index');
    }
}
