@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- <div class="row">
            <div class="col">        sezione messaggio di errore
                <div class=" m-4">
                    @if (session('message'))
                        <div class=" alert alert{{ session('classMessage') }}">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>
            </div>
        </div> --}}
        <div class="row">
            <div class="col">
                <div class="card  rounded-4 p-5">
                    <div class="card-header d-flex rounded-4 bg-success text-light justify-content-between p-3">
                        <p>
                            Author : {{ $book->author }}
                        </p>
                        <p>
                            <a class="dropdown-item" href="{{ url('profile') }}"> {{ Auth::user()['name'] }}</a>
                        </p>
                    </div>
                    <div class="card-body  rounded-4 text-center">
                      <h5 class="card-title mt-4 mb-4">{{ $book->title }}</h5>
                        <div class="card-img mt-2 mb-2">
                             <img src="{{ $book->cover_image }}" class="img-fluid" alt="cover_book"> 
                        </div>
                        <p class="card-text p-3">{{ $book->description }}</p>
                        <div class="card-footer  rounded-4 p-3">
                            <span class="d-block">Data di pubblicazione : {{ $book->publication_date}} </span>
                            <span class="d-block">Prezzo: {{ $book->price }}&euro; </span>
                        </div>
                        {{-- <div class="col">
                            <div class="mt-3">     ------------ collegamento con bottoni per edit ,destroy ------------

                                <a class="btn btn-warning" href="{{ route('admin.books.edit', $book->id) }}"> Edit
                                    <i class="fa-solid fa-edit"></i> </a>
                                <form class="d-inline-block delete double-confirm"
                                    action="{{ route('admin.books.destroy', $book->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete <i class="fa-solid fa-trash"></i></button>
                                </form>
                            </div>
                        </div> --}}
                        {{-- <div class="row mt-5">
                          <div class="col-4">
                            @if (isset($previousBook->id))          --------- bottoni per per avanti e indietro-------------------
                                <a class="btn btn-outline-primary mt-3"
                                    href="{{ route('admin.books.show', $previousBook->id) }}">Previous Page</a>
                            @else
                                <a class="btn btn-outline-primary disabled mt-3" href="">End Previous Page</a>
                            @endif
                        </div>
                        <div class="col-4">
                            <a class="btn btn-success mt-3"
                                href="{{ route('admin.books.index', $book->id) }}">Return to Project Page</a>
                        </div>
                        <div class="col-4">
                            @if (isset($nextBook->id))
                                <a class="btn btn-outline-primary mt-3"
                                    href="{{ route('admin.books.show', $nextBook->id) }}">Next Page</a>
                            @else
                                <a class="btn btn-outline-primary disabled mt-3" href="">End Next Page</a>
                            @endif
                        </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- @section('script')   script èer la delete 
    @vite('resources/js/deleteButton.js')
@endsection --}}
