<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class CategoriasController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for categorias
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Categorias', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "id";

        $categorias = Categorias::find($parameters);
        if (count($categorias) == 0) {
            $this->flash->notice("The search did not find any categorias");

            $this->dispatcher->forward([
                "controller" => "categorias",
                "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $categorias,
            'limit'=> 10,
            'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displays the creation form
     */
    public function newAction()
    {

    }

    /**
     * Edits a categoria
     *
     * @param string $id
     */
    public function editAction($id)
    {
        if (!$this->request->isPost()) {

            $categoria = Categorias::findFirstByid($id);
            if (!$categoria) {
                $this->flash->error("categoria was not found");

                $this->dispatcher->forward([
                    'controller' => "categorias",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->id = $categoria->id;

            $this->tag->setDefault("id", $categoria->id);
            $this->tag->setDefault("categoria", $categoria->categoria);
            
        }
    }

    /**
     * Creates a new categoria
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "categorias",
                'action' => 'index'
            ]);

            return;
        }

        $categoria = new Categorias();
        $categoria->id = $this->request->getPost("id");
        $categoria->categoria = $this->request->getPost("categoria");
        

        if (!$categoria->save()) {
            foreach ($categoria->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "categorias",
                'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("categoria was created successfully");

        $this->dispatcher->forward([
            'controller' => "categorias",
            'action' => 'index'
        ]);
    }

    /**
     * Saves a categoria edited
     *
     */
    public function saveAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "categorias",
                'action' => 'index'
            ]);

            return;
        }

        $id = $this->request->getPost("id");
        $categoria = Categorias::findFirstByid($id);

        if (!$categoria) {
            $this->flash->error("categoria does not exist " . $id);

            $this->dispatcher->forward([
                'controller' => "categorias",
                'action' => 'index'
            ]);

            return;
        }

        $categoria->id = $this->request->getPost("id");
        $categoria->categoria = $this->request->getPost("categoria");
        

        if (!$categoria->save()) {

            foreach ($categoria->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "categorias",
                'action' => 'edit',
                'params' => [$categoria->id]
            ]);

            return;
        }

        $this->flash->success("categoria was updated successfully");

        $this->dispatcher->forward([
            'controller' => "categorias",
            'action' => 'index'
        ]);
    }

    /**
     * Deletes a categoria
     *
     * @param string $id
     */
    public function deleteAction($id)
    {
        $categoria = Categorias::findFirstByid($id);
        if (!$categoria) {
            $this->flash->error("categoria was not found");

            $this->dispatcher->forward([
                'controller' => "categorias",
                'action' => 'index'
            ]);

            return;
        }

        if (!$categoria->delete()) {

            foreach ($categoria->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "categorias",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("categoria was deleted successfully");

        $this->dispatcher->forward([
            'controller' => "categorias",
            'action' => "index"
        ]);
    }

}
