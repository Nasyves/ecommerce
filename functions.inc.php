<?php
function pr($arr){
	echo '<pre>';
	print_r($arr);
}

function prx($arr){
	echo '<pre>';
	print_r($arr);
	die();	
}

function get_safe_value($con,$str){
	if($str!=''){
		$str=trim($str);
		return mysqli_real_escape_string($con,$str);
	}
}

function get_product($con,$cat_id='',$product_id=''){
	$sql = "select product.*,categories.categories from product,categories where product.status=1";
	if ($cat_id!='') {
		$sql.=" and product.categories_id=$cat_id";
	}
	if ($product_id!='') {
		$sql.=" and product.id=$product_id";
	}
	$sql.=" and product.categories_id=categories.id";
	$sql.=" order by product.id desc";
	$res=mysqli_query($con, $sql);
	$data=array();
	while ($row=mysqli_fetch_assoc($res)) {
		$data[]=$row;
	}
	return $data;
}

function get_product_home($con,$limit=''){
	$sql = "select * from product where status=1 order by id desc limit 4";

	$res=mysqli_query($con, $sql);
	$data=array();
	while ($row=mysqli_fetch_assoc($res)) {
		$data[]=$row;
	}
	return $data;
}
?>