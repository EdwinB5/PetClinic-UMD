<h1 class="page-header">Veterinarios</h1>

<div class="well well-sm text-right">
    <a class="btn btn-danger" href="?c=Veterinario&a=Crud">Nuevo veterinario</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:100px;">id Persona</th>
            <th style="width:120px;">id Veterinario</th>
            <th style="width:120px;">Nombre</th>
            <th style="width:120px;">Apellido</th>
            <th>Email</th>
            <th style="width:225px;">Especialidad</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->id_persona; ?></td>
            <td><?php echo $r->id_veterinario; ?></td>
            <td><?php echo $r->nombre; ?></td>
            <td><?php echo $r->apellido; ?></td>
            <td><?php echo $r->email; ?></td>
            <td><?php echo $r->especialidad; ?></td>
            
            <td>
                <a href="?c=Veterinario&a=Crud&id_veterinario=<?php echo $r->id_veterinario; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Veterinario&a=Eliminar&id_veterinario=<?php echo $r->id_veterinario; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
