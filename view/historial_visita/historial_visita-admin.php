<h1 class="page-header">Historial visitas</h1>

<div class="well well-sm text-right">
    <a class="btn btn-danger" href="?c=Historial_visita&a=Crud">Nueva visita</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:120px;">id Veterinario</th>
            <th style="width:120px;">Especialidad</th>
            <th style="width:120px;">id Mascota</th>
            <th style="width:160px;">Nombre mascota</th>
            <th style="width:90px;">Tipo</th>
            <th style="width:90px;">Especie</th>
            <th style="width:120px;">Fecha visita</th>
            <th style="width:300px;">Descripcion</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->id_veterinario; ?></td>
            <td><?php echo $r->especialidad; ?></td>
            <td><?php echo $r->id_mascota; ?></td>
            <td><?php echo $r->nombre; ?></td>
            <td><?php echo $r->tipo; ?></td>
            <td><?php echo $r->especie; ?></td>
            <td><?php echo $r->fechaVisita; ?></td>
            <td><?php echo $r->descripcion; ?></td>
            
            <td>
                <a href="?c=Historial_visita&a=Crud&id_visita=<?php echo $r->id_visita; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Historial_visita&a=Eliminar&id_visita=<?php echo $r->id_visita; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
