<?php
define('SMARTY_DIR', '/smarty/');
define('SMARTY_DIR', str_replace("\\", "/", getcwd()).'includes/smarty/');
require_once(SMARTY_DIR . 'Smarty.class.php');

class SmartyTemplate
{
	var $smarty;
    var $tpl_name = '';

    function __construct()
    {
        $this->smarty = new Smarty;
        $this->smarty->template_dir = '/templates/';
        $this->smarty->compile_dir = '/templates_c';
        $this->smarty->config_dir = '';
		$this->smarty->cache_dir = '/cache';
    }

    function setTemplate($tpl_name)
    {
        $this->tpl_name = $tpl_name;
    }

    function assign($var_name, $value = '')
    {
        if (!is_array($var_name)) {
            $this->smarty->assign($var_name, $value);
        } else {
            $this->smarty->assign($var_name);
        }
    }

    function bulkAssign($array)
    {
        while (list($key, $value) = each($array)) {
            $this->smarty->assign($key, $value);
        }
    }

    function displayTemplate()
    {
        $this->smarty->display($this->tpl_name);
    }

    function getTemplateContents()
    {
        return $this->smarty->fetch($this->tpl_name);
    }
}
?>