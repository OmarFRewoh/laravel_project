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