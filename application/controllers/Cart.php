<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('product_model');
		$this->load->model('account_model');
		$this->load->model('cart_model');
		$this->load->library("cart");
	}
	public function quantityControl($product_id, $quantity_sell){
		
		$product_info=$this->product_model->getProductbyId($product_id);
		foreach ($product_info as $row)
		{
			$quantity= $row['quantity'];
			$sold= $row['sold'];

			// echo $product_id."-";
			// echo $quantity."-";
			// echo $quantity-$sold."-";
			// echo $quantity_sell."-";
		}
		
		$current_product=$quantity-$sold;
		if($quantity>0 and $current_product>=$quantity_sell){
			// echo $quantity."-";
			// echo $quantity-$sold."-";
			// echo $quantity_sell."-";
			return true;
		}else{

			return false;
		}	
	}
	public function index()
	{
		if(empty($_SESSION['userid'])){
			$this->load->view('cart_view');
		}else{
			$data=array("cart" => $this->cart_model->getCart($_SESSION['userid']));
			$this->load->view('cart_view', $data, FALSE);
		}
	}
	public function insert($id){
		$quantity = $this->input->post('quantity');
		$quantity=empty($quantity)?1:$quantity;
		$product_info=$this->product_model->getProductbyId($id);
		if($this->quantityControl($id, $quantity)){
			foreach ($product_info as $row)
			{
				$name = $row['name'];
				$image = $row['image'];
				$price = $row['price'];
				$discount= $row['discount'];
			}
			$price=$price*(100-$discount)/100;

			if(empty($_SESSION['userid'])){
				$data=array(
					"id" => $id,
					"name" => $name,
					"qty" => $quantity,
					"price" => $price,
					"image" =>$image
				);
        	// Them san pham vao gio hang
				if($this->cart->insert($data)){
					redirect('cart', 'refresh');
				}else{
					echo "Them san pham that bai";
				}
			}else{
				$this->cart_model->insertCart($_SESSION['userid'], $id, $quantity);
				redirect('cart', 'refresh');
			}
		}else{
			echo '
			<script>
			alert("Số lượng sản phẩm bạn mua lớn hơn số lượng hàng còn trong kho");
			window.history.back();
			</script>
			';
		}
		
	}
	public function delete($id){
		if(empty($_SESSION['userid'])){
			foreach($this->cart->contents() as $item){
				if($item['id'] == $id){
					$item['qty'] = 0;
					$delOne = array("rowid" => $item['rowid'], "qty" => $item['qty']);
				}
			}
			if($this->cart->update($delOne)){
				redirect($_SERVER['HTTP_REFERER']);
			}else{
				echo "Xoa san pham that bai";
			}
		}else{
			
			if($this->cart_model->delete($id)){
				redirect($_SERVER['HTTP_REFERER']);
			}else{
				echo "Xoa san pham that bai";
			}
		}
		
	}
	public function deleteAll(){
		if(empty($_SESSION['userid'])){
			$this->cart->destroy();
		}else{
			$this->cart_model->deleteAll($_SESSION['userid']);
		}
		
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function checkout(){
		if(empty($_SESSION['userid'])){
			echo 'Bạn phải đăng nhập để thanh toán';
		}else{
			$data=array("account"=>$this->account_model->getAccountbyId($_SESSION['userid']));
			$this->load->view('checkout_view', $data, FALSE);
		}

	}
	public function checkout_handler(){
		//kiem soat so luong san pham con lai
		$cart = $this->cart_model->getCart($_SESSION['userid']);
		$checkFlag=true;

		foreach ($cart as $key => $value) {
			if(!$this->quantityControl($value['product_id'], $value['quantity'])){
				echo $this->quantityControl($value['product_id'], $value['quantity']);
				$checkFlag=false;
			} 
		}
		
		if($checkFlag==1){
			//them hoa don
			$account_id=$_SESSION['userid'];
			$name = $this->input->post('name');
			$address = $this->input->post('address');
			$phone = $this->input->post('phone');
			$email = $this->input->post('email');
			$method = $this->input->post('method');
			$time =	date('Y-m-d H:i:s');

			$inserted_bill_id = $this->cart_model->insertBill($account_id, $name, $address, $phone, $email, $method, $time);
			
			
			
			foreach ($cart as $key => $value) {
				
				//them hoa don chi tiet
				$this->cart_model->insertbillDetail($inserted_bill_id, $value['product_id'], $value['quantity']);
				//cong san pham da ban
				
				$quantity_sell = $value['quantity']; //so luong trong gio hang
				$product_id = $value['product_id'];
				$data = $this->product_model->getProductbyId($value['product_id']);
				
				foreach ($data as $value) {
					$sold=$value['sold']; //lay so luong san pham da ban trong csdl
				}	
				
				$sold=$sold+$quantity_sell; //so luong moi
				
				$this->product_model->updatequantityProduct($product_id, $sold);

			}
			//huy het gio hang

			$this->cart_model->deleteAll($_SESSION['userid']);
			echo '
			<script>
			alert("Đặt hàng thành công");
			window.history.back();
			</script>
			';
		}else{
			echo '
			<script>
			alert("Giỏ hàng của bạn có sản phẩm đã hết hàng");
			window.history.back();
			</script>
			';
		}
	}
	public function edit(){
		$new_quantity = $this->input->post('quantity');
		$id = $this->input->post('id');

		
		$product_info=$this->product_model->getProductbyId($id);
		if($this->quantityControl($id, $new_quantity)){
			foreach ($product_info as $row)
			{
				$name = $row['name'];
				$image = $row['image'];
				$price = $row['price'];
				$discount= $row['discount'];
			}

			if(empty($_SESSION['userid'])){
				
				
				foreach($this->cart->contents() as $item){
					if($item['id'] == $id){
						$item['qty'] = $new_quantity ;
						$update = array("rowid" => $item['rowid'], "qty" => $item['qty']);
					}
				}
				if($this->cart->update($update)){
					redirect('cart', 'refresh');
				}else{
					echo "Update san pham that bai";
				}
 
			}else{
				$this->cart_model->updateCart($_SESSION['userid'], $id, $new_quantity);
				redirect('cart', 'refresh');
			}
		}else{
			echo '
			<script>
			alert("Số lượng sản phẩm bạn mua lớn hơn số lượng hàng còn trong kho");
			// window.history.back();
			</script>
			';
		}
	}
}

/* End of file cart.php */
/* Location: ./application/controllers/cart.php */