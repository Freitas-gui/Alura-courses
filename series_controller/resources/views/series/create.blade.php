@extends('layout')

@section('head')
    Add Serie
@endsection

@section('content')

    @include('errors', ['errors' => $errors])


    <form method="post">
        @csrf
        <div class="row">

            <div class="col col-8">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>

            <div class="col col-2">
                <label for="season_num">Season quantity</label>
                <input type="number" class="form-control" name="season_num" id="season_num">
            </div>

            <div class="col col-2">
                <label for="episode_num">Episode quantity per season</label>
                <input type="number" class="form-control" name="episode_num" id="episode_num">
            </div>
        </div>
        <button class="btn btn-primary mt-2">Add</button>
    </form>

@endsection
