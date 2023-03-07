<?php
class conexao
{
    private $host = 'localhost';
    private $db_name = 'usuarios';
    private $user = 'root';
    private $pass = '';

    public function conectar()
    {
        try {

            $conexao = new PDO(
                "mysql:host=$this->host;dbname=$this->db_name",
                "$this->user",
                "$this->pass"
            );

            return $conexao;

        } catch (PDOException $e) {
            echo '<p>' . $e->getMessage() . '</p>';
        }
    }
}

?>