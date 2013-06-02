<?php
$config['world'] = 'world_1';
$config['starting_values'] = array(
			      'resources'=>
			      array(
				    'food'=>50,
				    'iron'=>20,
				    'wood'=>50,
				    'stone'=>50,
				    'shells'=>1
				    )
			      );

//base is amount per hour with no building
//base is the PV in compound interest equation
$i = .1;
$config['resource_settings'] =
  array(
	'food'=>array('i'=>$i, 'base'=>10, 'building'=>'farms', 'start'=>30),
	'iron'=>array('i'=>$i, 'base'=>5, 'building'=>'ironworks', 'start'=>10),
	'wood'=>array('i'=>$i, 'base'=>5, 'building'=>'lumber_mill', 'start'=>50),
	'stone'=>array('i'=>$i, 'base'=>10, 'building'=>'quarry', 'start'=>50),
	'shells'=>array('i'=>$i, 'base'=>1, 'building'=>'none', 'start'=>1)
	);


$hour = 60*60;
//time is in hours
$config['task_collections'] = array();

$building_template = array(
			'type'=>'buildings',
			'time'=>.05*$hour,
			'space'=>1,
			'compound'=>.6,//buildings cost based on compound intrest
			'resources'=>
			array(
			      'wood'=>20,
			      'stone'=>5,
			      'iron'=>1
			      )
			);

$main_house_task_options = 
  array('main_house', 'farms','ironworks','lumber_mill','quarry','barracks',
	'stables','archery_range','seige_workshop','dockyard','fortifications',
	'watchtower');

//have all main_house tasks default to building template
$config['task_collections']['main_house'] = array();
foreach($main_house_task_options as $option){
  $config['task_collections']['main_house'][$option] = $building_template;
}
//exceptions to the building template
$config['task_collections']['main_house']['farms']['resources'] = 
  array('wood'=>10,'stone'=>1,'iron'=>1);
$config['task_collections']['main_house']['fortifications']['resources'] = 
  array('stone'=>50);


//unit training
$unit_template = array(
			'type'=>'ground_units',
			'time'=>.1*$hour,
			'resources'=>
			array(
			      'wood'=>2,
			      'iron'=>1,
			      'food'=>30
			      )
			);
$config['task_collections']['barracks'] = 
  array(
	'swordfighter'=>$unit_template,
	'spearfighter'=>$unit_template
	);

$config['task_collections']['stables'] = 
  array(
	'calvery'=>array(
			'type'=>'ground_units',
			'time'=>$unit_template['time']*3,
			'resources'=>
			array(
			      'iron'=>20,
			      'food'=>90
			      )
			)
	);

$config['task_collections']['archery_range'] = 
  array(
	'archer'=>array(
			'type'=>'ground_units',
			'time'=>$unit_template['time']*1.5,
			'resources'=>
			array(
			      'wood'=>30,
			      'food'=>30
			      )
			)			      
	);

$config['task_collections']['seige_workshop'] = 
  array(
	'catapult'=>array(
			  'type'=>'special_units',
			  'time'=>$unit_template['time']*5,
			  'resources'=>array(
					     'wood'=>40,
					     'iron'=>40,
					     'stone'=>50
					     )
			  ),
	);


$config['task_collections']['dockyard'] = 
  array(
	'transport_ship'=>array(
				'type'=>'naval_units',
				'time'=>$unit_template['time']*.01,
				'resources'=>array(
						   'wood'=>100,
						   'iron'=>10,
						   )
				),
	'cannon_ship'=>array(
			     'type'=>'naval_units',
			     'time'=>$unit_template['time']*10,
			     'resources'=>array(
						'wood'=>100,
						'iron'=>100,
						)
			     )
	);

