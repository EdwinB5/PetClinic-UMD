<?php
class Veterinario
{
	private $pdo;

	public $id_veterinario;
	public $id_persona;
	public $nombre;
	public $apellido;
	public $email;
	public $especialidad;
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

			$stm = $this->pdo->prepare("SELECT id_veterinario,id_persona,nombre,apellido,email, especialidad FROM veterinarios INNER JOIN personas USING (id_persona)");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id_veterinario)
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT id_veterinario,id_persona,nombre,apellido,email, especialidad FROM veterinarios INNER JOIN personas USING (id_persona) WHERE id_veterinario = ?");

			$stm->execute(array($id_veterinario));
			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id_veterinario)
	{
		try 
		{
			$stm = $this->pdo->prepare("DELETE FROM veterinarios WHERE id_veterinario = ?");			          

			$stm->execute(array($id_veterinario));
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
			$sql = "UPDATE veterinarios SET
						id_persona = ?,
						especialidad = ?
				    WHERE id_veterinario = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
				    	#$data->nombre,
				    	#$data->apellido,
				    	#$data->email,
				    	$data->id_persona,
                        $data->especialidad,
                        $data->id_veterinario
					)
				);
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Veterinario $data)
	{
		try 
		{
			$sql = "INSERT INTO veterinarios (id_persona,especialidad,fechaRegistro) 
		        	VALUES (?,?,?)";
			$this->pdo->prepare($sql)
		    	 ->execute(
					array(
						$data->id_persona,
                    	$data->especialidad,
                    	date('Y-m-d')
                	)
				);
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}