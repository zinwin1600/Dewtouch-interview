<?php
	class RecordController extends AppController{
		
		

		public function initialize()
		{
			parent::initialize();
			$this->loadComponent('Flash'); // Include the FlashComponent
			$this->loadComponent('Paginator');
		}
		
		public function index()
		{
			ini_set('memory_limit','256M');
			set_time_limit(0);
			
			$this->setFlash('Listing Record page too slow, try to optimize it.');
			
			$this->paginate = array('Record' => array(
								
								'fields' => array('id','name'),
								'limit' => '15'
								
							));
	

			$this->set('records', $this->paginate('Record'));

			$this->set('title',__('List Record'));
		}
		
		
		
		
// 		public function update(){
// 			ini_set('memory_limit','256M');
			
// 			$records = array();
// 			for($i=1; $i<= 1000; $i++){
// 				$record = array(
// 					'Record'=>array(
// 						'name'=>"Record $i"
// 					)			
// 				);
				
// 				for($j=1;$j<=rand(4,8);$j++){
// 					@$record['RecordItem'][] = array(
// 						'name'=>"Record Item $j"		
// 					);
// 				}
				
// 				$this->Record->saveAssociated($record);
// 			}
			
			
			
// 		}
	}
	
	
	