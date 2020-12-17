
@extends('layout')

@section('head')
    Series
@endsection

@section('content')

    @include('message',['message' => $message])


    @auth
    <a href="{{route('create')}}" class="btn btn-dark mb-2"> Add </a>
    @endauth
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
                @auth
                <button class="btn btn-info btn-sm mr-2 text-light" onclick="toggleInput({{$serie->id}})">
                   <i class="fas fa-edit"></i>
                </button>
                @endauth
                <a href="/series/{{$serie->id}}/seasons" class="btn btn-info btn-sm mr-2 text-light">
                    <i class="fas fa-info-circle"></i>
                </a>
                @auth
                <button class="btn btn-danger flex btn-sm text-light" onclick="youAreSure()">
                    <i class="fas fa-trash-alt"></i>
                </button>
                @endauth
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

        function youAreSure(){

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                html:
                    'If you '+
                    '<b class="text-danger">delete</b>'+
                    ' this Serie, this that it will be permanently ',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#007bff',
                cancelButtonText:
                    '<button  class="btn btn-outline-primary>' +
                    '<i class="text-light">Cancel</i>' +
                    '</button>',
                confirmButtonText:
                    '@if(isset($serie))' +
                        '<form method="post" action="/series/delete/{{$serie->id}}">' +
                        '@csrf' +
                        '<button  class="btn btn-outline-light>' +
                        '<i class="text-light">Delete</i>' +
                        '</button>' +
                        '</form>' +
                    '@endif',

            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })

        }




    </script>
@endsection

