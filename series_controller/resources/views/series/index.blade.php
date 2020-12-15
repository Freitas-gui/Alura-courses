
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
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <span id="serie-name-{{ $serie->id }}">
                {{ $serie->name }}
            </span>

            <div class="input-group w-50" hidden id="input-serie-name-{{ $serie->id }}">
                <input type="text" class="form-control" value="{{ $serie->name }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" onclick="editSerie({{$serie->id}})">
                        <i class="fas fa-check"></i>
                    </button>
                    @csrf
                </div>
            </div>


            <span class="d-flex">
                <button class="btn btn-info btn-sm mr-2" onclick="toggleInput({{$serie->id}})">
                    <i class="fas fa-edit"></i>
                </button>
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

    <script>
        function toggleInput(serieId){
            if (document.getElementById(`serie-name-${serieId}`).hasAttribute('hidden')){
                document.getElementById(`serie-name-${serieId}`).removeAttribute('hidden');
                document.getElementById(`input-serie-name-${serieId}`).hidden = true
            }
            else {
                document.getElementById(`input-serie-name-${serieId}`).removeAttribute('hidden');
                document.getElementById(`serie-name-${serieId}`).hidden = true;
            }

        }
        function editSerie(serieId){
            let formData = new FormData();
            const name = document.querySelector(`#input-serie-name-${serieId} > input`).value;
            const token = document.querySelector('input[name="_token"]').value;

            formData.append('name', name);
            formData.append('_token', token);

            const url = `/series/${serieId}/editName`;
            // Make Request
            fetch(url, {
                body: formData,
                method: 'POST'
            }).then(()=>{
                document.getElementById(`serie-name-${serieId}`).textContent = name;
                toggleInput(serieId);
            })
        }
    </script>
@endsection

