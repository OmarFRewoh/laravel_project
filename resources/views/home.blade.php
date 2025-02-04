@extends('app')
@section('content')
    <main class="login-form p-5">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h1>USUARIO LOGUEADO</h1>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-success create-house">
            Crear vivienda
        </button>
        <button type="button" class="btn btn-secondary search-house">
            Buscar vivienda
        </button>
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
                    <th scope="col">Fotos</th>
                    <th scope="col">Acciones</th>
                </thead>
                <tbody>
                    @foreach ($houses as $house)
                        <tr data-house-id="{{$house['id']}}">
                            <th scope="row">{{$house['id']}}</th>
                            <td data-field="tipo">{{$house['tipo']}}</td>
                            <td data-field="zona">{{$house['zona']}}</td>
                            <td data-field="direccion">{{$house['direccion']}}</td>
                            <td data-field="dormitorios">{{$house['ndormitorios']}}</td>
                            <td data-field="precio">{{$house['precio']}}</td>
                            <td data-field="tamano">{{$house['tamano']}}</td>
                            <td data-field="fecha_anuncio">{{$house['fecha_anuncio']}}</td>
                            <td data-field="extras">{{$house['extras']}}</td>
                            <td data-field="observaciones">{{$house['observaciones']}}</td>
                            <td data-field="photos">
                                @foreach ($house->photos as $index => $photo)
                                    <a href="{{ asset('storage/photos/' . $photo->foto) }}" target="_blank">Foto {{$index + 1}}</a>
                                @endforeach
                            </td>
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
    </main>
    <script>
        $(document).on("click", ".edit-house", function(event) {
            setEditModalInputsAndShow(event.target.dataset.id);
        });
        $(document).on("submit", "#house-form", function(event) {
            event.preventDefault();
            if (this.checkValidity() === false) {
                event.stopPropagation();
                return;
            }

            let formData = $(this).serialize();

            $.ajax({
                url: '/api/house/store',
                method: 'POST',
                data: formData,
                success: function(response) {
                    console.log('Datos guardados correctamente:', response);
                    $('.modal').hide();
                    window.location.reload();
                },
                error: function(xhr, status, error) {
                    console.error("Error al guardar los datos:", error);
                    alert("Hubo un problema guardar los datos.");
                }
            });
        });
        
        $(document).on("click", ".delete-house", function(event) {
            $.ajax({
                url: '/api/house/delete',
                method: 'DELETE',
                data: {id: event.target.dataset.id},
                success: function(response) {
                    console.log('Datos borrados correctamente:', response);
                    window.location.reload();
                },
                error: function(xhr, status, error) {
                    console.error("Error al borrar el registro:", error);
                    alert("Hubo un problema al borrar el registro.");
                }
            });
        });
        
        $(document).on("click", ".btn-close-modal", function(event) {
            $(".modal").hide();
        });
        
        $(document).on("click", ".create-house", function(event) {
            cleanEditModalInputsAndShow();
        });
        
        $(document).on("click", ".search-house", function(event) {
            $("#search-house-modal").show();
        });
        $(document).on("submit", '#house-search-form', function(event){
            event.preventDefault();
            if (this.checkValidity() === false) {
                event.stopPropagation();
                return;
            }

            let formData = $(this).serialize();

            $.ajax({
                url: '/api/house/search',
                method: 'GET',
                data: formData,
                success: function(response) {
                    console.log('Busqueda realizada correctamente:', response);
                    $('.modal').hide();
                    $('#viviendas-list').html(response);
                },
                error: function(xhr, status, error) {
                    console.error("Error al buscar las viviendas:", error);
                    alert("Hubo un problema guardar los datos.");
                }
            });
        })

        function setEditModalInputsAndShow(id) {
            let house = $("#viviendas-list tr[data-house-id='" + id + "']");
            $("#store-house-modal #id").val(id);
            $("#store-house-modal #tipo").val($(house).find("td[data-field='tipo']").text());
            $("#store-house-modal #zona").val($(house).find("td[data-field='zona']").text());
            $("#store-house-modal #direccion").val($(house).find("td[data-field='direccion']").text());
            $("#store-house-modal #dormitorios").val($(house).find("td[data-field='dormitorios']").text().match(/\d+/)[0]);
            $("#store-house-modal #precio").val($(house).find("td[data-field='precio']").text());
            $("#store-house-modal #tamano").val($(house).find("td[data-field='tamano']").text());
            $("#store-house-modal #extras").val($(house).find("td[data-field='extras']").text());
            $("#store-house-modal #observaciones").val($(house).find("td[data-field='observaciones']").text());
            $("#store-house-modal").show();
        }

        function cleanEditModalInputsAndShow() {
            $("#store-house-modal #id").val('');
            $("#store-house-modal #tipo").val('');
            $("#store-house-modal #zona").val('');
            $("#store-house-modal #direccion").val('');
            $("#store-house-modal #dormitorios").val('');
            $("#store-house-modal #precio").val('');
            $("#store-house-modal #tamano").val('');
            $("#store-house-modal #extras").val('');
            $("#store-house-modal #observaciones").val('');
            $("#store-house-modal").show();
        }
    </script>
@endsection