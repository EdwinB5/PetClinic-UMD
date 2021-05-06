<?php
class Propietario
{
	private $pdo;

	public $id_propietario;
	public $id_persona;
	public $id_mascota;
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

			$stm = $this->pdo->prepare("SELECT id_propietario,id_persona,cc,apellido,id_mascota,mascotas.nombre,tipo,especie FROM propietarios INNER JOIN personas USING (id_persona) INNER JOIN mascotas USING (id_mascota)");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id_propietario)
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT id_propietario,id_persona,cc,apellido,id_mascota,mascotas.nombre,tipo,especie FROM propietarios INNER JOIN personas USING (id_persona) INNER JOIN mascotas USING (id_mascota) WHERE id_propietario = ?");

			$stm->execute(array($id_propietario));
			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id_propietario)
	{
		try 
		{
			$stm = $this->pdo->prepare("DELETE FROM propietarios WHERE id_propietario = ?");			          

			$stm->execute(array($id_propietario));
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
			$sql = "UPDATE propietarios SET
						id_persona = ?, 
						id_mascota = ? 
				    WHERE id_propietario = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
				    	$data->id_persona,
                        $data->id_mascota, 
                        $data->id_propietario
					)
				);
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Propietario $data)
	{
		try 
		{
			$sql = "INSERT INTO propietarios (id_persona,id_mascota,fechaRegistro) 
			        VALUES (?, ?, ?)";

			$this->pdo->prepare($sql)
			     ->execute(
					array(
	                    $data->id_persona,
	                    $data->id_mascota,
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