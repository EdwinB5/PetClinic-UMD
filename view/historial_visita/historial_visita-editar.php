<h1 class="page-header">
    <?php echo $var->id_visita != null ? $var->nombre : 'Nueva Visita'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Historial_visita">Historial visitas</a></li>
  <li class="active"><?php echo $var->id_visita != null ? $var->nombre : 'Nueva Visita'; ?></li>
</ol>

<form id="frm-historial" action="?c=Historial_visita&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_visita" value="<?php echo $var->id_visita; ?>" />
    
    <div class="form-group">
        <label>id Veterinario</label>
        <input type="text" name="id_veterinario" value="<?php echo $var->id_veterinario; ?>" class="form-control" placeholder="Ingrese el id del veterinario" data-validacion-tipo="requerido|min:1" />
    </div>

    <div class="form-group">
        <label>id Mascota</label>
        <input type="text" name="id_mascota" value="<?php echo $var->id_mascota; ?>" class="form-control" placeholder="Ingrese el id de la mascota" data-validacion-tipo="requerido|min:1" />
    </div>
    

    <div class="form-group">
        <label>Fecha de visita</label>
        <input readonly type="text" name="FechaVisita" value="<?php echo $var->fechaVisita; ?>" class="form-control datepicker" placeholder="Ingrese la fecha de la visita" data-validacion-tipo="requerido" />
    </div>

    <div class="form-group">
        <label>Descripcion visita</label>
        <input type="text" name="Descripcion" value="<?php echo $var->descripcion; ?>" class="form-control" placeholder="Ingrese el tipo de la mascota" data-validacion-tipo="requerido|min:5" />
    </div>
    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-primary">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-historial").submit(function(){
            return $(this).validate();
        });
    })
</script>