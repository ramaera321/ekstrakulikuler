<?php
class M_login extends CI_Model{

private $_table="user";


  function validate($username,$password){
    $this->db->where('Username',$username);
    $this->db->where('Password',$password);
    $result = $this->db->get($this->_table,1);
    return $result;
  }

}
