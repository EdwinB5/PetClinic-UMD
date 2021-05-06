<?php
class Mascota
{
	private $pdo;

	public $id_mascota;
	public $nombre;
	public $sexo;
	public $fechaNacimiento;
	public $tipo;
	public $especie;
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

			$stm = $this->pdo->prepare("SELECT * FROM mascotas");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id_mascota)
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM mascotas WHERE id_mascota = ?");

			$stm->execute(array($id_mascota));
			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id_mascota)
	{
		try 
		{
			$stm = $this->pdo->prepare("DELETE FROM mascotas WHERE id_mascota = ?");			          

			$stm->execute(array($id_mascota));
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
			$sql = "UPDATE mascotas SET
						nombre = ?,
                        sexo = ?,
						fechaNacimiento = ?, 
						tipo = ?,
						especie = ?
				    WHERE id_mascota = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->nombre, 
                        $data->sexo,
                        $data->fechaNacimiento,
                        $data->tipo,
                        $data->especie,
                        $data->id_mascota
					)
				);
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Mascota $data)
	{
		try 
		{
			$sql = "INSERT INTO mascotas (nombre,sexo,fechaNacimiento,tipo,especie,fechaRegistro) 
			        VALUES (?, ?, ?, ?, ?, ?)";

			$this->pdo->prepare($sql)
			     ->execute(
					array(
	                    $data->nombre,
	                    $data->sexo, 
	                    $data->fechaNacimiento,
	                    $data->tipo,
	                    $data->especie,
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