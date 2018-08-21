<?php 
/**
 * 
 */
class DB
{
	private $host='localhost';
	private $username='root';
	private $password='';
	private $database='ecommerce';
	public $db;

	public function __construct()
	{
		try{

			$this->db = new PDO('mysql:host='.$this->host.';dbname='.$this->database,$this->username,$this->password) ; 
			$this->db->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND , 'SET NAMES UTF8');
			$this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
		
	    }catch(PDOExeception $e){
			die('erreur : de connexion');
	
		
		}


	}
	public function query($sql,$data=array()){
		
		$req= $this->db->prepare($sql);
		$req->execute($data);
		return $req->fetchall(PDO::FETCH_OBJ);
	}
}

