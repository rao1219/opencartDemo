<?php
class ControllerModuleLatestOrder extends Controller {
	public function index($setting) {
		$this->load->language('module/latestorder');

		$data['heading_title'] = $this->language->get('heading_title');

		$this->load->model('order/product');

		$this->load->model('tool/image');


		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/latestorder.tpl')) {
			return $this->load->view($this->config->get('config_template') . '/template/module/latestorder.tpl', $data);
		} else {
			return $this->load->view('default/template/module/latestorder.tpl', $data);
		}
	}
}
