<?php

	
	
	class OrderReportController extends AppController{

		public function index(){

			$this->setFlash('Multidimensional Array.');
			
			//$connection = ConnectionManager::get('default');
			//print_r($connection);
			
		    /*$results = $this->query('SELECT o.name AS OrderName, part.name AS IngredientName, sum( d.quantity ) AS Value
			FROM orders AS o
			INNER JOIN order_details AS d ON d.order_id = o.id
			INNER JOIN items AS item ON item.id = d.item_id
			LEFT JOIN portions AS portions ON portions.item_id = d.item_id
			INNER JOIN portion_details AS pdetail ON pdetail.portion_id = portions.id
			INNER JOIN parts AS part ON part.id = pdetail.part_id
			GROUP BY o.name, part.name')->fetchAll('assoc');*/
			//print_r($results);

			$this->loadModel('Order');
			
			/*$options['fields'] = array(
			'Order.name','part.name'
			
			);*/
		
			$options['joins'] = array(
			array('table' => 'order_details',
				'alias' => 'd',
				'type' => 'inner',
				'conditions' => array(
					'Order.id = d.order_id'
				)
			),
			array('table' => 'items',
				'alias' => 'item',
				'type' => 'inner',
				'conditions' => array(
					'item.id = d.item_id'
				)
			),
			array('table' => 'portions',
				'alias' => 'portions',
				'type' => 'left',
				'conditions' => array(
					'portions.item_id = d.item_id'
				)
			),
			array('table' => 'portion_details',
				'alias' => 'pdetail',
				'type' => 'inner',
				'conditions' => array(
					'pdetail.portion_id = portions.id'
				)
			),
			array('table' => 'parts',
				'alias' => 'part',
				'type' => 'inner',
				'conditions' => array(
					'part.id = pdetail.part_id'
				)
			)
			
			
			);

			
			
			$options['group'] = array(
				'Order.name', 'part.name'
			);
			
			$results = $this->Order->find('all', $options); 

			/*$orders = $this->Order->find('all',array('conditions'=>array('Order.valid'=>1),'recursive'=>2));*/
			//print_r($results);
			//echo "</br>";
			//print_r($orders[0]['OrderDetail'] );
			// debug($orders);exit;
			
			//$this->loadModel('Portion');
			//$portions = $this->Portion->find('all',array('conditions'=>array('Portion.valid'=>1),'recursive'=>2));
			// debug($portions);exit;
			//print_r($portions[0]);

			// To Do - write your own array in this format
			$order_reports = array('Order 1' => array(
										'Ingredient A' => 1,
										'Ingredient B' => 12,
										'Ingredient C' => 3,
										'Ingredient G' => 5,
										'Ingredient H' => 24,
										'Ingredient J' => 22,
										'Ingredient F' => 9,
									),
								  'Order 2' => array(
								  		'Ingredient A' => 13,
								  		'Ingredient B' => 2,
								  		'Ingredient G' => 14,
								  		'Ingredient I' => 2,
								  		'Ingredient D' => 6,
								  	),
								);

			// ...

			$this->set('order_reports',$order_reports);

			$this->set('title',__('Orders Report'));
		}

		public function Question(){

			$this->setFlash('Multidimensional Array.');

			$this->loadModel('Order');
			$orders = $this->Order->find('all',array('conditions'=>array('Order.valid'=>1),'recursive'=>2));

			// debug($orders);exit;

			$this->set('orders',$orders);

			$this->loadModel('Portion');
			$portions = $this->Portion->find('all',array('conditions'=>array('Portion.valid'=>1),'recursive'=>2));
				
			// debug($portions);exit;

			$this->set('portions',$portions);

			$this->set('title',__('Question - Orders Report'));
		}

	}