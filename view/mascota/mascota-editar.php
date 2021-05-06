<h1 class="page-header">
    <?php echo $var->id_mascota != null ? $var->nombre : 'Nueva Mascota'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Mascota">Mascotas</a></li>
  <li class="active"><?php echo $var->id_mascota != null ? $var->nombre : 'Nueva Mascota'; ?></li>
</ol>

<form id="frm-mascota" action="?c=Mascota&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_mascota" value="<?php echo $var->id_mascota; ?>" />
    
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="Nombre" value="<?php echo $var->nombre; ?>" class="form-control" placeholder="Ingrese el nombre de la mascota" data-validacion-tipo="requerido|min:3" />
    </div>
    
    <div class="form-group">
        <label>Sexo</label>
        <select name="Sexo" class="form-control">
            <option <?php echo $var->sexo == 1 ? 'selected' : ''; ?> value="1">Macho</option>
            <option <?php echo $var->sexo == 2 ? 'selected' : ''; ?> value="2">Hembra</option>
        </select>
    </div>

    <div class="form-group">
        <label>Fecha de nacimiento</label>
        <input readonly type="text" name="FechaNacimiento" value="<?php echo $var->fechaNacimiento; ?>" class="form-control datepicker" placeholder="Ingrese la fecha de nacimiento de la mascota" data-validacion-tipo="requerido" />
    </div>

    <div class="form-group">
        <label>Tipo</label>
        <input type="text" name="Tipo" value="<?php echo $var->tipo; ?>" class="form-control" placeholder="Ingrese el tipo de la mascota" data-validacion-tipo="requerido|min:3" />
    </div>

    <div class="form-group">
        <label>Especie</label>
        <input type="text" name="Especie" value="<?php echo $var->especie; ?>" class="form-control" placeholder="Ingrese la especie de la mascota" data-validacion-tipo="requerido|min:3" />
    </div>
    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-primary">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-mascota").submit(function(){
            return $(this).validate();
        });
    })
</script>