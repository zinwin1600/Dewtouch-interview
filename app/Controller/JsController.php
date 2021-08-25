<?php

	
	class JsController extends AppController{
		
		public function q1(){
			
			$this->set('title',__('Question: Please change Pop Up to mouse over (soft click)'));
		}
		
			
		public function saveData(){
			
			
			$records = array();
 			
			$this->loadModel('TransactionItem');
			$this->TransactionItem->create();
			$wholedata = $this->request->data;
				
			
			foreach($wholedata as $data)
			{
				
				$record = array('TransactionItem' => array(
 						'transaction_id'=>1,
						'description'=>$data['description'],
						'quantity'=>$data['quantity'],
						'unit_price'=>$data['unitprice'],
						'uom'=>"",
						'sum'=>$data['quantity']*$data['unitprice']
						
 					));
					
				$this->TransactionItem->save($record);
				$this->TransactionItem->create();
			}	
 			
			
			$this->set('title',__('Successfully Saved!'));
		}
		
		
	}