<?php
	session_start();
	require_once("mysqlconnect.php");

	$ticketID = $_POST['ticketID'];

	echo $ticketID;
	
    $count = 1;

    $query = "SELECT t.ticketID, (convert(aes_decrypt(au.firstName, 'Fusion') using utf8)) AS 'afirstName' ,(convert(aes_decrypt(au.lastName, 'Fusion')using utf8)) AS 'alastName',
              (convert(aes_decrypt(cu.firstName, 'Fusion') using utf8)) AS 'cfirstName' ,(convert(aes_decrypt(cu.lastName, 'Fusion')using utf8)) AS 'clastName',
              lastUpdateDate, dateCreated, dateClosed, dueDate, priority,summary, t.description, s.status FROM thesis.ticket t
              JOIN ref_ticketstatus s
                ON t.status = s.ticketID
              LEFT JOIN user au
                ON t.assigneeUserID = au.UserID
              JOIN user cu
                ON t.creatorUserID = cu.UserID;";
                  
    $result = mysqli_query($dbc, $query);
    
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
      
      echo "<tr data-details='t{$count}' class='tickets'>
          <td>{$row['ticketID']}</td>
          <td>{$row['summary']}</td>
          <td>{$row['afirstName']} {$row['alastName']}</td>
          <td>{$row['cfirstName']} {$row['clastName']}</td>
          <td>{$row['priority']}</td>
          <td>{$row['dueDate']}</td>
          <td>{$row['lastUpdateDate']}</td>
          <td>{$row['status']}</td>
          <td><button class='viewTicket'>View Ticket</button></td>
          </tr>";

          $count++;
    }

?>