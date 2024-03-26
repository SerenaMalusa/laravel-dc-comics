@extends('layouts.app')

@section('title', "Comic's detail'")

@section('main-content')
    <section>
        <div class="container py-4">
            <h1>{{ $comic->title }}</h1>
        </div>
    </section>
@endsection