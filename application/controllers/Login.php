<?php
ob_start();
class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();  
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model("login_model");
        $this->load->library('form_validation');
       
    }
    public function index() {
        
        $data['title'] = 'Login';
        $this->load->view('login', $data);
    }

    public function verify(){
        
        $this->form_validation->set_rules('txtuser', 'Username', 'required');
        $this->form_validation->set_rules('txtpass', 'Password', 'required|callback_check_user');
        
       
        // if($this->form_validation->run() === TRUE) {
        // }
        
        if($this->form_validation->run() === TRUE) {
            echo 'verify'.$this->session->userdata('account_name');
            // echo "Hello";
            redirect('home');
        } else {
            // echo "World";
            $this->index(); // Assuming you want to load a view if validation fails
        }
    }

    public function check_user(){
        $username = $this->input->post('txtuser');
        $password = $this->input->post('txtpass');
        
        
        $login = $this->login_model->login($username, $password);
        
        // echo "check user".$login['user_accountname'];
        
        if ($login){
            $sess_data = array(
                'account_name' => $login['user_accountname'],
                'islogged' => TRUE
            );
            
            $this->session->set_userdata($sess_data);
            // echo $this->session->userdata('account_name');

            return true;
        } else {
            $this->form_validation->set_message('check_user', 'Invalid Username/password');
            return false;
        }
    }

    public function home() {
        // $login = $this->login_model->login($username, $password);
        // echo $login['user_accountname'];
        echo "home";
        $data['title'] = "Welcomes ".$this->session->userdata('account_name');
        echo $this->session->userdata('account_name');
        $this->load->view('home', $data);
    }
    
    
}

