<?php

class SPDO
{
    /**
     * Instance de la classe PDO
     *
     * @var PDO
     * @access private
     */
    private $PDOInstance = null;

    /**
     * Instance de la classe SPDO
     *
     * @var SPDO
     * @access private
     * @static
     */
    private static $instance = null;

    /**
     * Constructeur
     *
     * @param void
     * @return void
     * @see PDO::__construct()
     * @access private
     */
    private function __construct()
    {
        $this->PDOInstance = new PDO("mysql:host=localhost:3306;dbname=cinema", "root", "", array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION));
    }

    /**
     * Crée et retourne l'objet SPDO
     *
     * @access public
     * @static
     * @param void
     * @return SPDO $instance
     */
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new SPDO();
        }
        return self::$instance;
    }
    /**
     * Exécute une requête SQL avec PDO
     *
     * @param string $query La requête SQL
     * @return PDOStatement Retourne l'objet PDOStatement
     */
    public function query($query)
    {
        return $this->PDOInstance->query($query);
    }
    /**
     * Exécute une requête SQL avec PDO
     *
     * @param string $query La requête SQL
     * @return PDOStatement Retourne l'objet PDOStatement
     */
    public function prepare($query)
    {
        return $this->PDOInstance->prepare($query);
    }
}
