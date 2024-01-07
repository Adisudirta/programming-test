<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function listBook()
    {
        $books = Book::all()->sortByDesc('avg_ratings')->take(100);

        $data = [];
        foreach ($books as $book) {
            $data[] = [
                'title' => $book->title,
                'category' => $book->category->name,
                'author' => $book->author->name,
                'average_rating' => $book->avg_ratings,
                'voters' => $book->voters,
            ];
        }

        return view('books', ['data' => $data]);
    }

    public function filter(Request $request)
    {
        if ($request->search) {
            $books = Book::all()->sortByDesc('avg_ratings')->where('title', $request->search)->take((int) $request->shown);
        } else {
            $books = Book::all()->sortByDesc('avg_ratings')->take((int) $request->shown);
        }


        $data = [];
        foreach ($books as $book) {
            $data[] = [
                'title' => $book->title,
                'category' => $book->category->name,
                'author' => $book->author->name,
                'average_rating' => $book->avg_ratings,
                'voters' => $book->voters,
            ];
        }

        return view('books', ['data' => $data]);
    }

    public function topAuthor()
    {
        $books = Book::all()->sortByDesc('voters')->take(10);

        $data = [];
        foreach ($books as $book) {
            $data[] = [
                'author' => $book->author->name,
                'voters' => $book->voters,
            ];
        }

        return view('top', ['data' => $data]);
    }
}
