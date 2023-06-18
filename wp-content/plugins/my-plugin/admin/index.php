<?php

// Start up the engine
class Admin_My_Plugine
{
	/**
	 * This is our constructor
	 *
	 * @return void
	 */

	public function __construct()
	{
		$this->add_ajax();
	}

	private function add_ajax()
	{
		require_once __DIR__ . '/Ajax.php';
	}
}

new Admin_My_Plugine();