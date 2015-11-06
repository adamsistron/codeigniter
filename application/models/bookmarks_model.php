<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Bookmarks_Model extends CI_Model {

    /*var $title   = '';
    var $content = '';
    var $date    = '';*/
    

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();

    }

  function guardar($data){
  	$this->db->insert('bookmarks', $data);
  }

  function verTodo($limite = 0){
  	$query = $this->db->get('bookmarks');
  	if ($query->num_rows() > 0){
  		return $query;
  	}else{
  		return FALSE;
  	}
  }

  function buscar($query) {
    $this->db->like('titulo', $query);
    $this->db->or_like('url', $query);
    $query = $this->db->get('bookmarks');
    if ($query->num_rows() > 0){
      return $query;
    }else{
      return FALSE;
    }
  }

  function eliminarId($id){
    $this->db->where('id', $id);
    $this->db->delete('bookmarks');
  }
  
  function obtenerEnlace($id){
      $this->db->where('id', $id);
      $query = $this->db->get('bookmarks');
      if ($query->num_rows() > 0){
          return $query;
      }else{
          return FALSE;
      }
      
  }
  
  function editarEnlace($id, $data){
      $this->db->where('id', $id);
      $this->db->update('bookmarks', $data);
            
  }
  
  function totalResultados($query){
    $this->db->like('titulo', $query);
    $this->db->or_like('url', $query);
    $query = $this->db->get('bookmarks');
    return $query->num_rows();
  }
  
  function obtenerStockDatosCompare($serie){
   
      
      //$query1 = $this->db->query('SELECT UNIX_TIMESTAMP(fecha) as fecha, cantidad1, cantidad2, cantidad3 FROM codeigniter.compare LIMIT 100;');
      $query = $this->db->query("SELECT UNIX_TIMESTAMP(CONVERT_TZ(fecha,'+00:00', @@session.time_zone))*1000 as fecha, round($serie,2) as $serie FROM codeigniter.compare WHERE fecha > '2010-01-01'
");
      $i = 0;
        foreach ($query->result_array() as $row)
        {
           $data[$i] = array($row['fecha'],$row[$serie]);
           $i++;
        }
        return $data;
  }
  function obtenerStockDatosCompareDespachos($condicion){
   //echo $condicion;die();
       
        if($condicion == 'programados')
            {
                $AND_despachos='';
            }elseif($condicion == 'despachados') 
            {
                $AND_despachos='AND despachado = 1';
            }elseif($condicion == 'anulados') 
            {
                $AND_despachos='AND despachado = 0';
            }
      
      $db=$this->load->database('scli',TRUE);
      $planta = "Bajo Grande";
      $sql = "
            SELECT
            fecha_programada, date_part('epoch',fecha_programada)*1000::int AS fecha,
            count(DISTINCT codigo_sap_despacho) AS despachado  
            FROM 
            scli_stagin
            WHERE            
            planta_distribucion = 'Planta Dist. $planta'
            $AND_despachos
            GROUP BY fecha_programada
            ORDER BY fecha_programada ASC
            ";
      $query = $db->query($sql);
      
      $i = 0;
      $data = array(0,0);
        foreach ($query->result_array() as $row)
        {
           $data[$i] = array($row['fecha'],$row['despachado']);
           $i++;
        }
        return $data;
  }
  function obtenerStockDatosCompareVolumen($condicion){

       $planta = "";
       //CONDICION DE LA PLANTA
       if($planta <> ''){
            $where = "WHERE            
            planta_distribucion = 'Planta Dist. $planta'";
       }  else {
            $where = "";
       }
       //SELECCION DE COLUMNA PARA HACER EL QUERY Y GRAFICAR LA SERIE
        if($condicion == 'programados')
            {
                $volumen='nu_volumen_programado';
            }elseif($condicion == 'despachados') 
            {
                $volumen='COALESCE(nu_volumen_bruto_despachado, null, 0)';
            }elseif($condicion == 'diferencia') 
            {
                $volumen='nu_volumen_programado-COALESCE(nu_volumen_bruto_despachado, null, 0)';
            }
            
            $db=$this->load->database('scli',TRUE);
            
            $sql = "
            SELECT 
            fecha_programada, date_part('epoch',fecha_programada)*1000::int AS fecha,
            SUM($volumen) AS volumen   
            FROM 
            scli_stagin
            $where
            GROUP BY fecha_programada
            ORDER BY fecha_programada ASC
            ";
            
            $query = $db->query($sql);
            
            $i = 0;
            
            $data = array(0,0);
            
            foreach ($query->result_array() as $row)
                {
                $data[$i] = array($row['fecha'],$row['volumen']);
                $i++;
                }
                return $data;
  }
  
  function obtenerEstados(){
      
      $db=$this->load->database('scli',TRUE);
      
      $sql = "
            SELECT DISTINCT 
            co_estado AS valor, estado AS llave  
            FROM 
            dim_cliente_mena
            WHERE 
            estado IS NOT NULL
            ORDER BY estado;
        ";
      
      $query = $db->query($sql);
      
      if ($query->num_rows() > 0){
  		return $query;
  	}else{
  		return FALSE;
  	}
              
  }



	
}