@extends('layouts.app')

@section('title', "Comic's detail'")

@section('main-content')
    <section>
        <div class="container py-4">
            <div class="row justify-content-between align-items-center">
                <h1 class="mb-3 col-6">{{ $comic->title }}</h1>
                <div class="col-2 text-end">
                    <a class="btn btn-primary" href="{{ route('comics.index')}}">Back to comics'list</a>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <img class="img-fluid" src="{{ $comic->thumb }}" alt="{{ $comic->title }} cover">
                </div>
                <div class="col-8">
                    <h5><b>Description</b></h5>
                    <p>{{ $comic->description }}</p>
                    <div class="row">
                        <div class="col-6">
                            <p><b>Type: </b>{{ $comic->type }}</p>
                        </div>
                        <div class="col-6">
                            <p><b>Serie: </b>{{ $comic->series }}</p>
                        </div>
                        <div class="col-6">
                            <p><b>Sale date: </b>{{ $comic->sale_date }}</p>
                        </div>
                        <div class="col-6">
                            <p><b>Price: </b>{{ $comic->price }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('css')
    <style>
        img {
            width: 100%;
        }
    </style>
@endsection