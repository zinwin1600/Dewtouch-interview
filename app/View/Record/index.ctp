<?php
// so we use the paginator object the shorter way.
// instead of using '$this->Paginator' everytime, we'll use '$paginator'
$paginator = $this->Paginator;
  
if($records){
  
    //creating our table
    echo "<div class='row-fluid'>
	<table class='table table-bordered' id='table_records'>";
  
        // our table header, we can sort the data record the paginator sort() method!
        echo "<tr>";
          
            // in the sort method, ther first parameter is the same as the column name in our table
            // the second parameter is the header label we want to display in the view
            echo "<th>" . $paginator->sort('id', 'ID') . "</th>";
            echo "<th>" . $paginator->sort('name', 'name') . "</th>";
           
        echo "</tr>";
          
        // loop through the records
        foreach( $records as $record ){
            echo "<tr>";
			
                echo "<td>{$record['Record']['id']}</td>";
                echo "<td>{$record['Record']['name']}</td>";
               
            echo "</tr>";
        }
          
    echo "</table></div>";
  
    // pagination section
    echo "<div class='paging'>";
  
        // the 'first' page button
        echo $paginator->first("First")." ";
          
        // 'prev' page button, 
        // we can check using the paginator hasPrev() method if there's a previous page
        // save with the 'next' page button
        if($paginator->hasPrev()){
            echo $paginator->prev("Prev")." ";
        }
          
        // the 'number' page buttons
        echo $paginator->numbers(array('modulus' => 2));
          
        // for the 'next' button
        if($paginator->hasNext()){
            echo " ".$paginator->next("Next");
        }
          
        // the 'last' page button
        echo " ".$paginator->last("Last");
      
    echo "</div>";
      
}
  
// tell the user there's no records found
else{
    echo "No record found.";
}
?>