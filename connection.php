<?php
define('DATABASE', 'pb435');
define('USERNAME', 'pb435');
define('PASSWORD', 'Qwerty10');
define('CONNECTION', 'sql2.njit.edu');

class connection
{

 protected static $db;

 public function __construct()
 {

    try
    {
      self::$db = new PDO( 'mysql:host=' . CONNECTION .';dbname=' . DATABASE, USERNAME, PASSWORD );
      self::$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
      echo 'Connected Successfully';
      echo '<br>';
    }
    catch (PDOException $e)
    {
       echo "Connection Error: " . $e->getMessage();
       echo '<br>';
       die();
    }

  }

  public static function getConnection()
  {
      if (!self::$db)
      {
        new connection();
      }
       return self::$db;
   }
  }
?>
