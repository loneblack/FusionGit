<?php
require_once("mysqlconnect.php");

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
  echo "<table id='t{$count}' class='table table-bordered table-striped'>
          <tbody>
            <tr>
              <th>Huhehue</th>
            </tr>
          </tbody>
        </table>";

      $count++;
}
echo "non";

?>
