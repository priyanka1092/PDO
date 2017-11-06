<?php
include 'connection.php';

class htmltable
{

   public function __construct()
   {
	    $calledClass=get_called_class();
	    $this->fetchRecords(6,$calledClass);
   }

   public function fetchRecords($count,$tableName)
   {
//Connect to Database
	    $db=connection::getConnection();
	
//Fetch Data	
	    $sql = 'SELECT * FROM '.$tableName.' where id < :IDs';
	    $stmt = $db->prepare($sql);
	    $stmt->bindParam(':IDs', $count);
	    $stmt->execute();
	    $rows=$stmt->rowCount();
	    echo 'Row count= '.$rows;
	    echo '<br>';
	    $rowtotal=$stmt->fetchAll();
	    
//Fetch Column Names
	    $table_meta = $db->prepare("DESCRIBE ". $tableName);
	    $table_meta->execute();
	    $table_fields = $table_meta->fetchAll(PDO::FETCH_COLUMN);

//Display Records
            $this->displayRecords($rowtotal, $table_fields);
    }
   
    public function displayRecords($data, $columns)
    {

      echo "<table border=3>";

      echo "<tr>";

//Display Column Heading
      foreach( $columns as $col)
      {
        echo "<th>".$col."</th>";
      }
      echo "</tr>";
     
//Display all the Rows     
      foreach( $data as $row)
      {
        echo "<tr>";
       
	foreach($columns as $col)
		echo "<td>".$row[$col]."</td>";
	echo "</tr>";
      }


   }
  }
  class accounts extends htmltable
   {

   }
?>
