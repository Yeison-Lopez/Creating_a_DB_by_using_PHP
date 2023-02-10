<?php

class CreateDb
{
  public $servername;
  public $username;
  public $password;
  public $dbname;
  public $table1name;
  public $table2name;
  public $table3name;
  public $con;

  public function __construct(

    $dbname="disenowebpro_MyFirstDB",
    $table1name="MyTable1",
    $table2name="MyTable1",
    $table3name="MyTable3",
    $servername="localhost",
    $username="disenowebpro_disenowebpro",
    $password="Mypassword4myfirstDB55#"
  ){

    $this->dbname = $dbname;
    $this->table1name=$table1name;
    $this->table2name=$table2name;
    $this->table3name=$table3name;
    $this->servername=$servername;
    $this->username=$username;
    $this->password=$password;
    $this->con= mysqli_connect($servername,$username,$password);

    if(!$this->con){
      die("Connection failed:".mysqli_connect_error());
    }

    $sql="CREATE DATABASE IF NOT EXISTS $dbname";
    if(mysqli_query($this->con,$sql)){

      $this->con=mysqli_connect($servername,$username,$password,$dbname);

      $sql="CREATE TABLE IF NOT EXISTS $table1name
        (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        product_name VARCHAR(100),
        product_description MEDIUMTEXT,
        product_price FLOAT
      );";
      $sql.="CREATE TABLE IF NOT EXISTS $table2name
        (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        product_name VARCHAR(100),
        product_description MEDIUMTEXT,
        product_price FLOAT
      );";
      $sql.="CREATE TABLE IF NOT EXISTS $table3name
        (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        product_name VARCHAR(100),
        product_description MEDIUMTEXT,
        product_price FLOAT
      );";

      if(!mysqli_multi_query($this->con,$sql)){
        echo "Error creating table: ".mysqli_error($this->con);
      }

    }
    else{
      return false;
    }
  }
}



 ?>
