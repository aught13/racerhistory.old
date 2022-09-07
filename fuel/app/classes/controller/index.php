<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace Controller;

/**
 * Description of index
 *
 * @author patrick
 */
class index extends \Controller\Base 
{
    public function action_index() {
        $this->template->title = "Racerhistory.com";
        $this->template->content = \View::forge('welcome/index');

    }
    
}
