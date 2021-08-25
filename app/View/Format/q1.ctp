
<div id="message1">


<?php echo $this->Form->create('Type',array('id'=>'form_type','type'=>'file','class'=>'','method'=>'POST','autocomplete'=>'off','action' => '/q1_selection', 'inputDefaults'=>array(
				
				'label'=>false,'div'=>false,'type'=>'text','required'=>false)))?>
	
<?php echo __("Hi, please choose a type below:")?>
<br><br>

<?php $options_new = array(
 		'Type1' => __('<span class="showDialog" data-id="dialog_1" style="color:blue">Type1</span><div id="dialog_1" class="hide dialog" title="Type 1">
 				<span style="display:inline-block"><ul><li>Description .......</li>
 				<li>Description 2</li></ul></span>
 				</div>'),
		'Type2' => __('<span class="showDialog" data-id="dialog_2" style="color:blue">Type2</span><div id="dialog_2" class="hide dialog" title="Type 2">
 				<span style="display:inline-block"><ul><li>Desc 1 .....</li>
 				<li>Desc 2...</li></ul></span>
 				</div>')
		);?>

<?php echo $this->Form->input('type', array('legend'=>false, 'type' => 'radio', 'options'=>$options_new, 'onClick' => 'addSave()', 'before'=>'<label class="radio line notcheck">','after'=>'</label>' ,'separator'=>'</label><label class="radio line notcheck">'));?>
<?php echo $this->Form->input('Save', array('id'=>'btnsave', 'class'=>'custombtn', 'type' => 'submit', 'style' => 'display:none;' ));?>


<?php echo $this->Form->end();?>

</div>

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

.showDialog:hover{
	text-decoration: underline;
}

#message1 .radio{
	vertical-align: top;
	font-size: 13px;
}

.control-label{
	font-weight: bold;
}

.wrap {
	white-space: pre-wrap;
}

</style>

<?php $this->start('script_own')?>
<script>

$(document).ready(function(){
	$(".dialog").dialog({
		autoOpen: false,
		width: '500px',
		modal: true,
		dialogClass: 'ui-dialog-blue'
	});

	
	$(".showDialog").click(function(){ var id = $(this).data('id'); $("#"+id).dialog('open'); });

});

function addSave()
{
	
	document.getElementById("btnsave").style.display = "block"; 
	document.getElementById("btnsave").focus(); 
}

function gotoPage()
{
	
	window.location.replace("http://www.w3schools.com");
}

</script>
<?php $this->end()?>