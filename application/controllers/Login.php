<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	//Help:Define o construtor da classe carregando o modelo Usuario_model
    public function __construct() {
        parent::__construct();
        $this->load->model('Usuario_model');
    }

	//Help:Define o método chamado por padrão quando o controller é acessado
    public function index() {
        // Mostra a tela de login
        $this->load->view('login_view');
    }

    public function autenticar() {
		//Help:Coleta os dados com base no name de cada input do formulário
        $email = $this->input->post('email', TRUE);
		//Help:md5() criptografa a senha para código hash
        $senha = md5($this->input->post('password', TRUE));

		//Help:Chama o método do modelo para buscar o usuário pelo email no banco de dados
        $usuario = $this->Usuario_model->buscar_por_email($email);
		

        if ($usuario && $senha===$usuario['senha']) {
            // Login válido
			//Help:Define os dados da sessão para o usuário logado
            $this->session->set_userdata([
                'usuario_id' => $usuario['id'],
                'usuario_nome' => $usuario['nome'],
                'logado' => TRUE
            ]);
			//Help:Redireciona para o dashboard após o login
            redirect('login/dashboard');
        } else {
			//Help:Define uma mensagem de erro na sessão e redireciona de volta para a tela de login
            $this->session->set_flashdata('erro', 'Email ou senha inválidos');
            redirect('login');
        }
    }

    public function dashboard() {
		//Help:Verifica se o usuário está logado, se não estiver redireciona para a tela de login
        if (!$this->session->userdata('logado')) {
            redirect('login');
        }
        $this->load->view('dashboard');
    }

    public function sair() {
		//Help:Destrói a sessão e redireciona para a tela de login
        $this->session->sess_destroy();
        redirect('login');
    }
}