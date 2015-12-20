<?php
class ControllerCommonHome extends Controller {
	public function index() {
		$this->document->setTitle($this->config->get('config_meta_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));
		$this->document->setKeywords($this->config->get('config_meta_keyword'));

		if (isset($this->request->get['route'])) {
			$this->document->addLink(HTTP_SERVER, 'canonical');
		}

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');
		
		$this->load->model('order/latest');
		$this->load->model('tool/upload');
		$this->load->model('tool/image');
		
		$limit = array(
			"page"=>1,
			"size"=>8
		);
		
		$results  = $this->model_order_latest->getOrderProductByPage($limit);
		
		$data["latestOrderProducts"] = array();
		
		foreach($results as $result){
			$orderInfo = $this->model_order_latest->getOrderInfo($result["order_id"]);
			$latestOrderProduct["date_added"] = $orderInfo[0]["date_added"];
			$latestOrderProduct["name"] = $orderInfo[0]["firstname"]." ".$orderInfo[0]["lastname"];
			$orderOptions = $this->model_order_latest->getOrderOption($result["order_product_id"]);
			foreach($orderOptions as $orderOption){
				if($orderOption["name"] == "pattern"){
					
					$filename = $this->model_tool_upload->getUploadByCode($orderOption["value"])["filename"];
					$name = $this->model_tool_upload->getUploadByCode($orderOption["value"])["name"];
					
					$latestOrderProduct["pattern"] = $this->model_tool_image->resizeFile($filename,$name,300,300);
				}else{
				    $latestOrderProduct[$orderOption["name"]] = $orderOption["value"];
				}
			}
			array_push($data["latestOrderProducts"],$latestOrderProduct);
		}
		
		$data["orderproduct"] = $this->url->link("common/orderproduct");
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/home.tpl')) {
			$this->response->setOutput($this->load->view($this->config->get('config_template') . '/template/common/home.tpl', $data));
		} else {
			$this->response->setOutput($this->load->view('default/template/common/home.tpl', $data));
		}
	}
}