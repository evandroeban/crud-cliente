<?php
require_once "DbInterface.php";

class Db implements DbInterface
{

    private $host;
    private $dbname;
    private $user;
    private $senha;
    private $charset;

    public function __construct($host, $dbname, $user, $senha, $charset = "utf8")
    {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->user = $user;
        $this->senha = $senha;
        $this->charset = $charset;
    }

    public function connect()
    {

        try {
            return new \PDO("mysql: host={$this->host}; dbname={$this->dbname}; charset={$this->charset}", $this->user, $this->senha);
        } catch (\PDOException $error) {
            echo "Erro: " . $error->getMessage();
            die();
        }

    }

}