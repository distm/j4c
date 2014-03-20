<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
    
    var $_data;
    var $_dirview;
    
    function __construct()
    {
        parent::__construct();
        $this->_dirview = $this->router->class;
        $this->_default_data();
    }
    
    private function _default_data()
    {
        $this->_data = array(
            'page_title' => 'Job4Career.Com',
            'content' => '',
            'css' => array(),
            'js' => array()
        );
    }
    
    protected function add_assets($f='')
    {
        if(! is_array($f))
        {
            $f = array($f);
        }
        
        foreach($f as $file)
        {
            $ext = strtolower(substr($file, strrpos($file, '.')+1));
            if($ext == 'css' || $ext == 'js')
            {
                $src = (strpos($file, 'http:') !== FALSE) ? $file : assets_url($ext ."/". $file);
                $this->_data[$ext][] = $src;
            }
        }
    }
    
    protected function load_content($name, $vars='', $returned=FALSE)
    {
        $view = $this->_dirview ."/". $name;
        if($returned)
        {
            return $this->load->view($view, $vars, TRUE);
        }
        else
        {
            $this->load->view($view, $vars);
        }
    }
    
}
