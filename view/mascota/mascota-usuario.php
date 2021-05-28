<h1 class="page-header">Mascotas</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:120px;">id Mascota</th>
            <th style="width:120px;">Nombre</th>
            <th style="width:120px;">Sexo</th>
            <th style="width:120px;">Nacimiento</th>
            <th style="width:160px;">Tipo</th>
            <th style="width:160px;">Especie</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->id_mascota; ?></td>
            <td><?php echo $r->nombre; ?></td>
            <td><?php echo $r->sexo == 1 ? 'Macho' : 'Hembra'; ?></td>
            <td><?php echo $r->fechaNacimiento; ?></td>
            <td><?php echo $r->tipo; ?></td>
            <td><?php echo $r->especie; ?></td>
            
            <td>
                <a href="?c=Mascota&a=Crud&id_mascota=<?php echo $r->id_mascota; ?>">Editar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
