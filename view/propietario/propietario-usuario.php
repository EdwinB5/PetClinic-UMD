<h1 class="page-header">Propietarios</h1>

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
    
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>