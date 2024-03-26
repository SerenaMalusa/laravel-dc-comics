@extends('layouts.app')

@section('title', $title = "Create new comic")

@section('main-content')
  <section>
    <div class="container py-4">
      <h1 class="mb-5">{{ $title }}</h1>

      <form action="#" method="POST">
        @csrf
    
        <div class="row flex-wrap mb-2">
            <div class="col-6">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" />
            </div>

            <div class="col-6">
                <label for="thumb" class="form-label">Image</label>
                <input type="text" class="form-control" id="thumb" name="thumb" />
            </div>

            <div class="col">
                <label for="type" class="form-label">Type</label>
                <input type="text" class="form-control" id="type" name="type" />
            </div>

            <div class="col">
                <label for="series" class="form-label">Serie</label>
                <input type="text" class="form-control" id="series" name="series" />
            </div>

            <div class="col">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price" />
            </div>
            
            <div class="col">
                <label for="sale_date" class="form-label">Sale date</label>
                <input type="date" class="form-control" id="sale_date" name="sale_date" value="{{ Carbon\Carbon::now() }}" />
            </div>
        </div>
    
        <label for="description" class="form-label">Description</label>
        <textarea
            class="form-control mb-3"
            id="description"
            name="description"
            rows="4"
        ></textarea>
    
        <button type="submit" class="btn btn-primary">Salva</button>
    </form>

    </div>
  </section>
@endsection
