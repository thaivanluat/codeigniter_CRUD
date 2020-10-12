<?php

class EmployeeModel extends CI_Model{



    public function getEmployee() {    
        $query = $this->db->get("users");
        return $query->result();
    }

    public function insertEmployee() {
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'address' => $this->input->post('address')
        );

        return $this->db->insert('users', $data);
    }

    public function updateEmployee($id) {
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'address' => $this->input->post('address')
        );

        $this->db->where('id',$id);
        return $this->db->insert('users', $data);
    }

    public function deleteEmployee($id) {
        $this->db->where('id', $id);
        return $this->db->delete('users');
    }
}

?>