<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Esqueceu_senha extends CI_Controller{
    public function __construct(){
        parent ::__construct();
        $this->load->model('Usuario_model');
    }
    
    public function index(){
        $this->load->view('esqueceu_senha_view');
    }

    public function trocar_senha(){
        $email=$this->input->post('email',TRUE);
        $nova_senha=md5($this->input->post('password',TRUE));
        $usuario=$this->Usuario_model->buscar_por_email($email);

        if($usuario){
            $data=[
            'email'=>$email,
            'senha'=>$nova_senha
        ];
            $this->Usuario_model->atualizar_senha($usuario['id'],$data);
            redirect('login');
        }
        else{
            $this->session->set_flashdata('erro','Email não cadastrado');
            redirect('esqueceu_senha');
        }
    }
}