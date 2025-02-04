<!-- Modal -->
<div class="modal" id="edit-house-modal" tabindex="-1" aria-labelledby="edit-house-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit-house-modalLabel">Agregar Propiedad</h5>
                <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="house-form">
                    <input type="hidden" id="id" name="id">
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="tipo" class="form-label">Tipo</label>
                            <select class="form-select" id="tipo" name="tipo" required>
                                <option value="">Seleccione un tipo</option>
                                <option value="Casa">Casa</option>
                                <option value="Piso">Piso</option>
                                <option value="Adosado">Adosado</option>
                                <option value="Chalet">Chalet</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="zona" class="form-label">Zona</label>
                            <select class="form-select" id="zona" name="zona" required>
                                <option value="">Seleccione una zona</option>
                                <option value="Norte">Norte</option>
                                <option value="Oeste">Oeste</option>
                                <option value="Sur">Sur</option>
                                <option value="Este">Este</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-8">
                            <label for="direccion" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" required>
                        </div>
                        <div class="col-2">
                            <label for="dormitorios" class="form-label">Dormitorios</label>
                            <input type="number" class="form-control" id="dormitorios" name="dormitorios" min="1" step="1" required>
                        </div>
                        <div class="col-2">
                            <label for="precio" class="form-label">Precio</label>
                            <input type="number" class="form-control" id="precio" name="precio" min="1" step="1000" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            <label for="tamano" class="form-label">Tamaño</label>
                            <input type="number" class="form-control" id="tamano" name="tamano" min="1" required>
                        </div>
                        <div class="col-8">
                            <label for="extras" class="form-label">Extras</label>
                            <input type="text" class="form-control" id="extras" name="extras">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="observaciones" class="form-label">Observaciones</label>
                            <textarea class="form-control" id="observaciones" name="observaciones" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-close-modal" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>