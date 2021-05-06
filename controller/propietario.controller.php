<?php
require_once 'model/propietario.php';

class PropietarioController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Propietario();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/propietario/propietario.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $var = new Propietario();
        
        if(isset($_REQUEST['id_propietario'])){
            $var = $this->model->Obtener($_REQUEST['id_propietario']);
        }
        
        require_once 'view/header.php';
        require_once 'view/propietario/propietario-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $var = new Propietario();
        
        $var->id_propietario = $_REQUEST['id_propietario'];
        $var->id_persona = $_REQUEST['id_persona'];
        $var->id_mascota = $_REQUEST['id_mascota'];

        $var->id_propietario > 0 
            ? $this->model->Actualizar($var)
            : $this->model->Registrar($var);
        
        header('Location: index_3.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id_propietario']);
        header('Location: index_3.php');
    }
}