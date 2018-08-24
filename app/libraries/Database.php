<?php

/*
*   PDO Database Class
*   Connect to database
*   Create prepared statements
*   Bind values
*   Return rows and results
*/
class Database {
  private $host = DB_HOST;
  private $user = DB_USER;
  private $pass = DB_PASS;
  private $dbname = DB_NAME;

  // For handling the queries
  private $dbh;
  private $stmt;
  private $error;

  public function __construct() {
    // Set dsn
    $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
    $options = array(
      PDO::ATTR_PERSISTENT => true,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );

    // Make PDO instance
    try {
      $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
    } 
    catch(PDOException $e) {
      $this->error = $e->getMessage();
      echo '**EXCEPTION** In Database __construct: ' . $this->error;
    }
  }


  // Prepare statement with a query
  public function query($sql) {
    $this->stmt = $this->dbh->prepare($sql);
  }

  // Binding values
  public function bind($param, $value, $type = null) {
    // If $type is passed as null, then we set the type by looking at $value.
    if(is_null($type)) {
      switch(true) {
        case is_int($value):
          $type = PDO::PARAM_INT;
          break;
        case is_bool($value):
          $type = PDO::PARAM_BOOL;
          break;
        case is_null($value):
          $type = PDO::PARAM_NULL;
          break;
        default:
          $type = PDO::PARAM_STR;
          break;
      }
    }
    $this->stmt->bindValue($param, $value, $type);
  }

  // Executing the prepared statement
  public function execute() {
    return $this->stmt->execute();
  }

  // Getting results as array of objects
  public function resultSet() {
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_OBJ);
  }

  // Get a single record of object
  public function single() {
    $this->execute();
    return $this->stmt->fetch(PDO::FETCH_OBJ);
  }

  public function rowCount() {
    return $this->stmt->rowCount();
  }
}

?>