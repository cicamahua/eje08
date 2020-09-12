<form action="<?=base_url() ?>producto/guardar" method="POST" enctype="mutipart/form-data">
    <label>Nombre:</label>
    <input type="text" name="Nombre" id="Nombre" class="form-control">
    <label>Precio:</label>
    <input type="number" min="8" name="Precio" id="Precio" class="form-control">
    <label>Detalle:</label>
    <input type="text" name="Detalle" id="Detalle" class="form-control">
    <label>Foto:</label>
    <input type="file" name="Foto" id="Foto" class="form-control">
    <br>
    <input type="submit" value="Guardar"  class="btn btn-success">
</form>