@extends('layouts.app')

@section('title', $title = "Create new comic")

@section('main-content')
  <section>
    <div class="container py-4">
      <h1 class="mb-5">{{ $title }}</h1>

      <form action="{{ route('comics.store') }}" method="POST">
        @csrf
    
        <div class="row flex-wrap mb-2">
            <div class="col-6 mb-2">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title')}}"/>
                @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-6 mb-2">
                <label for="thumb" class="form-label">Image</label>
                <input type="text" class="form-control @error('thumb') is-invalid @enderror" id="thumb" name="thumb" value="{{ old('thumb')}}"/>
                @error('thumb')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col">
                <label for="type" class="form-label">Type</label>
                {{-- <input type="text" class="form-control" id="type" name="type" /> --}}
                <select class="form-select @error('type') is-invalid @enderror" id="type" name="type">
                    <option @if (!old('type')) selected @endif></option>
                    <option @if (old('type') == 'comic book') selected @endif value="comic book">comic book</option>
                    <option @if (old('type') == 'graphic novel') selected @endif value="graphic novel">graphic novel</option>
                </select>
                @error('type')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col">
                <label for="series" class="form-label">Serie</label>
                <input type="text" class="form-control @error('series') is-invalid @enderror" id="series" name="series" value="{{ old('series')}}"/>
                @error('series')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col row">
                <div class="col-8 px-0">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" min='0' max="100" step=".01" value="{{ old('price')}}"/>
                    @error('price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-4 d-flex align-items-end">
                    <select 
                    class="form-select 
                        @error('price_unit') is-invalid mb-4 @enderror 
                        @error('price') mb-4 @enderror
                        @error('type') mb-4 @enderror
                        @error('series') mb-4 @enderror
                        @error('sale_date') mb-4 @enderror" 
                        name="price_unit" 
                        id="price_unit">
                            <option @if (old('type') == '$') selected @endif value="$">$</option>
                            <option @if (old('type') == '€') selected @endif value="€">€</option>
                    </select>
                </div>
            </div>
            
            <div class="col">
                <label for="sale_date" class="form-label">Sale date</label>
                <input type="date" class="form-control @error('sale_date') is-invalid @enderror" id="sale_date" name="sale_date" value="{{ old('sale_date') ?? Carbon\Carbon::now() }}" />
                @error('date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    
        <label for="description" class="form-label">Description</label>
        <textarea
            class="form-control mb-3 @error('description') is-invalid @enderror"
            id="description"
            name="description"
            rows="4"
        >
            {{ old('description') }}
        </textarea>
        @error('description')
            <div class="invalid-feedback mb-3">
                {{ $message }}
            </div>
        @enderror
    
        <button type="submit" class="btn btn-primary">save</button>
    </form>

    </div>
  </section>
@endsection
