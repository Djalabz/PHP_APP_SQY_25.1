<?php 

include 'dotenv.php';

class DB {
    private $sgbd;
    private $host;
    private $dbname;
    private $user;
    private $password;
    private $port;
    private $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
    public $pdo;
    
    public function __construct($sgbd, $host, $dbname, $user, $password, $port) {
        $this->sgbd = $sgbd;
        $this->host = $host;
        $this->dbname = $dbname;
        $this->user = $user;
        $this->password = $password;
        $this->port = $port;

        $this->connect();
    }

    public function __destruct() {
        $this->disconnect();
    }

    public function connect() {
        try {
            $dsn = "$this->sgbd:dbname=$this->dbname;host=$this->host:$this->port";
            $this->pdo = new PDO($dsn, $this->user, $this->password, $this->options);
            return $this->pdo;
        
        } catch (PDOException $error) {
            echo "Il y a une erreur : $error";
            exit();
        }
    }
    
    public function disconnect() {
        try {
            $this->pdo = null;
        } catch (PDOException $error) {
            echo "Il y a une erreur durant la déconnexion : $error";
            exit();
        }
    }
};

$connexion = new DB($dbsgbd, $dbhost, $dbname, $dbuser, $dbpassword, $dbport);
$pdo = $connexion->pdo;

?>