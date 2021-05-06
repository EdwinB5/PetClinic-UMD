<h1 class="page-header">
    <?php echo $var->id_propietario != null ? $var->apellido : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Propietario">Propietarios</a></li>
  <li class="active"><?php echo $var->id_propietario != null ? $var->apellido : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-veterinario" action="?c=Propietario&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_propietario" value="<?php echo $var->id_propietario; ?>" />

    <div class="form-group">
        <label>id Persona</label>
        <input type="text" name="id_persona" value="<?php echo $var->id_persona; ?>" class="form-control" placeholder="Ingrese el id de la persona" data-validacion-tipo="requerido|min:1" />
    </div>

    <div class="form-group">
        <label>id Mascota</label>
        <input type="text" name="id_mascota" value="<?php echo $var->id_mascota; ?>" class="form-control" placeholder="Ingrese el id de la mascota" data-validacion-tipo="requerido|min:1" />
    </div>

    <hr />
    
    <div class="text-right">
        <button class="btn btn-primary">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-veterinario").submit(function(){
            return $(this).validate();
        });
    })
</script>