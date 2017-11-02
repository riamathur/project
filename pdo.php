<!DOCTYPE html>
<html>
<body>

<?php
echo "<table style='border: solid 1px black;'>";
 echo "<tr><th>Id</th><th>email</th><th>Firstname</th><th>Lastname</th><th>phone</th><th>birthday</th><th>gender</th><th>password</th></tr>";

 class TableRows extends RecursiveIteratorIterator { 
     function __construct($it) { 
             parent::__construct($it, self::LEAVES_ONLY); 
	         }

	function current() {
		return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
			         }
				 
		function beginChildren() { 
				             echo "<tr>"; 
					         } 

						     function endChildren() { 
						             echo "</tr>" . "\n";
							         } 
								 } 

								 $servername = "sql1.njit.edu";
								 $username = "rm729";
								 $password = "COTXTf0X";
								 $dbname = "rm729";

								 try {
								     $conn = new PDO("mysql:host=$servername;dbname=$rm729", $username, $password);
								         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									     echo "Connected successfully" . '<br>';
									         $stmt = $conn->prepare("SELECT * FROM rm729.accounts WHERE id<6");
										 
										 
										 										     $stmt->execute();

										         // set the resulting array to associative
											     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

											         foreach(new TableRows(new
												 RecursiveArrayIterator($stmt->fetchAll())) as
												 $k=>$v) { 
												         echo $v;

													     }
                                               echo $stmt->rowCount() . '<br>';
													     }
													     catch(PDOException $e) {
													         echo "Error: " . $e->getMessage();
														 }
														 $conn = null;
														 echo "</table>";
														 ?> 

														 </body>
														 </html>
