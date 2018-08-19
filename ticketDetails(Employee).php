<?php
	session_start();
	require_once("mysqlconnect.php");

	$ticketID = $_POST['ticketID'];
	$_SESSION['ticketID'] = $ticketID;
	$assetIdArray = array();

    $query1 = "SELECT t.ticketID, 
    			(convert(aes_decrypt(au.firstName, 'Fusion') using utf8)) AS 'afirstName' ,
    			(convert(aes_decrypt(au.lastName, 'Fusion')using utf8)) AS 'alastName',
            	(convert(aes_decrypt(cu.firstName, 'Fusion') using utf8)) AS 'cfirstName',
            	(convert(aes_decrypt(cu.lastName, 'Fusion')using utf8)) AS 'clastName',
              lastUpdateDate, dateCreated, dateClosed, dueDate, priority,summary, t.description, s.status, assigneeUserID,
              (t.status) AS 'statusID'
              FROM thesis.ticket t
              JOIN ref_ticketstatus s
                ON t.status = s.ticketID
              LEFT JOIN user au
                ON t.assigneeUserID = au.UserID
              JOIN user cu
                ON t.creatorUserID = cu.UserID
                WHERE t.ticketID = {$ticketID};";
                  
    $result1 = mysqli_query($dbc, $query1);
    while ($row = mysqli_fetch_array($result1, MYSQLI_ASSOC))
    {

		$summary = $row['summary'];
		$afirstName = $row['afirstName'];
		$alastName = $row['alastName'];
		$cfirstName = $row['cfirstName'];
		$clastName = $row['clastName']; 
		$priority = $row['priority'];
		$dueDate = $row['dueDate'];
		$lastUpdateDate = $row['lastUpdateDate'];
		$status = $row['status'];
		$dateCreated = $row['dateCreated'];
		$description = $row['description'];
		$statusID = $row['statusID'];
        if($row['assigneeUserID']==NULL){
        	$assigneeUserID = 0;
        }
        else{
        	$assigneeUserID = $row['assigneeUserID'];
        }
    }
    
    $query2 = "SELECT * FROM thesis.ticketedasset WHERE ticketID = {$ticketID};";
    $result2 = mysqli_query($dbc, $query2);

      while ($row = mysqli_fetch_array($result2, MYSQLI_ASSOC))
    {
    	array_push($assetIdArray, $row['assetID']);
    }

?>
	<table>
		<tr>
			<th><font size=4><?php echo $summary?></font></th>
		</tr>
		<tr>
			<td><font size=1 color="grey">- Submitted by <?php echo $cfirstName." ".$clastName?> on <?php echo $dateCreated?></font></td>
		</tr>
		<tr>
			<td><?php echo $description ?></td>
		</tr>
	</table>
	<br>
	<table>
	<tr>
		<th><font size="3">Ticketed Assets: </font></th>
	</tr>
	<tr>
	  <th width="6%">Property Code</th>
	  <th width="6%">Serial Number</th>
	  <th width="6%">MAC Address</th>
	  <th width="5%">Brand</th>
	  <th width="5%">Asset Type</th>
	  <th width="15%">Item Specification</th>
	</tr>
	<?php
		for ($i=0; $i < count($assetIdArray); $i++) { 
			$query = "SELECT assetID, a.assetTypeID, propertyCode, serialNo, macAddress, itemSpecification, 
						(b.name)as 'brand',(ac.name) as 'assetclass' FROM thesis.asset a
						join assettype at on a.assetTypeID = at.assetTypeID
						join ref_brand b on at.brand = b.brandId 
						join ref_assetclass ac on at.assetClass = ac.assetClassID
						where assetID = {$assetIdArray[$i]};";
										
			$result = mysqli_query($dbc, $query);
			
			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			{
				echo "<tr>
						<td>{$row['propertyCode']}</td>
						<td>{$row['serialNo']}</td>
						<td>{$row['macAddress']}</td>
						<td>{$row['brand']}</td>
						<td>{$row['assetclass']}</td>
						<td>{$row['itemSpecification']}</td>
					  </tr>";
			}
		}
	?>
	</table>
	<br>
	<table>
		<tr>
			<th width="5%">Status</th>
		</tr>
		<tr>
			<td>
			<select id="statusID" name="statusID">
            	<?php
                $query="SELECT * FROM thesis.ref_ticketstatus WHERE ticketID != 1;";
                $result=mysqli_query($dbc,$query);

                while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                echo "<option value='{$row['ticketID']}'";
                if($row['ticketID']==$statusID)echo " selected='selected' ";
                echo ">{$row['status']}</option>";
                }
              ?>
            </select>
			</td>
		</tr>
	</table>
	<script type="text/javascript">
		jQuery('#statusID').load('session_write.php?statusID');
	</script>
	