<?php
require_once 'model/veterinario.php';

class VeterinarioController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Veterinario();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/veterinario/veterinario.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $var = new Veterinario();
        
        if(isset($_REQUEST['id_veterinario'])){
            $var = $this->model->Obtener($_REQUEST['id_veterinario']);
        }
        
        require_once 'view/header.php';
        require_once 'view/veterinario/veterinario-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $var = new Veterinario();
        
        $var->id_veterinario = $_REQUEST['id_veterinario'];
        $var->id_persona = $_REQUEST['id_persona'];
        $var->especialidad = $_REQUEST['Especialidad'];

        $var->id_veterinario > 0 
            ? $this->model->Actualizar($var)
            : $this->model->Registrar($var);
        
        header('Location: index_1.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id_veterinario']);
        header('Location: index_1.php');
    }
}