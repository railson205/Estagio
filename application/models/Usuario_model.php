<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

    public function buscar_por_email($email) {
        //Help:Procura no banco de dados na tabela 'usuarios' na coluna 'email' o valor em $email e retorna a linha como array
        return $this->db->get_where('usuarios', ['email' => $email])->row_array();
    }

    public function criar_usuario($email, $senha) {
        //Help:Insere um novo usuário na tabela 'usuarios' com os dados fornecidos
        $data = [
            'email' => $email,
            'senha' => $senha
        ];
        return $this->db->insert('usuarios', $data);
    }

    public function atualizar_senha($id,$data){
        $this->db->where('id',$id);
        return $this->db->update('usuarios',$data);
        
    }
}
?>