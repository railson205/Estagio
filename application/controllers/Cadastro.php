<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro extends CI_Controller{
    public function __construct(){
        parent ::__construct();
        $this->load->model('Usuario_model');
    }
    
    public function index(){
        $this->load->view('cadastro_view');
    }

    public function autenticar(){
        $email=$this->input->post('email',TRUE);
        $senha=md5($this->input->post('password',TRUE));

        $usuario=$this->Usuario_model->buscar_por_email($email);

        
        if (!$usuario){
            //Cria novo usuário
            $this->Usuario_model->criar_usuario($email,$senha);
            //Salva o novo usuário na sessão
            $this->session->set_userdata([
                'usuario_id' => $usuario['id'],
                'usuario_nome' => $usuario['nome'],
                'logado' => TRUE
            ]);
            // Redireciona para área restrita
            redirect('dashboard'); 
        }else{
            //Usuário já existe
            $this->session->set_flashdata('erro', 'Email já cadastrado');
            redirect('cadastro');
        }
    }
}