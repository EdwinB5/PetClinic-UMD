<h1 class="page-header">
    <?php echo $var->id_persona != null ? $var->nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Persona">Personas</a></li>
  <li class="active"><?php echo $var->id_persona != null ? $var->nombre : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-persona" action="?c=Persona&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_persona" value="<?php echo $var->id_persona; ?>" />

    <div class="form-group">
        <label>C.C</label>
        <input type="text" name="cc" value="<?php echo $var->cc; ?>" class="form-control" placeholder="Ingrese su cc" data-validacion-tipo="requerido|min:8" />
    </div>
    
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="Nombre" value="<?php echo $var->nombre; ?>" class="form-control" placeholder="Ingrese su nombre" data-validacion-tipo="requerido|min:3" />
    </div>
    
    <div class="form-group">
        <label>Apellido</label>
        <input type="text" name="Apellido" value="<?php echo $var->apellido; ?>" class="form-control" placeholder="Ingrese su apellido" data-validacion-tipo="requerido|min:3" />
    </div>

    <div class="form-group">
        <label>Sexo</label>
        <select name="Sexo" class="form-control">
            <option <?php echo $var->sexo == 1 ? 'selected' : ''; ?> value="1">Masculino</option>
            <option <?php echo $var->sexo == 2 ? 'selected' : ''; ?> value="2">Femenino</option>
        </select>
    </div>

    <div class="form-group">
        <label>Fecha de nacimiento</label>
        <input readonly type="text" name="FechaNacimiento" value="<?php echo $var->fechaNacimiento; ?>" class="form-control datepicker" placeholder="Ingrese su fecha de nacimiento" data-validacion-tipo="requerido" />
    </div>

    <div class="form-group">
        <label>Direccion</label>
        <input type="text" name="Direccion" value="<?php echo $var->direccion; ?>" class="form-control" placeholder="Ingrese su direccion" data-validacion-tipo="requerido|min:3" />
    </div>

    <div class="form-group">
        <label>Telefono</label>
        <input type="text" name="Telefono" value="<?php echo $var->telefono; ?>" class="form-control" placeholder="Ingrese su telefono" data-validacion-tipo="requerido|min:8" />
    </div>
    
    <div class="form-group">
        <label>Correo</label>
        <input type="text" name="Correo" value="<?php echo $var->email; ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" />
    </div>
    
    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-primary">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-persona").submit(function(){
            return $(this).validate();
        });
    })
</script>