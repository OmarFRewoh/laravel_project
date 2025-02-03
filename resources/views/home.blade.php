@extends('app')
@section('content')
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h1>USUARIO LOGUEADO</h1>
                    </div>
                </div>
            </div>
        </div>
        <div id="viviendas-list">
            <table class="table">
                <thead>
                    <th scope="col">Id</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Zona</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Dormitorios</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Tamaño</th>
                    <th scope="col">Fecha del anuncio</th>
                    <th scope="col">Extras</th>
                    <th scope="col">Observaciones</th>
                    <th scope="col">Acciones</th>
                </thead>
                <tbody>
                    @foreach ($houses as $house)
                        <tr>
                            <th scope="row">{{$house['id']}}</th>
                            <td>{{$house['tipo']}}</td>
                            <td>{{$house['zona']}}</td>
                            <td>{{$house['direccion']}}</td>
                            <td>{{$house['ndormitorios']}}</td>
                            <td>{{$house['precio']}}</td>
                            <td>{{$house['tamano']}}</td>
                            <td>{{$house['fecha_anuncio']}}</td>
                            <td>{{$house['extras']}}</td>
                            <td>{{$house['observaciones']}}</td>
                            <td>
                                <button type="button" class="btn btn-primary edit-house" data-id="{{$house['id']}}">Modificar</button>
                                <button type="button" class="btn btn-danger delete-house" data-id="{{$house['id']}}">Borrar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
        {{ $houses->links('vendor.pagination.bootstrap-5') }}
        </div>
        
        <div class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Modal body text goes here.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        $(document).on("click", ".edit-house", function(event) {
            console.log(event.target.dataset.id);
            $('.modal').show();
        });
        $(document).on("click", ".delete-house", function(event) {
            console.log(event.target.dataset.id);
        });
    </script>
@endsection