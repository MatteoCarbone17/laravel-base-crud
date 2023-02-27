 @extends('layouts.admin')
 @section('title', 'Elenco - Libri')
 @section('content')
     {{-- @include('admin.books.partials.popup') --}}
     <div class="container">


         <div class="d-flex">
             <div class="py-4 d-flex justify-content-between flex-grow-1">
                 <h3>Elenco Libri</h3>
             </div>
             <div class="py-4 d-flex">
                 <a class="btn btn-secondary btn-sm p-2 g-2 bs-info-text" href="{{ route('dashboard') }}">Dashboard</a>
                 {{-- <a class="btn btn-danger btn-sm p-2 ms-2" href="{{ route ("admin.books.trashed")}}"><i class="fa-solid fa-trash p-1"></i>Cestino</a> --}}
                 <a class="btn btn-success btn-sm ms-2" href="{{ route('admin.books.create') }}"><i
                         class="fa-solid fa-plus text-white p-2"></i>Aggiungi nuovo</a>
             </div>

         </div>

         {{-- @if (session('alert-message'))
              <div id="popup_message" class="d-none" data-type="{{ session('alert-type') }}" data-message="{{ session('alert-message') }}"></div>
            @endif --}}



         <table class="table table-striped table-hover">
             <thead>
                 <tr>
                     <th scope="col">ID</th>
                     <th scope="col">Titolo</th>
                     <th scope="col" class="d-none d-md-table-cell">Descrizione</th>
                     <th scope="col" class="d-none d-md-table-cell">Genere</th>
                     <th scope="col" class="d-none d-md-table-cell">Prezzo</th>
                     <th scope="col" class="d-none d-md-table-cell">Anno di pubblicazione </th>
                     {{-- <th scope="col" class="d-none d-md-table-cell">Immagine</th> --}}
                     <th scope="col" class="d-none d-md-table-cell"><i class="bi bi-pencil-fill"></i></th>
                 </tr>
             </thead>
             <tbody>
                 @foreach ($books as $book)
                     <tr>
                         <th scope="row">{{ $book->id }}</th>
                         <td class="">{{ $book->title }}</td>
                         <td class="d-none d-md-table-cell w-25">{{ Str::limit($book->description, 50) }}</td>
                         <td class="d-none d-md-table-cell">{{ $book->genre }}</td>
                         <td class="d-none d-md-table-cell">{{ $book->price }}</td>
                         <td class="d-none d-md-table-cell">{{ $book->publication_date }}</td>
                         {{-- <td class="d-none d-md-table-cell">
                      <img class="img-fluid rounded " src="{{ asset("storage/". $book->thumb  ) }}" alt="{{$book->title}}"></td>
                    <td> --}}
                         {{-- <td class="d-none d-md-table-cell">
                            @if (str_starts_with($book->thumb, 'http'))
                            <img src=" {{ $book->thumb }}" @else <img src="{{ asset('storage/' . $book->thumb) }}"
                                    @endif
                                alt="{{ $book->title }}" class="img-fluid rounded ">
                        <td> --}}

                         <td>

                             <a href="{{ route('admin.books.show', $book->id) }}" class="btn btn-primary btn-sm"><i
                                     class="fa-solid fa-arrow-up-right-from-square"></i></a>
                         </td>
                         <td>
                             <form action="{{ route('admin.books.edit', $book->id) }}" method="GET">

                                 <button class="btn btn-warning btn-sm" type="submit"><i
                                         class="fa-solid fa-pen-to-square text-white"></i></button>

                             </form>

                         </td>
                         <td>
                             <form class="form-delete delete" data-element-name="{{ $book->title }}"
                                 action="{{ route('admin.books.destroy', $book->id) }}" method="post">
                                 @csrf
                                 @method('DELETE')
                                 <button class="btn btn-danger btn-sm" type="submit"><i
                                         class="fa-solid fa-trash"></i></button>
                             </form>
                         </td>
                 @endforeach
                 </tr>
             </tbody>
         </table>
         <div>
             {{-- {{ $books->links() }} --}}
         </div>

     </div>




 @endsection

 @section('script')
     @vite('resources/js/confirmDelete.js')
 @endsection
