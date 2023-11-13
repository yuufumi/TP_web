<?php
require_once("controller.php");

class tdw_model{

    private $pdo;
    private $host = "localhost:3307";
    private $uname= "root";
    private $pass = "";
    private $db_name= "test";

    private function connect($db_name, $host, $uname, $pass) {
        $dsn="mysql:dbname=$db_name; host=$host;";
        try{
            $this->pdo = new PDO($dsn,$uname,$pass);
        }
        catch(PDOException $ex){
            printf("erreur de connexion à la BDD", $ex->getMessage());
            exit();
        }
    }

    private function disconnect(){
        $this->pdo = null;
    }

    private function request($r){
        $stmt = $this->pdo->prepare($r); //pdo from controller
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); //stmt from controller
    }

    public function get_Table_model(){
        $this->connect($this->db_name,$this->host,$this->uname,$this->pass);

        $qtf="SELECT s.Name_smartphone, f.Name_Features, sf.Value_Smartphone_Features, sf.Id_Smartphone
                FROM Smartphone s
                LEFT JOIN Smartphone_Features sf ON s.Id_smartphone = sf.Id_Smartphone
                LEFT JOIN Features f ON sf.Id_Features = f.Id_Features";
        $r=$this->request ($qtf);
        $this->disconnect();
        return $r;
    }

    public function get_Features_model(){
        $this->connect($this->db_name,$this->host,$this->uname,$this->pass);

        $qtf="SELECT * FROM Features";
        $r=$this->request ($qtf);
        $this->disconnect();
        return $r;
    }
    public function get_Smartphone_model(){
        $this->connect($this->db_name,$this->host,$this->uname,$this->pass);
        $qtf="SELECT * FROM smartphone ORDER BY Name_smartphone ASC";
        $r=$this->request ($qtf);
        $this->disconnect();
        return $r;
        
    }

    public function get_Feature_By_Id($id){
        $this->connect($this->db_name,$this->host,$this->uname,$this->pass);
        $sql= "SELECT smartphone_features.Value_Smartphone_Features, smartphone_features.Id_Smartphone
                    FROM `smartphone_features` WHERE smartphone_features.Id_Features=".$id."";
        $r=$this->request ($sql);
        $this->disconnect();
        return $r;
    }
}
?>