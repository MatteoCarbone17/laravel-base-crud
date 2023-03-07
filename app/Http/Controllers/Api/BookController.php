<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index(){
        $books=Book::paginate(25);   //use ::paginate('n') to paginate
        return response()->json([
            'success'=> true,
            'results'=> $books,
        ]);
    }

    public function show(Book $book){
         $book=Book::findOrFail($book->id);  //use ::paginate('n') to paginate
         return response()->json([
             'success'=> true,
             'results'=> $book,
         ]);
     }
}
