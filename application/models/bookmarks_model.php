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

  function totalResultados($query){
    $this->db->like('titulo', $query);
    $this->db->or_like('url', $query);
    $query = $this->db->get('bookmarks');
    return $query->num_rows();
  }



	
}