@extends('layouts.app')

@section('title', $title = "Comics' list")

@section('main-content')
  <section>
    <div class="container py-4">
      <div class="row justify-content-between align-items-center">
        <h1 class="mb-3 col-6">{{ $title }}</h1>
        <div class="col-2 text-end">
            <a class="btn btn-primary" href="{{ route('comics.create')}}">Create a new comic</a>
        </div>
    </div>

      <table class="table table-striped">
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
                    <td>{{ $comic->get_full_price() }}</td>
                    <td class="text-center">
                        <a href="{{ route('comics.show', $comic) }}">
                            <i class="fa-solid fa-circle-info"></i>
                        </a>
                        <a href="{{ route('comics.edit', $comic)}}">
                          <i class="fa-solid fa-file-pen"></i>
                        </a>
                        <form class="d-inline-block" action="{{ route('comics.destroy', $comic) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button class="btn border border-0" type="submit" id='delete-button'>
                            <i class="fa-solid fa-trash-can text-danger"></i>
                          </button>
                        </form>
                    </td>
                </tr>
            @endforeach
          
        </tbody>
      </table>
      
      {{ $comics->links() }}
    </div>
  </section>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
      #delete-button {
        padding: 0;
        margin: 0;
        display: flex;
        align-items: flex-start;
      }
    </style>
@endsection

@section('js')
    <script>
        const deleteButton = document.querySelector('#delete-button');
        if(deleteButton) {

          deleteButton.addEventListener('click', function () {
          // console.log('bottone cliccato');
  
            if (!confirm(
`The delete action is not reversible.
Are you sure that you want to remove this comic from the list?`
              )) {
                  event.preventDefault();
              } 
          });

        };
    </script>
@endsection