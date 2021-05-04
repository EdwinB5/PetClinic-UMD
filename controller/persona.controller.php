<?php
require_once 'model/persona.php';

class PersonaController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Persona();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/persona/persona.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $var = new Persona();
        
        if(isset($_REQUEST['id_persona'])){
            $var = $this->model->Obtener($_REQUEST['id_persona']);
        }
        
        require_once 'view/header.php';
        require_once 'view/persona/persona-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $var = new Persona();
        
        $var->id_persona = $_REQUEST['id_persona'];
        $var->cc = $_REQUEST['cc'];
        $var->nombre = $_REQUEST['Nombre'];
        $var->apellido = $_REQUEST['Apellido'];
        $var->sexo = $_REQUEST['Sexo'];
        $var->fechaNacimiento = $_REQUEST['FechaNacimiento'];
        $var->direccion = $_REQUEST['Direccion'];
        $var->telefono = $_REQUEST['Telefono'];
        $var->email = $_REQUEST['Correo'];

        $var->id_persona > 0 
            ? $this->model->Actualizar($var)
            : $this->model->Registrar($var);
        
        header('Location: index.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id_persona']);
        header('Location: index.php');
    }
}