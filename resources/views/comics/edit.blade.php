@extends('layouts.app')

@section('title', $title = "Modify " . $comic->title)

@section('main-content')
  <section>
    <div class="container py-4">
      <h1 class="mb-5">{{ $title }}</h1>

      <form action="{{ route('comics.update', $comic )}}" method="POST">
        @csrf
        @method('PATCH')
    
        <div class="row flex-wrap mb-2">
            <div class="col-6">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $comic->title }}" />
            </div>

            <div class="col-6">
                <label for="thumb" class="form-label">Image</label>
                <input type="text" class="form-control" id="thumb" name="thumb" value="{{ $comic->thumb }}"/>
            </div>

            <div class="col">
                <label for="type" class="form-label">Type</label>
                {{-- <input type="text" class="form-control" id="type" name="type" /> --}}
                <select class="form-select" id="type" name="type">
                    <option @if ( $comic->type == 'comic book') selected @endif value="comic book">comic book</option>
                    <option @if ( $comic->type == 'graphic novel') selected @endif value="graphic novel">graphic novel</option>
                  </select>
            </div>

            <div class="col">
                <label for="series" class="form-label">Serie</label>
                <input type="text" class="form-control" id="series" name="series" value="{{ $comic->series }}"/>
            </div>

            <div class="col">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price" value="{{ $comic->price }}"/>
            </div>
            
            <div class="col">
                <label for="sale_date" class="form-label">Sale date</label>
                <input type="date" class="form-control" id="sale_date" name="sale_date" value="{{ $comic->sale_date }}" />
            </div>
        </div>
    
        <label for="description" class="form-label">Description</label>
        <textarea
            class="form-control mb-3"
            id="description"
            name="description"
            rows="8"
        >{{ $comic->description }}</textarea>
    
        <button type="submit" class="btn btn-primary">save</button>
    </form>

    </div>
  </section>
@endsection
