<!-- Modal -->
<div class="modal fade" id="modalFormCategorias" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nueva categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form id="formCategoria" name="formCategoria" class="form-horizontal">
              <input type="hidden" id="idCategoria" name="idCategoria" value="">
              <p class="text-primary">Los campos con asterisco (<span class="required">*</span>) son obligatorios.</p>

                <div class="row">
                 <div class="col-md-6">
                    <input type="hidden" id="idCategoria" name="idCategoria" value="">
                    <div class="form-group">
                      <label class="control-label">Nombre</label>
                      <input class="form-control" id="txtNombre" name="txtNombre" type="text" placeholder="Nombre de categoría" required="">
                    </div>
                    <div class="form-group">
                      <label class="control-label">Descripción</label>
                      <textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="2" placeholder="Descripción de categoría" required=""></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelect1">Estado</label>
                        <select class="form-control" id="listStatus" name="listStatus" required="">
                          <option value="1">Activo</option>
                          <option value="2">Inactivo</option>
                        </select>
                    </div>
                </div>
                    <div class="col-md-6">
                        <div class="photo">
                            <label for="foto">Foto (570x380)</label>
                            <div class="prevPhoto">
                                <span class="delPhoto notBlock">X</span>
                                <label for="foto"></label>
                                <div>
                                  <img id="img" src="<?= media(); ?>/images/uploads/portada_categoria.png">
                                </div>
                            </div>
                            <div class="upimg">
                              <input type="file" name="foto" id="foto">
                            </div>
                            <div id="form_alert"></div>
                        </div> 
                    </div>
                </div>
               
              <div class="tile-footer">
                <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
                <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
              </div>
            </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal para datos en especificos-->
<div class="modal fade" id="modalViewCategoria" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Datos de la categoría</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>ID:</td>
              <td id="celId">232vv3c3558sza2336</td>
            </tr>
            <tr>
              <td>Nombre:</td>
              <td id="celNombre">Licaon</td>
            </tr>
            <tr>
              <td>Descripción</td>
              <td id="celDescripcion">Fuerza de Heracles</td>
            </tr>
            <tr>
              <td>Estado:</td>
              <td id="celEstado">Dummy</td>
            </tr>
            <tr>
              <td>Fecha de registro</td>
              <td id="celFecha">012022/10</td>
            </tr>
            <tr>
              <td>Foto:</td>
              <td id="imgCategoria"></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

