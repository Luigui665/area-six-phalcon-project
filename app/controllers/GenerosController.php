<?php

class GenerosController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
		$this->view->generos = generos::find();
    }

    //HOLA
    public function showAction($id_genero)
    {
		$this->view->genero = generos::findFirstById($id_genero);
		//$this->view->videojuegos = videojuegos::findByGenero($id_genero);
		$this->view->videojuegos = videojuegos::find(array(
			'genero = '.$id_genero,
			'bind' => array($id_genero),
			'order' => 'likes DESC'
		));
    }

    public function likesAction($id_juego)
    {
		$juego = videojuegos::findFirstById($id_juego);
		$juego->likes++;
		$juego->save();

		return $this->dispatcher->forward(array(
			'action' => 'show',
			'params' => array($juego->genero)
		));
    }

    public function addAction($id_genero)
    {		
    	if($this->request->isPost()) {
    		$option = new Videojuegos();
    		$option->videojuego = $this->request->getPost('videojuego');
    		$option->plataforma = $this->request->getPost('plataforma');
				$option->sinopsis = $this->request->getPost('sinopsis');				
				
				//Comprueba si hay archivos por subir
				if ($this->request->hasFiles() == true) 
				{
						// Print the real file names and sizes
						foreach ($this->request->getUploadedFiles() as $caratula) {

								//Print file details
								//echo $caratula->getName(), " ", $caratula->getSize(), "\n";
								$option->caratula = "img/".$caratula->getName();

								//guardamos dentro del directorio img
								$caratula->moveTo('img/' . $caratula->getName());
						}
				}				

    		$option->trailer = $this->request->getPost('trailer');
    		$option->precio_unitario = $this->request->getPost('precio');
    		$option->existencias = $this->request->getPost('existencias');
    		$option->categoria = $this->request->getPost('categoria');
    		$option->genero = $id_genero;

    		$option->save();

    		return $this->dispatcher->forward(array(
    			'action' => 'show',
    			'params' => array($id_genero)
    		));
    	}

		$this->view->generos = generos::find();
    }

}

