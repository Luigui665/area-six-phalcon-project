<?php

class Videojuegos extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $videojuego;

    /**
     *
     * @var string
     */
    public $consola;

    /**
     *
     * @var string
     */
    public $sinopsis;

    /**
     *
     * @var string
     */
    public $caratula;

    /**
     *
     * @var string
     */
    public $trailer;

    /**
     *
     * @var integer
     */
    public $precio_unitario;

    /**
     *
     * @var integer
     */
    public $existencias;

    /**
     *
     * @var integer
     */
    public $id_categoria;

    /**
     *
     * @var integer
     */
    public $likes;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("productos");
        $this->setSource("videojuegos");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'videojuegos';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Videojuegos[]|Videojuegos|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Videojuegos|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
