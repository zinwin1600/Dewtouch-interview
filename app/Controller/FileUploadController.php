<?php

class FileUploadController extends AppController {
	
	public function index() {
		
		$this->set('title', __('File Upload Answer'));
		$file_uploads = $this->request->data;
		
		if($this->request->post){
		$mimes = array('application/vnd.ms-excel','text/csv');
		if(in_array($file_uploads['FileUpload']['file']['type'],$mimes)){
		 
		 // do something
		 $this->set('file_uploads',$file_uploads);	
			

		} else {
		  die("Sorry, mime type not allowed");
		}
		}
		
		$this->set(compact('file_uploads'));
	}
	
}