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
LIMIT 1000");
      $i = 0;
        foreach ($query->result_array() as $row)
        {
           $data[$i] = array($row['fecha'],$row[$serie]);
           $i++;
        }
        return $data;
  }



	
}