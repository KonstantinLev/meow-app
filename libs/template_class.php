<?php

/**
 * Created by PhpStorm.
 * User: Konstantin
 * Date: 06.06.2017
 * Time: 22:42
 */
class Template
{
    private $dir_tmpl;
    private $data = array();

    public function __construct($dir_tmpl)
    {
        $this->dir_tmpl = $dir_tmpl;
    }

    public function set($name, $val)
    {
        $this->data[$name] = $val;
    }

    public function delete($name)
    {
        unset($this->data[$name]);
    }

    public function __get($name)
    {
        if (isset($this->data[$name])) return $this->data[$name];
        return '';
    }

    public function display($template)
    {
        $template = $this->dir_tmpl.$template.'.tpl';
        ob_start();
        include ($template);
        echo ob_get_clean();
    }

}