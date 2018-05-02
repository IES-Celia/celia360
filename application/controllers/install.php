<?php

class Install extends CI_Controller {
	/*************************************************************************
  *                                 Install
  *                                               
  *************************************************************************/ 
	    public function __construct(){
            parent::__construct();
            $this->load->model("InstallModel");
        }