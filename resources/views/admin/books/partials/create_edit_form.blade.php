@if ($errors->any())
    <div id="popup_message" class="d-none" data-type="warning" data-message="Ci sono degli errori"></div>
@endif

<form class="pt-3" action="{{ route ($route, $book) }}" method="POST" enctype="multipart/form-data"> @csrf @method($method)
  <div class="form-group row p-3">
     <p class="fw-bold text-danger">ID: &nbsp;{{$book->id}}</p>
    <label for="title" class="col-sm-2 col-form-label fw-bold">Titolo</label>
    <div class="col-sm-10">
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Inserisci il titolo del progetto" name="title" value="{{ old('title' , $book->title)}}">
        @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror    
    </div>
  </div>
  <div class="form-group row p-3">
    <label for="description" class="col-sm-2 col-form-label fw-bold">Descrizione</label>
    <div class="col-sm-10">
      <textarea name="description" cols="30" rows="5" type="text" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Inserisci la descrizione">{{ old('description' , $book->description)}}</textarea>
    @error('description')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror    
    </div>
  </div>
  <div class="form-group row p-3">
    <label for="author" class="col-sm-2 col-form-label fw-bold">Autore</label>
    <div class="col-sm-10">
      <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" placeholder="Inserisci autore" name="author" value="{{ old('author' , $book->author)}}">
    @error('author')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror    
    </div>
  </div>
  <div class="form-group row p-3">
    <label for="price" class="col-sm-2 col-form-label fw-bold">Prezzo</label>
    <div class="col-sm-10">
      <input type="number" step="1" class="form-control @error('price') is-invalid @enderror"" id="price" placeholder="Inserisci il prezzo" name="price" value="{{ old('price' , $book->price)}}">
    @error('year')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror    
    </div>
  </div>
  <div class="form-group row p-3">
    <label for="genre" class="col-sm-2 col-form-label fw-bold">Genere</label>
    <div class="col-sm-10">
      <input type="text" class="form-control @error('genre') is-invalid @enderror" id="genre" placeholder="Inserisci il genere" name="genre" value="{{ old('genre' , $book->genre)}}">
    @error('genre')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror    
    </div>
  </div>
  <div class="form-group row p-3">
    <label for="cover_image" class="col-sm-2 col-form-label fw-bold">Immagine</label>
    <div class="col-sm-5">
      <input type="file" class="form-control @error('cover_image') is-invalid @enderror" id="cover_image"  name="cover_image" value="{{ old('cover_image', $book->cover_image ) , asset("storage/". $book->cover_image  )}}  ">
    @error('thumb')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror    
    </div>
    <label for="date" class="col-sm-1 col-form-label fw-bold">Data</label>
    <div class="col-sm-4">
      <input type="date" class="form-control @error('date_added') is-invalid @enderror" id="date" placeholder="Inserisci la data di pubblicazione" name="publication_date" value="{{ old('publication_date' , $book->publication_date)}}">
      @error('publication_date')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror    
    </div>
  </div>
  <div class="form-group row p-3">
    <div class="col-sm-12">
      <a class="btn btn-secondary btn-sm" href="{{ route ("admin.books.index") }}"><i class="fa-solid fa-chevron-left text-white"></i></a>
      <button type="submit" class="btn btn-success btn-sm">Salva</button>
    </div>
    
  </div>
</form>

{{-- @section('script')
    @vite('resources/js/confirmDelete.js')
@endsection --}}