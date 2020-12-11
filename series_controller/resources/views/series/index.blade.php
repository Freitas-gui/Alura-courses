
@extends('layout')

@section('head')
    Series
@endsection

@section('content')

    @if (!empty($message))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif
    <a href="{{route('create')}}" class="btn btn-dark mb-2"> Add </a>
    <ul class="list-group">
        @foreach($series as $serie)
        <li class="list-group-item d-flex justify-content-between">
            {{ $serie->name }}
            <form method="post" action="/series/delete/{{$serie->id}}"
                onsubmit="return confirm('Are you sure?')">
                @csrf
                <button class="btn btn-danger flex btn-sm ">
                    <i class="far fa-trash-alt"></i>
                </button>
            </form>
        </li>

        @endforeach
    </ul>
@endsection
