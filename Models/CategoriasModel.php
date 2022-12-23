<?php 
 class CategoriasModel extends Mysql{
    //Propiedades tabla categoria
    public $intIdcategoria;
    public $strCategoria;
    public $strDescripcion;
    public $strPortada;
    public $intStatus;

     public function __construct(){
         parent::__construct();
     }

     public function insertCategoria(string $nombre, string $descripcion, string $portada, int $status){

        $return = 0;
        $this->strCategoria = $nombre;
        $this->strDescripcion = $descripcion;
        $this->strPortada = $portada;
        $this->intStatus = $status;
        //Verificar si ya existe la categoria ingresada y no tener duplicados
        $sql = "SELECT * FROM categoria WHERE nombre = '{$this->strCategoria}' ";
        $request = $this->select_all($sql);
        //En caso de no existir la categoria, será ingresada
        if(empty($request)){
            $query_insert  = "INSERT INTO categoria(nombre,descripcion,portada,status) VALUES(?,?,?,?)";
            $arrData = array(
                $this->strCategoria,
                $this->strDescripcion,
                $this->strPortada,
                $this->intStatus
            );//Cierre array
            $request_insert = $this->insert($query_insert,$arrData);
            $return = $request_insert;
        }else{
            $return = "exist";
        }
        return $return;
    }

    public function selectCategorias() {
		$sql = "SELECT * FROM categoria 
				WHERE status != 0 ";
		$request = $this->select_all($sql);
		return $request;
	}

    public function selectCategoria(int $idcategoria){
        $this->intIdcategoria = $idcategoria;
        $sql = "SELECT * FROM categoria 
        WHERE idcategoria = $this->intIdcategoria";
        $request =$this->select($sql);
        return $request;

    }

     
     
 }
 ?>