<?php
ob_start();
class Logout extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        if (!$this->session->islogged) {
            redirect('Login');
        }
    }

    public function index() {
        $session_array = array('account_name', 'islogged');
        $this->session->unset_userdata($session_array);
        echo "logout";
        redirect('Login');

    }
}
