<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Online_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getOnlinePlayers($realm)
	{
		return $this->realm->char_connect($realm)->select('name, race, class, level, zone')->where('online', '1')->order_by('name', 'DESC')->get('characters')->result();
	}
}
