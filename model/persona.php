<?php
class Persona
{
	private $pdo;

	public $id_persona;
	public $cc;
	public $nombre;
	public $apellido;
	public $sexo;
	public $fechaNacimiento;
	public $direccion;
	public $telefono;
	public $email;
	#public $rolUsuario;
	#public $contraseñaUsuario;
	#public $tipoUsuario;
	public $fechaRegistro;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM personas");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id_persona)
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM personas WHERE id_persona = ?");

			$stm->execute(array($id_persona));
			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id_persona)
	{
		try 
		{
			$stm = $this->pdo->prepare("DELETE FROM personas WHERE id_persona = ?");			          

			$stm->execute(array($id_persona));
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE personas SET
						cc = ?, 
						nombre = ?, 
						apellido = ?,
                        sexo = ?,
						fechaNacimiento = ?, 
						direccion = ?,
						telefono = ?,
						email = ?
				    WHERE id_persona = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
				    	$data->cc,
                        $data->nombre, 
                        $data->apellido,
                        $data->sexo,
                        $data->fechaNacimiento,
                        $data->direccion,
                        $data->telefono,
                        $data->email,
                        $data->id_persona
					)
				);
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Persona $data)
	{
		try 
		{
		$sql = "INSERT INTO personas (cc,nombre,apellido,sexo,fechaNacimiento,direccion,telefono,email,fechaRegistro) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->cc,
                    $data->nombre,
                    $data->apellido, 
                    $data->sexo, 
                    $data->fechaNacimiento,
                    $data->direccion,
                    $data->telefono,
                    $data->email,
                    date('Y-m-d')
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}