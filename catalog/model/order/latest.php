<?php
class ModelOrderLatest extends Model {
	
	//查询总的订单产品数
	public function getTotalOrderProduct() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM `" . DB_PREFIX . "order_product`");
		return $query->row['total'];
	}

	//获取订单产品的订单信息
	public function getOrderInfo($order_id){
		$query = $this->db->query("SELECT firstname,lastname,date_added FROM `" . DB_PREFIX . "order` where order_id = ".$order_id);

		return $query->rows;
	}
	
	//获取订单产品的选项信息
	public function getOrderOption($order_product_id){
		$query = $this->db->query("SELECT name,value,type FROM `" . DB_PREFIX . "order_option` where order_product_id = ".$order_product_id);

		return $query->rows;
	}
	
	//分页获取订单产品
	public function getOrderProductByPage($limit){
		$query = $this->db->query("SELECT order_product_id,order_id FROM `" . DB_PREFIX . "order_product` order by order_product_id DESC limit ".(($limit["page"]-1)*$limit["size"]).",".$limit["size"]);

		return $query->rows;
	}
}
