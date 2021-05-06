<h1 class="page-header">
    <?php echo $var->id_veterinario != null ? $var->nombre : 'Nuevo Veterinario'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Veterinario">Veterinarios</a></li>
  <li class="active"><?php echo $var->id_veterinario != null ? $var->nombre : 'Nuevo Veterinario'; ?></li>
</ol>

<form id="frm-veterinario" action="?c=Veterinario&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_veterinario" value="<?php echo $var->id_veterinario; ?>" />

    <div class="form-group">
        <label>id Persona</label>
        <input type="text" name="id_persona" value="<?php echo $var->id_persona; ?>" class="form-control" placeholder="Ingrese el id de la persona" data-validacion-tipo="requerido|min:1" />
    </div>

    <div class="form-group">
        <label>Especialidad</label>
        <input type="text" name="Especialidad" value="<?php echo $var->especialidad; ?>" class="form-control" placeholder="Ingrese su especialidad" data-validacion-tipo="requerido|min:5" />
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