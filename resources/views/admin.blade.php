@extends('app')
@section('content')
<main class="p-5">
    <div class="mt-5">
        <div class="text-center">
            <h1 class="mb-5">Usuarios</h1>
        </div>
        <button type="button" class="btn btn-success create-user">
            Crear usuario
        </button>
        <div id="users-list">
            <div id="loading" class="d-none" style="text-align: center; padding: 20px; margin-top: 250px;">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Cargando...</span>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    $(document).ready(function () {
        searchUsers();
    });
    $(document).on("click", ".create-user", function (event) {
        cleanCreateModalInputsAndShow();
    });

    
    $(document).on("click", ".btn-close-modal", function (event) {
        $(".modal").hide();
    });
    
    $(document).on("submit", "#user-form", function (event) {
        event.preventDefault();
        if (this.checkValidity() === false) {
            event.stopPropagation();
            return;
        }

        let formData = $(this).serialize();

        $.ajax({
            url: '/api/user/store',
            method: 'POST',
            data: formData,
            success: function (response) {
                console.log("Datos guardados correctamente");
                $(".modal").hide();
                searchUsers();
            },
            error: function (xhr, status, error) {
                console.error("Error al guardar los datos:", error);
                alert("Hubo un problema guardar los datos.");
            }
        });
    });

    $(document).on("click", ".delete-user", function (event) {
        let id = $(event.target).closest("button")[0].dataset.id;
        $.ajax({
            url: '/api/user/delete/' + id,
            method: 'DELETE',
            success: function (response) {
                console.log('Datos borrados correctamente');
                searchUsers();
            },
            error: function (xhr, status, error) {
                console.error("Error al borrar el registro:", error);
                alert("Hubo un problema al borrar el registro.");
            }
        });
    });

    function cleanCreateModalInputsAndShow() {
        $("#store-user-modal #id").val('');
        $("#store-user-modal").show();
    }
    
    function searchUsers() {
        $("#loading").removeClass("d-none");
        $.ajax({
            url: '/api/users/search',
            method: 'GET',
            success: function (response) {
                console.log("Busqueda realizada correctamente");
                $("#loading").addClass("d-none");
                $("#users-list").html(response);
            },
            error: function (xhr, status, error) {
                console.error("Error al buscar los usuarios:", error);
                alert("Hubo un problema al actualizar los datos.");
            }
        });
    }
    

</script>
@endsection