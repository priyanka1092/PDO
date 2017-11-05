<?php
include 'dbConn.php';

class collection{

public function __construct(){
  $class1=get_called_class();
    $this->search(6,$class1);
    }

	public function search($count,$class1)
	 {
	    $db=dbConn::getConnection();
	    $sql = 'SELECT * FROM '.$class1.' where id< :count1';
		    $stmt = $db->prepare($sql);
		    $stmt->bindParam(':count1', $count);
			    $stmt->execute();
			     $rows=$stmt->rowCount();
				        echo 'Row count= '.$rows;
				        echo '<br>';
					    $rowtotal=$stmt->fetchAll();
					    $this->displayTable($rowtotal);
	  }
						  public function displayTable($e)
						  {

							      echo "<table border=2>";
							      echo
								    "<tr><th>id</th><th>email</th><th>fname</th><th>lname</th><th>phone</th><th>birthday</th><th>gender</th><th>password</th></tr>";

								        foreach($e as $row)
								        {
									      echo "<tr>";
									      echo "<td>".$row['id']."</td>";
										    echo "<td>".$row['email']."</td>";
											  echo "<td>".$row['fname']."</td>";
											  echo "<td>".$row['lname']."</td>";
											  echo "<td>".$row['phone']."</td>";
											  echo "<td>".$row['birthday']."</td>";
											 echo 	"<td>".$row['gender']."</td>";
											 echo   "<td>".$row['password']."</td>";
										    echo  "</tr>";
													 }

															print_r($e);

															echo	 "</table>";

									 }
								 }
															class accounts extends collection
															{



																	}
	?>
