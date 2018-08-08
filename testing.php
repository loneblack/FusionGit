<html>
<script src="layout/jquery.min.js"></script>
<table id="your_table">

  <tbody>

					  <td <a class="showhr" href="#">+</a></td>
					  <td>James Bond</td>
					  <td>james_bond</td>
					  <td>CSO</td>
					  <td>Yuchengco</td>
					  <td> Y507</td>
					  <td><button onclick="alertData();">button2</button></td>
					 </tr>
					 
					 <tr class = "invi" id= "invi" style="display:none" >
						<tr>
						  <th>Item specification</th>
						  <th>Property Code</th>
						  <th>Serial Number</th>
						  <th>MAC Address</th>
						</tr>
						<tr>
						  <td class = "data" data-id="1">Solid CSnake</td>
						  <td>AB1234</td>
						  <td>12768405</td>
						  <td>10.00.44.55</td>
						 </tr>
					</tr>
					<tr>
					  <td <a class="showhr" href="#">+</a></td>
					  <td>James Bond</td>
					  <td>james_bond</td>
					  <td>CSO</td>
					  <td>Yuchengco</td>
					  <td> Y507</td>
					  <td><button onclick="alertData();">button2</button></td>
					 </tr>
					 
					 <tr class = "invi" id= "invi" style="display:none" >
						<tr>
						  <th>Item specification</th>
						  <th>Property Code</th>
						  <th>Serial Number</th>
						  <th>MAC Address</th>
						</tr>
						<tr class = "data" data-id="2">
						  <td>Solid Computer</td>
						  <td>AB1234</td>
						  <td>12768405</td>
						  <td>10.00.44.55</td>
						 </tr>
						 <tr class = "data" data-id="3">
						  <td>Solid Computer</td>
						  <td>AB1234</td>
						  <td>12768405</td>
						  <td>10.00.44.55</td>
						 </tr>
					</tr>
  </tbody>
</table>

</html>

<script type="text/javascript">
function getFirstCellTextList(tableElement) {
   if (tableElement instanceof jQuery) {
      // Create an array
      var textList = [];

      // Iterate over each table row
      tableElement.find('.data').each(function() {
          // Get the first cells's text and push it inside the array
          var row = $(this);
          if (row.children('td').length > 0) {
             textList.push(row.children('td').eq(0).text());
          }                  
      });
      return textList;

		}
   }
function alertData(){
	var myList = getFirstCellTextList($('#your_table'));
	alert(myList);
}

$("#b1").on('click',function() {
                 $('.data').each(function() {
                 var term = $('.data').attr('data-id');
                 alert(term);
                 });
             });


$('#tblNewAttendees tr').each(function() {
  alert('tr');
  //Cool jquery magic that lets me iterate over all the td only in this row
  $(magicSelector).each(function(){
    alert('hi');
  });

});
var count = 0;

$("#b3").on('click',function() {
    $(this).closest('tr').nextUntil("tr:has(.showhr)").find('td').each (function() {
  		alert('tr');
		});                         
});


</script>
<?php


?>