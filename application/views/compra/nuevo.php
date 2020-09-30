<form action="<?= base_url() ?>compra/guardar" method="POST" enctype="multipart/form-data">
<label>Producto:</label>
    <!--<select name="p[<?= $fila; ?>][id_producto]" class="form-control id_producto " rel="<?= $fila; ?>">-->
    <select name="id_producto" class="form-control id_producto " required>
        <option value="">Seleccionar</option>
        <?php foreach ($productos as $p) {
        ?>
           <option value="<?= $p->id_producto ?>"><?= $p->nombre ?></option>
        <?php
        } ?>

    </select>
    <br/>

    <!--<label>Producto:</label>
    <input type="text" name="Producto" id="Producto" class="form-control">-->

    <label>Cantidad:</label>
    <input type="number" min="0" name="Cantidad" id="Cantidad" class="form-control" required>

    <br>
    <input type="submit" value="Guardar" class="btn btn-success">
</form>