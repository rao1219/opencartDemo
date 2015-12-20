<?php
class ModelCheckoutOrder extends Model {
	
	//查询总的订单数
	public function getTotalOrders() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM `" . DB_PREFIX . "order`");

		return $query->row['total'];
	}

	//获取最新订单
	public function getLatestOrders($limit){
		$query = $this->db->query("SELECT order_id,firstname,lastname,date_added FROM `" . DB_PREFIX . "order` order by date_added DESC limit 0,".$limit);
		
		$query = $this->db->query($sql);

		return $query->rows;
	}
	
	//分页获取订单
	public function getOrdersByPage($limit){
		$query = $this->db->query("SELECT order_id,firstname,lastname,date_added FROM `" . DB_PREFIX . "order` order by date_added DESC limit ".$limit["page"].",".$limit["size"]);
		
		$query = $this->db->query($sql);

		return $query->rows;
	}
	
	//获取订单产品
	public function getOrderProducts($order_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "order_product WHERE order_id = '" . (int)$order_id . "'");

		return $query->rows;
	}
	
	//获取订单选项
	public function getOrderOptions($order_id, $order_product_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "order_option WHERE order_id = '" . (int)$order_id . "' AND order_product_id = '" . (int)$order_product_id . "'");

		return $query->rows;
	}
}
