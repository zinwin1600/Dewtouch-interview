<?php
	class TypesController extends AppController{
		
	
		public function q1_selection(){

			$this->setFlash('Selection result');
			
			$data = $this->request->data;
			
			$this->set('type', $data['Type']['type']);
			

		}
		
		
	}