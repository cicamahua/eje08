<form action="<?= base_url() ?>usuario/guardar" method="POST" enctype="multipart/form-data">

    <label>Nombre:</label>
    <input type="text" name="Nombre" id="Nombre" class="form-control">

    <label>Apellido:</label>
    <input type="text"  name="Apellido" id="Apellido" class="form-control">

    <label>Fotografia:</label>
    <input type="file" name="Fotografia" id="Fotografia" class="form-control">

    <label>Usuario:</label>
    <input type="text" name="Usuario" id="Usuario" class="form-control">    

    <label>Contraseña:</label>
    <input type="password" name="Contrasena" id="Contrasena" class="form-control">        

    <br>
    <input type="submit" value="Guardar" class="btn btn-success">
</form>