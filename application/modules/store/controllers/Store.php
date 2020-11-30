<?php
/**
 * BlizzCMS
 *
 * @author  WoW-CMS
 * @copyright  Copyright (c) 2017 - 2020, WoW-CMS.
 * @license https://opensource.org/licenses/MIT MIT License
 * @link    https://wow-cms.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends MX_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('store_model');

		if (! $this->website->isLogged())
		{
			redirect('login');
		}
	}

	public function index()
	{
		$this->template->title(config_item('app_name'), lang('tab_store'));

		$this->template->build('index');
	}

	public function category($route = null)
	{
		if (empty($route) || $this->store_model->getCategoryExist($route) < 1)
		{
			show_404();
		}

		$data = [
			'route' => $route
		];

		$this->template->title(config_item('app_name'), lang('tab_store'));

		$this->template->build('category', $data);
	}

	public function cart()
	{
		$this->template->title(config_item('app_name'), lang('tab_cart'));

		$this->template->build('cart');
	}

	public function addtocart()
	{
		$id = $this->input->post('value');

		$data = array(
			'id' => $id,
			'name' => $this->store_model->getName($id),
			'price' => 0,
			'qty' => 1,
			'category' => $this->store_model->getCategory($id),
			'guid' => 0,
			'dp' => $this->store_model->getPriceDP($id),
			'vp' => $this->store_model->getPriceVP($id),
			'options' => array('Key' => uniqid())
		);

		$qq = $this->cart->insert($data);

		echo $qq ? true : false;
	}
 
	public function removeitem()
	{
		$rowid = $this->input->post('value');
		$qq = $this->cart->remove($rowid);

		echo $qq ? true : false;
	}

	public function updatequantity()
	{
		$qq = 0;
		$rowid = $this->input->get('rowid');
		$qty = $this->input->get('qty');

		if(!empty($rowid) && !empty($qty))
		{
			$data = array(
				'rowid' => $rowid,
				'qty'   => $qty
			);

			$qq = $this->cart->update($data);
		}

		echo $qq ? true : false;
	}

	public function updatecharacter()
	{
		$qq = 0;
		$rowid = $this->input->get('rowid');
		$guid = $this->input->get('char');

		if(!empty($rowid) && !empty($guid))
		{
			$data = array(
				'rowid' => $rowid,
				'guid'   => $guid
			);

			$qq = $this->cart->update($data);
		}

		echo $qq ? true : false;
	}

	public function checkout()
	{
		$itemid = $this->input->post('value');

		if($this->cart->count_items() == $this->cart->valid_items())
			echo $this->store_model->Checkout();
		else
			echo 'Selchars';
	}
}
