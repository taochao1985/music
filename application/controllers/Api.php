<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model("music");
    }
}