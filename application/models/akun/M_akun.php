<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_akun extends CI_Model
{
    private $_table = "user";

       // public $Id;
       //  public $Nama;
       //  public $Username;
       //  public $Password;
       //  public $Level;
    
 
 public function rules()
    {
         
    return [
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'user',
            'label' => 'Username',
            'rules' => 'required|min_length[5]|is_unique[user.username]'],
            
            ['field' => 'pass',
            'label' => 'Password',
            'rules' => 'required|min_length[5]'],
            
            ['field' => 'rpass',
            'label' => 'Konfirmasi Password',
            'rules' => 'required|matches[pass]'],

            ['field' => 'level',
            'label' => 'Level',
            'rules' => 'required']
            
        ];

    }


    public function rules_edit()
    {
         
    return [
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'user',
            'label' => 'Username',
            'rules' => 'required|min_length[5]|callback_username_check'],
            
            ['field' => 'pass',
            'label' => 'Password',
            'rules' => 'min_length[5]'],
            
            ['field' => 'rpass',
            'label' => 'Konfirmasi Password',
            'rules' => 'matches[pass]'],

            ['field' => 'level',
            'label' => 'Level',
            'rules' => 'required']
            
        ];

    }

    

 
  
   public function page($number,$offset){
        return $this->db->get($this->_table,$number,$offset)->result();       
    }
 
   public function jumlah_data(){
        return $this->db->get($this->_table)->num_rows();
    }
    
    public function getById($id_user)
    {
        return $this->db->get_where($this->_table, ["Id_user" => $id_user])->row();
    }

    public function saveakun()
    {
        $post = $this->input->post(null, TRUE);
   //   $this->Id_ekstra = ;
        $this->Nama = $post["nama"];
		$this->Username= $post["user"];
        $this->Password= md5($post["pass"]);
        $this->Level= $post["level"];
       $this->db->insert($this->_table, $this);
    }

    public function update()
    {


        $post = $this->input->post(null, TRUE);
        $Id_user=$post['id_user'];
        $update['Nama']=$post['nama'];
        $update['Username']=$post['user'];
        //$this->Id = $post["id"];
        //$this->Nama = $post["nama"];
        //$this->Username = $post["user"];
        if (!empty($post['pass'])) {
             $update['Password']= md5($post['pass']);
        }
       
		$update['Level'] = $post['level'];
        $this->db->where('Id_user',$Id_user);
        $this->db->update($this->_table, $update);
    
    }

    public function delete($id_user)
    {
		//$this->_deleteImage($id);
        return $this->db->delete($this->_table, array("Id_user" => $id_user));
	}

}
