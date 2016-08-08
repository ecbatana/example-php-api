<?php
	/**
	 * Example: Simple API with PHP
	 * 
	 * @author github.com/armenthiz
	 */

	/**
	 * Set Content-type to application/json
	 */
	header('Content-type: application/json');
	
	$get = $_GET; // set global $_GET to variable $get
	$route = array('name'); // set the available route
	$data = array( // example fetched data from DB
		'aldy' => array(
			'name'		=> 'Aldy Surachman',
			'school'	=> array(
				'SD'	=> 'SD Maleber Barat Bandung',
				'SMP'	=> 'SMP Mutiara 1 Bandung',
				'SMK'	=> 'SMK Pasundan 2 Bandung'
			),
			'skill'		=> array('Webdev', 'Graphic Design', 'Office Application')
		),
	);

	/**
	 *
	 * Let's Begin
	 * at first, check if get is not empty
	 * 
	 */
	if (! empty($get) && count($get) > 0 && isset($get)) {
		/**
		 * If get is not empty, define the variable named $json
		 * this variable is used to contain the result of the json
		 */
		$json;

		/**
		 * After it, let's we iterate the passed $get in browser url,
		 * First, check if $key is exist in the array $route,
		 * If exist, check if the $value is exist in the fetched datas,
		 * If available, pass the selected data into variable $json
		 *
		 * the main reason why i don't put the else statement because, 
		 * i don't want the error notify showed, to deal this we can check soon
		 * when this json was called ..
		 */
		foreach ($get as $key => $value) {
			if (in_array($key, $route)) {
				if (! empty($data[$value]) && count($data[$value]) > 0 && isset($data[$value])) {
					$json = $data[$value];
				}
			}
		}
	}

	/**
	 * And, we finish
	 * echo and put the variable $json inside json_encode function
	 */
	echo json_encode($json);