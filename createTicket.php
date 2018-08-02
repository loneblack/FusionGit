<html>
<head> 
		<title>Create Ticket</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="resource/dlsulogo.png" />
		<script src="layout/jquery.min.js"></script>
		<link rel="stylesheet" href="layout/bootstrap.min.css">
		<script src="layout/bootstrap.min.js"></script>
		
		<style>
		/* Remove the navbar's default margin-bottom and rounded borders */ 
		.navbar {
		  margin-bottom: 0;
		  border-radius: 0;
		}

		/* Set height of the grid so .sidenav can be 100% (adjust as needed) */
		.row.content {height: 450px}

		/* Set gray background color and 100% height */
		.sidenav {
		  padding-top: 20px;
		  background-color: #f1f1f1;
		  height: 100%;
		}

		/* Set black background color, white text and some padding */
		footer {
		  background-color: #555;
		  color: white;
		  padding: 15px;
		}

		/* On small screens, set height to 'auto' for sidenav and grid */
		@media screen and (max-width: 767px) {
		  .sidenav {
			height: auto;
			padding: 15px;
		  }
		  .row.content {height:auto;} 
		}
		
		.{
			font-size: 16px;
			color:#332929;
		}
		
		</style>
	</head>
<!-- Modal -->
<?php echo "<script type='text/javascript'>
$(document).ready(function(){
$('#Modal').modal('show');
});
</script>";?>
	<div id="Modal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Create a new Ticket</h4>
	      </div>
	      <div class="modal-body">

  <form accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data" method="post">
    <div style="margin:0;padding:0;display:inline">
    <input name="authenticity_token" type="hidden" value="IQ+IWbuHmx74Hk//QNzA/t146/21JsVmREkG8BEb4HU=">
    </div>

    <div id="ticket_form_fields_v2">

      <input id="ticket_form_viewing_asset_id" name="viewing_asset_id" type="hidden">
      <input id="ticket_form_viewing_asset_type" name="viewing_asset_type" type="hidden">
      <input id="ticket_form_active_tab" name="active_tab" type="hidden">
      
        <input id="ticket_form_from" name="from" type="hidden" value="v2">
      
      <input id="ticket_form_mode" name="mode" type="hidden">
      <input id="ticket_form_category" name="category" type="hidden">
      <input id="ticket_type" name="ticket_type" type="hidden" value="open_tickets">
      <input id="ticket_form_parent_ticket_id" name="ticket[parent_id]" type="hidden">

      <div class="control-group">
        <label class="control-label" for="s2id_autogen14">Contact</label>
        <div class="controls">
        	<input class="select2-focusser select2-offscreen" type="text" id="s2id_autogen14">
        		<div class="select2-drop select2-display-none select2-with-searchbox">
        			<div class="select2-search">       
        				<input type="text" autocomplete="off" class="select2-input">  
        			</div>
        		</div>
        </div>
        </div>
      </div>

      <div class="control-group">
        <label class="control-label" for="s2id_autogen16">Related to</label>
        <div class="controls">
          <div class="select2-container select2-container-multi populate" id="s2id_inventory_item_hash_popup" style="width: 283px;">    <ul class="select2-choices">  <li class="select2-search-field">    <input type="text" autocomplete="off" class="select2-input" id="s2id_autogen16" style="width: 10px;">  </li></ul><div class="select2-drop select2-drop-multi select2-display-none add-related-item">   <ul class="select2-results">   </ul></div></div><input type="hidden" id="inventory_item_hash_popup" name="ticket[inventory_item_hash]" class="populate select2-offscreen" multiple="true" tabindex="-1" value="">
          <input id="inventory_item_names_popup" name="ticket[asset_name]" type="hidden">
        </div>
      </div>

      <div class="control-group">
        <label class="control-label" for="ticket_summary_">Summary</label>
        <div class="controls">
          <input id="ticket_summary_" class="input-xlarge" maxlength="80" name="ticket[summary]" size="80" type="text">
        </div>
      </div>

      <div class="control-group">
        <label class="control-label" for="ticket_description_">Description</label>
        <div class="controls">
          <div class="ui-wrapper" style="overflow: hidden; position: relative; width: 282px; height: 46px; top: auto; left: auto; margin: 0px; padding-bottom: 14px;"><textarea cols="40" id="ticket_description_" name="ticket[description]" rows="2" class="ui-resizable" style="margin: 0px; resize: none; position: static; zoom: 1; display: block; height: 40px; width: 270px;"></textarea><div class="ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se" style="z-index: 90;"></div></div>
        </div>
      </div>

      <div class="control-group">
        <label class="control-label" for="ticket_form_assigned_to">Assigned to</label>
        <div class="controls">
          <select id="ticket_form_assigned_to" name="ticket[assigned_to]">
          	<option value="UNASSIGNED">Unassigned</option>
          	<option value="2">Lone Black</option>
          </select>
        </div>
      </div>

      <div class="control-group">
        <label class="control-label" for="s2id_autogen15">CC Users</label>
      </div>

      <div class="control-group">
        <label class="control-label" for="ticket_due_at">Due Date</label>
        <div class="controls">
          <div id="duecal_popup" class="input-append date" data-date="" data-date-format="mm/dd/yyyy">
            <input type="hidden" name="ticket[due_at]" id="ticket_due_datetime_popup" value="">
            <input type="text" id="ticket_due_date_popup" value="" placeholder="tomorrow, friday, next week">
            <a href="javascript:void(0);" class="add-on sui-bttn" style=""><i class="icon-calendar"></i></a>
          </div>
        </div>
      </div>

      <!-- Due Date  -->
      <div class="control-group">
        <label class="control-label" for="ticket_summary_">Due Time</label>
        <div class="controls">
          <input type="text" id="ticket_due_time_popup" placeholder="5PM, 18:00, etc" value="">
        </div>
      </div>
      <!-- Due Date  -->

      <div class="control-group">
        <label class="control-label" for="ticket_priority_">Priority</label>
        <div class="controls">
          <select id="ticket_priority_" name="ticket[priority]" value="2">
            <option value="1">High</option>
            <option value="2" selected="selected">Medium</option>
            <option value="3">Low</option>
          </select>
        </div>
      </div>

      <div class="control-group">
        <label class="control-label" for="ticket_form_category_list">Category</label>
        <div class="controls">
          <select id="ticket_form_category_list" name="ticket[category]">
          	<option value=""></option>
          	<option value="Hardware">Hardware</option>
          	<option value="Software">Software</option>
          	<option value="Network">Network</option>
          	<option value="User Setup">User Setup</option>
          	<option value="Email">Email</option>
          	<option value="Research">Research</option>
          	<option value="Password Reset">Password Reset</option>
          </select>
        </div>
      </div>

      <div class="control-group" style="display: none;">
        <label class="control-label" for="ticket_site">Site</label>
        <div class="controls">
          <select id="ticket_site" name="ticket[site_id]">
          </select>
        </div>
      </div>

     <div class="custom-attrs"></div>

     <div class="control-group">
       <label class="control-label" for="ticket_attachment">Attachment</label>
       <div class="controls">
          <div class="ticket-attachment">
            <div class="attachment-container">
              <div class="attachment-label"><i class="icon-attachment icon-24"></i><span></span></div>
              <a class="sui-bttn attach-file">Choose File</a>
              <input type="file" name="attachment" id="ticket_attachment">
            </div>
            <a href="javascript:void(0);" class="remove-attachment"><i class="icon-remove icon-light"></i></a>
          </div>
       </div>
     </div>

    </div>

    <div class="modal-footer">
      <a href="http://community.spiceworks.com/help/Submitting_Help_Desk_Tickets?utm_campaign=app_help&amp;utm_medium=app&amp;utm_source=app_ui" target="_blank"><i class="icon-help icon-24"></i></a>
      <button class="sui-bttn-primary sui-bttn" data-button-type="submit" data-primary="true" type="submit">Save</button>
      <button class="sui-bttn cancel">Cancel</button>
    </div>
  </form>
</div>
</div>

</html>