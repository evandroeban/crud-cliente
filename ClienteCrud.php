<?php
require_once "ClienteInterface.php";
require_once "DbInterface.php";

class ClienteCrud
{
    private $db;
    private $cliente;

    public function __construct(DbInterface $db, ClienteInterface $cliente)
    {
        $this->db = $db->connect();
        $this->cliente = $cliente;
    }

    public function salvar()
    {

        $sql = "INSERT INTO `cliente` (
                        `nome`,
                        `cep`,
                        `endereco`,
                        `dt_nascimento`,
                        `sexo`,
                        `numero`,
                        `complemento`,
                        `bairro`,
                        `uf`,
                        `cidade` 
                    ) VALUES ( :nome, :cep, :endereco, :dt_nascimento, :sexo, :numero, :complemento, :bairro, :uf, :cidade)";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':nome', $this->cliente->getNome());
        $stmt->bindValue(':cep', $this->cliente->getCep());
        $stmt->bindValue(':endereco', $this->cliente->getEndereco());
        $stmt->bindValue(':dt_nascimento', $this->cliente->getDtNascimento());
        $stmt->bindValue(':numero', $this->cliente->getNumero());
        $stmt->bindValue(':complemento', $this->cliente->getComplemento());
        $stmt->bindValue(':bairro', $this->cliente->getBairro());
        $stmt->bindValue(':uf', $this->cliente->getUf());
        $stmt->bindValue(':cidade', $this->cliente->getCidade());
        $stmt->bindValue(':sexo', $this->cliente->getSexo());

        $result = $stmt->execute();

        if (!$result) {
            echo "<pre>";
            print_r($stmt->errorInfo());
            echo "</pre>";
            return false;
        } else {
            return $this->db->lastInsertId();
        }

    }

    public function editar($id)
    {

        if ($id === 0 && !is_int($id) && $id <= 0 && !$id) {
            return false;
        }

        $sql = "UPDATE `cliente` set `nome` = :nome, `cep` = :cep, `endereco` = :endereco, `dt_nascimento` = :dt_nascimento, `numero` = :numero, `complemento` = :complemento, `bairro` = :bairro, `uf` = :uf, `cidade` = :cidade, `sexo` = :sexo  where `id` = :id ";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':nome', $this->cliente->getNome());
        $stmt->bindValue(':cep', $this->cliente->getCep());
        $stmt->bindValue(':endereco', $this->cliente->getEndereco());
        $stmt->bindValue(':dt_nascimento', $this->cliente->getDtNascimento());
        $stmt->bindValue(':numero', $this->cliente->getNumero());
        $stmt->bindValue(':complemento', $this->cliente->getComplemento());
        $stmt->bindValue(':bairro', $this->cliente->getBairro());
        $stmt->bindValue(':uf', $this->cliente->getUf());
        $stmt->bindValue(':cidade', $this->cliente->getCidade());
        $stmt->bindValue(':sexo', $this->cliente->getSexo());
        $stmt->bindValue(':id', $id);

        $result = $stmt->execute();

        if (!$result) {
            echo "<pre>";
            print_r($stmt->errorInfo());
            echo "</pre>";
        } else {
            return $result;
        }

    }

    public function listar()
    {
        $sql = "SELECT * FROM `cliente`";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function remover(int $id)
    {
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if ($id === 0 && !is_int($id) && $id <= 0 && !$id) {
            return false;
        }
        $query = "DELETE FROM `cliente` where id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id);
        $result = $stmt->execute();
        if (!$result) {
            echo "<pre>";
            print_r($stmt->errorInfo());
            echo "</pre>";
            return false;
        } else {
            return $stmt->rowCount();
        }
    }

    public function carregar(int $id)
    {

        $id = filter_var($id, FILTER_VALIDATE_INT);
        $sql = "SELECT * FROM `cliente` where id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $result = $stmt->execute();
        if (!$result) {
            echo "<pre>";
            print_r($stmt->errorInfo());
            echo "<;pre>";
            return false;
        } else {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }


}