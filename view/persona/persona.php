<?php
if(!empty($_SESSION["userId"])) {
    switch($_SESSION["rol"]){
        case 1:
       
        break;

        case 2:
        
        break;

        default:
        echo "Algo salio mal...";
    }
} else {
    require_once './view/login-form.php';
}
?>

<h1 class="page-header">Personas</h1>

<div class="well well-sm text-right">
    <a class="btn btn-danger" href="?c=Persona&a=Crud">Nueva persona</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">id Persona</th>
            <th style="width:120px;">C.C</th>
            <th style="width:120px;">Nombre</th>
            <th style="width:120px;">Apellido</th>
            <th style="width:120px;">Sexo</th>
            <th style="width:120px;">Nacimiento</th>
            <th style="width:200px;">Direccion</th>
            <th style="width:120px;">Telefono</th>
            <th>Email</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->id_persona; ?></td>
            <td><?php echo $r->cc; ?></td>
            <td><?php echo $r->nombre; ?></td>
            <td><?php echo $r->apellido; ?></td>
            <td><?php echo $r->sexo == 1 ? 'Hombre' : 'Mujer'; ?></td>
            <td><?php echo $r->fechaNacimiento; ?></td>
            <td><?php echo $r->direccion; ?></td>
            <td><?php echo $r->telefono; ?></td>
            <td><?php echo $r->email; ?></td>
            
            <td>
                <a href="?c=Persona&a=Crud&id_persona=<?php echo $r->id_persona; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Persona&a=Eliminar&id_persona=<?php echo $r->id_persona; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 