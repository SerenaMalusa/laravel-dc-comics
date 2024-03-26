@extends('layouts.app')

@section('title', 'Pagina iniziale')

@section('main-content')
  <section>
    <div class="container py-4">      
      <h1>{{ env('APP_NAME') }}</h1>
    </div>
  </section>
@endsection
