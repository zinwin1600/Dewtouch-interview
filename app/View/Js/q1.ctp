<div class="alert  ">
<button class="close" data-dismiss="alert"></button>
Question: Advanced Input Field</div>

<p>
1. Make the Description, Quantity, Unit price field as text at first. When user clicks the text, it changes to input field for use to edit. Refer to the following video.

</p>


<p>
2. When user clicks the add button at left top of table, it wil auto insert a new row into the table with empty value. Pay attention to the input field name. For example the quantity field

<?php echo htmlentities('<input name="data[1][quantity]" class="">')?> ,  you have to change the data[1][quantity] to other name such as data[2][quantity] or data["any other not used number"][quantity]

</p>



<div class="alert alert-success">
<button class="close" data-dismiss="alert"></button>
The table you start with</div>

<?php echo $this->Form->create('Js', array('action' => '/saveData','inputDefaults'=>array(
				
				'label'=>false)));?>
 
<table id="tbleditable" class="table table-striped table-bordered table-hover">
<thead>
<th><span id="add_item_button" class="btn mini green addbutton" onclick="addToObj=false">
											<i class="icon-plus"></i></span></th>
<th>Description</th>
<th>Quantity</th>
<th>Unit Price</th>
</thead>

<tbody>

	<tr>
	<td></td>

	<td><p data-editable type="data[1][description]">Description</p><textarea name="data[1][description]" style="display:none;"></textarea></td>
	<td><p data-editable type="data[1][quantity]">Quantity</p><input name="data[1][quantity]" style="display:none;"></input></td>
	<td><p data-editable type="data[1][unitprice]">Unit Price</p><input name="data[1][unitprice]" style="display:none;"></input></td>
	</tr>
	


</tbody>

</table>
<?php echo $this->Form->input('Save', array('id'=>'btnsave', 'class'=>'custombtn', 'type' => 'submit' ));?>
<?php echo $this->Form->end();?>

<p></p>
<div class="alert alert-info ">
<button class="close" data-dismiss="alert"></button>
Video Instruction</div>

<p style="text-align:left;">
<video width="78%"   controls>
  <source src="<?php echo Router::url("/video/q3_2.mov") ?>">
Your browser does not support the video tag.
</video>
</p>


<style>



.custombtn{

  display: block;
  background-color: #0ca6f2;
  top: -5px;
  left: -5px;
  bottom: -5px;
  right: -5px;
  z-index: -1;
  border-radius: 10px;
  background-image: linear-gradient(to bottom, #4AC9FA 0%, #0b95d9 40%);
  box-shadow: 0px -1px 2px 0 #065881 inset,
              0px 1px 1px 1px #ccc,
              0 0 0 6px #fff,
              0 2px 12px 8px #ddd;
  width: 80px;
  margin-top: 15px;

}


</style>


<?php $this->start('script_own');?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
<script>
	
	var i = 1;
	
	$(document).ready(function(){

			$("#add_item_button").click(function(){
					
			$("#tbleditable").each(function () {
       
					i += 1;
					var tds = '<tr>';
					
					
					tds += '<td></td>';
					tds += '<td><p data-editable type="data[' + i + '][description]"  style="width:100%;">' + '&nbsp;</p><textarea name="data[' + i + '][description]"  style="display:none;"></textarea></td>';
					tds += '<td><p data-editable type="data[' + i + '][quantity]" style="width:100%;">' + '&nbsp;</p><input name="data[' + i + '][quantity]"  style="display:none;"></input></td>';
					tds += '<td><p data-editable type="data[' + i + '][unitprice]" style="width:100%;">' + '&nbsp;</p><input name="data[' + i + '][unitprice]"  style="display:none;"></input></td>';
					
					
					
					tds += '</tr>';
					
					$('#tbleditable tr:last').after(tds);
					
				
				});
			
				

				});
		
	
	
	
	$('body').on('click', '[data-editable]', function (event) {
		  
	
			 
			  
			  var $el = $(this);
			  var data = $el.text();
			  var type = $el.attr('type');
		
			  var $input = "";
			  $el.hide();
			  
			  if(type.includes("description"))
			  {
				 $("textarea[name='"+type+"']").show();
				 $("textarea[name='"+type+"']").blur(function(e){ 
				 
					$(this).hide();
					data = ($(this).val() == "") ? "&nbsp;" : $(this).val();
					$el.html(data);
					$el.show();
				 
				 });
				 
			  }
			  else
			  {
				 
				 $("input[name='"+type+"']").show();
				 $("input[name='"+type+"']").blur(function(e){ 
				 
					$(this).hide();
					data = ($(this).val() == "") ? "&nbsp;" : $(this).val();
					$el.html(data);
					$el.show();				
					
				 
				 });
				 
			  }
				
	
	});
	

	
});

</script>
<?php $this->end();?>

