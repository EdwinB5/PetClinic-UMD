<?php
class Historial_visita
{
	private $pdo;

	public $id_visita;
	public $id_mascota;
	public $id_veterinario;
	public $fechaVisita;
	public $descripcion;
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

			$stm = $this->pdo->prepare("SELECT id_visita,id_veterinario, especialidad, id_mascota, nombre, tipo, especie, fechaVisita, descripcion FROM historial_visita_mascota INNER JOIN veterinarios USING (id_veterinario) INNER JOIN mascotas USING(id_mascota)");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id_visita)
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT id_visita,id_veterinario, especialidad, id_mascota, nombre, tipo, especie, fechaVisita, descripcion  FROM historial_visita_mascota INNER JOIN veterinarios USING (id_veterinario) INNER JOIN mascotas USING(id_mascota) WHERE id_visita = ?");

			$stm->execute(array($id_visita));
			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id_visita)
	{
		try 
		{
			$stm = $this->pdo->prepare("DELETE FROM historial_visita_mascota WHERE id_visita = ?");			          

			$stm->execute(array($id_visita));
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
			$sql = "UPDATE historial_visita_mascota SET
						id_mascota = ?, 
						id_veterinario = ?,
						fechaVisita = ?,
						descripcion = ? 
				    WHERE id_visita = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
				    	$data->id_mascota,
                        $data->id_veterinario, 
                        $data->fechaVisita,
                        $data->descripcion,
                        $data->id_visita
					)
				);
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Historial_visita $data)
	{
		try 
		{
			$sql = "INSERT INTO historial_visita_mascota (id_mascota,id_veterinario,fechaVisita,descripcion,fechaRegistro) 
			        VALUES (?, ?, ?, ?, ?)";

			$this->pdo->prepare($sql)
			     ->execute(
					array(
	                    $data->id_mascota,
	                    $data->id_veterinario,
	                    $data->fechaVisita,
	                    $data->descripcion,
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