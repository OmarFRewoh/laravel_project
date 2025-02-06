<table class="table">
    <thead>
        <th scope="col">Id usuario</th>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr data-user-id="{{$user['id_usuario']}}">
                <td data-field="id_usuario">{{$user['id_usuario']}}</td>
                <td class="align-middle">
                    <div class="d-flex gap-1">
                        @if ($user['id_usuario'] !== 'admin')
                            <button type="button" class="btn btn-danger delete-user" data-id="{{$user['id_usuario']}}"><i class="bi bi-trash"></i></button>
                        @endif
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div id="pagination-links" class="d-flex justify-content-center">
    {{ $users->links('vendor.pagination.bootstrap-5') }}
</div>