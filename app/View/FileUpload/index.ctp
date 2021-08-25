<div class="row-fluid">
	<div class="alert alert-info">
		<h3>File Upload Question</h3>
	</div>

	<p>Complete the File Upload feature and import the attached <?php echo $this->Html->link('<i class="icon-share
"></i> CSV file', '/files/FileUpload.csv', array('escape' => false)); ?>. Imported data will be shown below.</p>
	<p><em>* score will be given for filetype/mimetype checks</em></p>

	<hr />

	<div class="alert">
		<h3>Import Form</h3>
	</div>

<form enctype='multipart/form-data' action='' method='post'>
<?php
echo $this->Form->input('file', array('label' => 'File Upload', 'type' => 'file'));
echo $this->Form->submit('Upload', array('class' => 'btn btn-primary'));
?>
</form>


	<hr />

	<div class="alert alert-success">
		<h3>Data Imported</h3>
	</div>

	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				
				<th>Name</th>
				<th>Email</th>
				
			</tr>
		</thead>
		<tbody>
<?php

 ini_set("auto_detect_line_endings", true);

 if ($file_uploads['file']['tmp_name'] != "") {

 $i = 0;
 
 $handle = fopen($file_uploads['file']['tmp_name'], "r");
 
 while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
 {
	if($i != 0) {
 ?>
 
			<tr>
				<td><?php echo $data[0];  ?>
				<td><?php echo $data[1];  ?>
			</tr>
			
<?php
			  } $i = $i+1;
 }

fclose($handle);
		 
		 
}
?>

		</tbody>
	</table>
</div>