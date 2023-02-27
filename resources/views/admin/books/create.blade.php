@extends('layouts.admin')
@section('title', 'Crea nuovo libro')
@section('content')

<div class="container">
    <div class="d-flex">
              <div class="py-4 d-flex justify-content-between">
                   <h3>Aggiungi un nuovo libro</h3>
              </div>
                
            </div>
    @include('admin.books.partials.create_edit_form',['route'=> 'admin.books.store','method'=>'POST', 'book'=> $book ])
</div>

@endsection