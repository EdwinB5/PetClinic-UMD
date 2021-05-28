<?php
require_once 'model/historial_visita.php';

class Historial_visitaController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Historial_visita();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/historial_visita/historial_visita.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $var = new Historial_visita();
        
        if(isset($_REQUEST['id_visita'])){
            $var = $this->model->Obtener($_REQUEST['id_visita']);
        }
        
        require_once 'view/header.php';
        require_once 'view/historial_visita/historial_visita-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $var = new Historial_visita();
        
        $var->id_visita = $_REQUEST['id_visita'];
        $var->id_mascota = $_REQUEST['id_mascota'];
        $var->id_veterinario = $_REQUEST['id_veterinario'];
        $var->fechaVisita = $_REQUEST['FechaVisita'];
        $var->descripcion = $_REQUEST['Descripcion'];

        $var->id_visita > 0 
            ? $this->model->Actualizar($var)
            : $this->model->Registrar($var);
        
        header('Location: historial.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id_visita']);
        header('Location: historial.php');
    }
}