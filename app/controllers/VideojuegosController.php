<?php

class VideojuegosController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
    	$this->view->videojuegos = videojuegos::find();
    }

}

