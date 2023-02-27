<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('admin.books.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $book = new Book();
        return view('admin.books.create', compact('book'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $data = $request->validate([
            'title' => 'required|max:200',
            'author' => 'required|max:100',
            'description' => 'required',
            'genre' => 'required|max:255',
            'price' => 'required',
            'cover_image'=> 'required',
            'publication_date' => 'required'
        ],
        [
            'title.required' => 'Il campo "Titolo" non può essere lasciato vuoto',
            'title.max' => 'Il campo "Titolo" supera i 200 caratteri massimi',
            'author.required' => 'Il campo "Autore" non può essere lasciato vuoto',
            'author.max' => 'Il campo "Autore" supera i 100 caratteri massimi',
            'description.required' => 'Il campo "Descrizione" non può essere lasciato vuota',
            'genre.required' => 'Il campo "Genere" non può essere lasciato vuoto',
            'price.required' => 'Il campo "Prezzo" non può essere lasciato vuoto',
            'publication_date.required' => 'Il campo "Data" non può essere lasciato vuoto',
        ]);

        $data['cover_image'] = Storage::put('imgs/', $data['cover_image']);

        $newBook = new Book();
        $newBook->fill($data);
        $newBook->save();

        return redirect()->route('admin.books.show',$newBook->id );

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $previousBook = Book::where('id', '<', $book->id)->orderBy('id', 'DESC')->first();
        $nextBook = Book::where('id', '>', $book->id)->first();
        return view('admin.books.show', compact('book','nextBook','previousBook' ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('admin.books.edit', [ 'book' => $book ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $data = $request->validate([
            'title' => 'required|max:200',
            'author' => 'required|max:100',
            'description' => 'required',
            'genre' => 'required|max:255',
            'price' => 'required',
            'cover_image' => 'required|image',
            'publication_date' => 'required'
        ],
        [
            'title.required' => 'Il campo "Titolo" non può essere lasciato vuoto',
            'title.max' => 'Il campo "Titolo" supera i 200 caratteri massimi',
            'author.required' => 'Il campo "Autore" non può essere lasciato vuoto',
            'author.max' => 'Il campo "Autore" supera i 100 caratteri massimi',
            'description.required' => 'Il campo "Descrizione" non può essere lasciato vuota',
            'genre.required' => 'Il campo "Genere" non può essere lasciato vuoto',
            'price.required' => 'Il campo "Prezzo" non può essere lasciato vuoto',
            'cover_image.required' => 'campo obbligatorio',
            'publication_date.required' => 'Il campo "Data" non può essere lasciato vuoto',
        ]);
        
        if ($request->hasFile('cover_image')) {
            
            if (!$book->isImageAUrl()) {
                Storage::delete($book->cover_image);
            }
        }
        $data['cover_image'] = Storage::put('imgs', $data['cover_image']);
        $book->update($data);
        return redirect()->route('admin.books.index', compact('book'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('admin.books.index')->with('message', 'The post has been removed correctly')->with('message_class','danger');
    }
}
