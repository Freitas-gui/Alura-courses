
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
            <span class="d-flex">
                <a href="/series/{{$serie->id}}/seasons" class="btn btn-info btn-sm mr-2">
                    <i class="fas fa-external-link-alt"></i>
                </a>
                <form method="post" action="/series/delete/{{$serie->id}}"
                    onsubmit="return confirm('Are you sure?')">
                    @csrf
                    <button class="btn btn-danger flex btn-sm ">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </form>
            </span>
        </li>

        @endforeach
    </ul>
@endsection
