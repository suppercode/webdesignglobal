<?php
class ShopHelpers{
	public static function getCartContent($json)
	{
		if(strpos($json, ':')!==false && !empty($json)){
			$data = CJSON::decode($json);
			//echo '<pre>';print_r($data);
			$total = 0;
			if(count($data)>0){
				$html = "<table>";
				$html .= "<tr><td style='background: #F0D726'>Sản phẩm</td><td style='background: #F0D726'>Số lượng</td><td style='background: #F0D726'>Giá</td><td style='background: #F0D726'>Thành tiền</td></tr>";
				foreach ($data as $key =>$item){
					$html .= "<tr><td>".BackendShopProductsModel::model()->findByPk($item['product_id'])->title."</td><td>{$item['amount']}</td><td>".Shop::priceFormat($item['price'])."</td><td>".Shop::priceFormat($item['price_total'])."</td></tr>";
					$total += $item['price_total'];
				}
				$html .="<tr><td style='text-align: right;color: #D14336;font-weight: bold' colspan='4'>Tổng tiền: ".Shop::priceFormat($total)."</td></tr>";
				$html .="</table>";
			}
			return $html;
		}
		return null;
	}
}