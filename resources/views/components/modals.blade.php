<!-- Modal para crear o modificar viviendas------------------------------------------------------------------- -->
<div class="modal" id="store-house-modal" tabindex="-1" aria-labelledby="store-house-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="store-house-modalLabel">Formulario de vivienda</h5>
                <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body mb-0">
                <form id="house-form">
                    <input type="hidden" id="id" name="id">
                    <div class="row mb-3">
                        <div class="col-4">
                            <label for="tipo" class="form-label">Tipo</label>
                            <select class="form-select" id="tipo" name="tipo" required>
                                <option value="">Seleccione un tipo</option>
                                <option value="Casa">Casa</option>
                                <option value="Piso">Piso</option>
                                <option value="Adosado">Adosado</option>
                                <option value="Chalet">Chalet</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="zona" class="form-label">Zona</label>
                            <select class="form-select" id="zona" name="zona" required>
                                <option value="">Seleccione una zona</option>
                                <option value="Norte">Norte</option>
                                <option value="Oeste">Oeste</option>
                                <option value="Centro">Centro</option>
                                <option value="Sur">Sur</option>
                                <option value="Este">Este</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="extras" class="form-label">Extras</label>
                            <select class="form-select" id="extras" name="extras">
                                <option value="">Seleccione un extra</option>
                                <option value="Jardin">Jardin</option>
                                <option value="Piscina">Piscina</option>
                                <option value="Garaje">Garaje</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="direccion" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" required>
                        </div>
                        <div class="col-2">
                            <label for="dormitorios" class="form-label">Dormitorios</label>
                            <input type="number" class="form-control" id="dormitorios" name="dormitorios" min="1"
                                max="5" step="1" required>
                        </div>
                        <div class="col-2">
                            <label for="tamano" class="form-label">Tamaño</label>
                            <input type="number" class="form-control" id="tamano" name="tamano" min="1" required>
                        </div>
                        <div class="col-2">
                            <label for="precio" class="form-label">Precio</label>
                            <input type="number" class="form-control" id="precio" name="precio" min="1" step="1"
                                required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="observaciones" class="form-label">Observaciones</label>
                            <textarea class="form-control" id="observaciones" name="observaciones" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-close-modal"
                            data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal para buscar viviendas filtradas-------------------------------------------------------------------- -->
<div class="modal" id="search-house-modal" tabindex="-1" aria-labelledby="search-house-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="search-house-modalLabel">Buscador de vivienda</h5>
                <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="house-search-form">
                    <input type="hidden" id="id" name="id">
                    <div class="row mb-3">
                        <div class="col-4">
                            <label for="tipo" class="form-label">Tipo</label>
                            <select class="form-select" id="tipo" name="tipo">
                                <option value="">Seleccione un tipo</option>
                                <option value="Casa">Casa</option>
                                <option value="Piso">Piso</option>
                                <option value="Adosado">Adosado</option>
                                <option value="Chalet">Chalet</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="zona" class="form-label">Zona</label>
                            <select class="form-select" id="zona" name="zona">
                                <option value="">Seleccione una zona</option>
                                <option value="Norte">Norte</option>
                                <option value="Oeste">Oeste</option>
                                <option value="Centro">Centro</option>
                                <option value="Sur">Sur</option>
                                <option value="Este">Este</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="extras" class="form-label">Extras</label>
                            <select class="form-select" id="extras" name="extras">
                                <option value="">Seleccione un extra</option>
                                <option value="Jardin">Jardin</option>
                                <option value="Piscina">Piscina</option>
                                <option value="Garaje">Garaje</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-3">
                            <label for="dormitorios" class="form-label">Dormitorios</label>
                            <div class="d-flex">
                                <select class="form-select w-50 m-1" id="dormitorios-operator"
                                    name="dormitorios-operator">
                                    <option value="<">
                                        << /option>
                                    <option value="<=">
                                        <=< /option>
                                    <option value="=">=</option>
                                    <option value=">=">>=</option>
                                    <option value=">">></option>
                                </select>
                                <input type="number" class="form-control m-1" id="dormitorios" name="dormitorios"
                                    min="1" max="5" step="1">
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="tamano" class="form-label">Tamaño</label>
                            <div class="d-flex">
                                <select class="form-select w-50 m-1" id="tamano-operator" name="tamano-operator">
                                    <option value="<">
                                        << /option>
                                    <option value="<=">
                                        <=< /option>
                                    <option value="=">=</option>
                                    <option value=">=">>=</option>
                                    <option value=">">></option>
                                </select>
                                <input type="number" class="form-control m-1" id="tamano" name="tamano" min="1">
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="precio" class="form-label">Precio</label>
                            <div class="d-flex">
                                <select class="form-select w-50 m-1" id="precio-operator" name="precio-operator">
                                    <option value="<">
                                        << /option>
                                    <option value="<=">
                                        <=< /option>
                                    <option value="=">=</option>
                                    <option value=">=">>=</option>
                                    <option value=">">></option>
                                </select>
                                <input type="number" class="form-control m-1" id="precio" name="precio" min="1"
                                    step="1">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-close-modal"
                            data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal para crear o modificar usuarios------------------------------------------------------------------- -->
<div class="modal" id="store-user-modal" tabindex="-1" aria-labelledby="store-user-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="store-user-modalLabel">Formulario de usuario</h5>
                <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body mb-0">
                <form id="user-form">
                    <div class="col-6">
                        <label for="id-usuario" class="form-label">Id de usuario</label>
                        <input type="text" class="form-control mb-3" id="id_usuario" name="id_usuario" maxlength="9" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-close-modal"
                            data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>