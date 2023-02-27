@extends('layouts.admin')
@section('title', 'Modifica libro')

@section('content')

    <div class="container my-4">
        <div class="row d-flex align-items-center justify-content-between">
            <div class="col-10">
                <h1 class="m-0">
                    Modifica il libro:
                </h1>
            </div>
        </div>
    </div>

    @include('admin.books.partials.create_edit_form',['route'=> 'admin.books.update','method'=>'PUT', 'book'=> $book ])

@endsection