<?php
require_once 'model/mascota.php';

class MascotaController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Mascota();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/mascota/mascota.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $var = new Mascota();
        
        if(isset($_REQUEST['id_mascota'])){
            $var = $this->model->Obtener($_REQUEST['id_mascota']);
        }
        
        require_once 'view/header.php';
        require_once 'view/mascota/mascota-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $var = new Mascota();
        
        $var->id_mascota = $_REQUEST['id_mascota'];
        $var->nombre = $_REQUEST['Nombre'];
        $var->sexo = $_REQUEST['Sexo'];
        $var->fechaNacimiento = $_REQUEST['FechaNacimiento'];
        $var->tipo = $_REQUEST['Tipo'];
        $var->especie = $_REQUEST['Especie'];

        $var->id_mascota > 0 
            ? $this->model->Actualizar($var)
            : $this->model->Registrar($var);
        
        header('Location: index_2.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id_mascota']);
        header('Location: index_2.php');
    }
}