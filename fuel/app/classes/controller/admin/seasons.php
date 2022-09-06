<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace Controller\Admin;

/**
 * Description of seasons
 *
 * @author patrick
 */
class Seasons extends \Controller\Seasons {
    
    public function before() {
        parent::before();
        if (!\Auth::check()){
            \Response::redirect('/');
        }            
    }
    
    public function action_index() {
        parent::action_index();
    }
    
    public function action_view($id = null) {
        parent::action_view($id);
    }    
}
