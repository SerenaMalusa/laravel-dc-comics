@extends('layouts.app')

@section('title', "Comics'list")

@section('main-content')
  <section>
    <div class="container py-4">
      <div class="row justify-content-between align-items-center">
        <h1 class="mb-3 col-6">Comic's list</h1>
        <div class="col-2 text-end">
            <a class="btn btn-primary" href="{{ route('comics.create')}}">Create a new comic</a>
        </div>
    </div>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Series</th>
            <th scope="col">Type</th>
            <th scope="col">Price</th>
            <th class="text-center" scope="col">Links</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($comics as $comic)
                <tr>
                    <td>{{ $comic->id }}</th>
                    <td>{{ $comic->title }}</th>
                    <td>{{ $comic->series }}</td>
                    <td>{{ $comic->type }}</td>
                    <td>{{ $comic->price }}</td>
                    <td class="text-center">
                        <a href="{{ route('comics.show', $comic) }}">
                            <i class="fa-solid fa-circle-info"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
          
        </tbody>
      </table>
      
      {{-- {{ $comics->links() }} --}}
    </div>
  </section>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection