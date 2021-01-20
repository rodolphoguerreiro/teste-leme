<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Core\Configure;
use Cake\Event\Event;

class AppController extends Controller{

    public $_setting;

    public function initialize(){
        parent::initialize();

        //Preset
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        //Custom
        $this->loadComponent('FileTool');
        $this->loadComponent('EmailTool');
        $this->loadComponent('ImageTool');
    }
}
