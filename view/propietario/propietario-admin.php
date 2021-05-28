<h1 class="page-header">Propietarios</h1>

<div class="well well-sm text-right">
    <a class="btn btn-danger" href="?c=Propietario&a=Crud">Nuevo propietario</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:120px;">id Persona</th>
            <th style="width:100px;">CC</th>
            <th style="width:120px;">Apellido</th>
            <th style="width:120px;">id Mascota</th>
            <th style="width:200px;">Nombre mascota</th>
            <th style="width:160px;">Tipo</th>
            <th style="width:160px;">Especie</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->id_persona; ?></td>
            <td><?php echo $r->cc; ?></td>
            <td><?php echo $r->apellido; ?></td>
            <td><?php echo $r->id_mascota; ?></td>
            <td><?php echo $r->nombre; ?></td>
            <td><?php echo $r->tipo; ?></td>
            <td><?php echo $r->especie; ?></td>
            
            <td>
                <a href="?c=Propietario&a=Crud&id_propietario=<?php echo $r->id_propietario; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Propietario&a=Eliminar&id_propietario=<?php echo $r->id_propietario; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>