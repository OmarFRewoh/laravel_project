@extends('app')
@section('content')
<main class="p-5">
    <div class="mt-5">
        <div class="text-center">
            <h1 class="mb-5">Pisos y casas en venta</h1>
        </div>
        <button type="button" class="btn btn-success create-house">
            Crear vivienda
        </button>
        <button type="button" class="btn btn-secondary search-house">
            Buscar <i class="bi bi-search"></i>
        </button>
        <div id="viviendas-list">
            <div id="loading" class="d-none" style="text-align: center; padding: 20px; margin-top: 250px;">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Cargando...</span>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    var userHasSearched = false;

    $(document).ready(function () {
        triggerHouseSearch();
    })
    $(document).on("click", ".edit-house", function (event) {
        let id = $(event.target).closest("button")[0].dataset.id;
        setEditModalInputsAndShow(id);
    });
    $(document).on("submit", "#house-form", function (event) {
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
            success: function (response) {
                console.log("Datos guardados correctamente");
                $(".modal").hide();
                triggerHouseSearch();
            },
            error: function (xhr, status, error) {
                console.error("Error al guardar los datos:", error);
                alert("Hubo un problema guardar los datos.");
            }
        });
    });

    $(document).on("click", ".delete-house", function (event) {
        let id = $(event.target).closest("button")[0].dataset.id;
        $.ajax({
            url: '/api/house/delete/' + id,
            method: 'DELETE',
            success: function (response) {
                console.log('Datos borrados correctamente');
                triggerHouseSearch();
            },
            error: function (xhr, status, error) {
                console.error("Error al borrar el registro:", error);
                alert("Hubo un problema al borrar el registro.");
            }
        });
    });

    $(document).on("click", ".btn-close-modal", function (event) {
        $(".modal").hide();
    });

    $(document).on("click", ".create-house", function (event) {
        cleanEditModalInputsAndShow();
    });

    $(document).on("click", ".search-house", function (event) {
        $("#search-house-modal").show();
    });
    $(document).on("submit", '#house-search-form', function (event) {
        event.preventDefault();
        let formData = $(this).serialize();
        let url = "/api/house/search?" + formData;
        loadHouses(url, true);
    });
    $(document).on("click", "#pagination-links a", function (e) {
        e.preventDefault();
        let url = $(this).attr('href');
        loadHouses(url, false);
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

    function loadHouses(url, clickFlag) {
        $("#loading").removeClass("d-none");
        $.ajax({
            url: url,
            method: 'GET',
            success: function (response) {
                console.log("Busqueda realizada correctamente");
                userHasSearched = (clickFlag && !userHasSearched) ? true : false;
                $(".modal").hide();
                $("#loading").addClass("d-none");
                $("#viviendas-list").html(response);
            },
            error: function (xhr, status, error) {
                console.error("Error al buscar las viviendas:", error);
                alert("Hubo un problema al actualizar los datos.");
            }
        });
    }

    function triggerHouseSearch() {
        let formData = $('#house-search-form').serialize();
        console.log("userHasSearched cuando lanzo el evento programaticamente: " + userHasSearched);
        let url = userHasSearched ? "/api/house/search?" + formData : "/api/house/search";
        loadHouses(url, false);
    }
</script>
@endsection