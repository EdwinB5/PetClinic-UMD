<?php
if(!empty($_SESSION["userId"])) {
    switch($_SESSION["rol"]){
        case 1:
        require_once 'mascota-admin.php';
        break;

        case 2:
        require_once 'mascota-usuario.php';
        break;

        default:
        echo "Algo salio mal...";
    }
} else {
    require_once './view/login-form.php';
}
?>