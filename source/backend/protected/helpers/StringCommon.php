<?php
class StringCommon
{
	public static function  strNormal($str)
	{
		$marTViet=array("à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă",
                "ằ","ắ","ặ","ẳ","ẵ","è","é","ẹ","ẻ","ẽ","ê","ề"
                ,"ế","ệ","ể","ễ",
                "ì","í","ị","ỉ","ĩ",
                "ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ"
                ,"ờ","ớ","ợ","ở","ỡ",
                "ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
                "ỳ","ý","ỵ","ỷ","ỹ",
                "đ",
                "À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă"
                ,"Ằ","Ắ","Ặ","Ẳ","Ẵ",
                "È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
                "Ì","Í","Ị","Ỉ","Ĩ",
                "Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ"
                ,"Ờ","Ớ","Ợ","Ở","Ỡ",
                "Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
                "Ỳ","Ý","Ỵ","Ỷ","Ỹ",
                "Đ");

                $marKoDau=array("a","a","a","a","a","a","a","a","a","a","a"
                ,"a","a","a","a","a","a",
                    "e","e","e","e","e","e","e","e","e","e","e",
                    "i","i","i","i","i",
                    "o","o","o","o","o","o","o","o","o","o","o","o"
                    ,"o","o","o","o","o",
                    "u","u","u","u","u","u","u","u","u","u","u",
                    "y","y","y","y","y",
                    "d",
                    "A","A","A","A","A","A","A","A","A","A","A","A"
                    ,"A","A","A","A","A",
                    "E","E","E","E","E","E","E","E","E","E","E",
                    "I","I","I","I","I",
                    "O","O","O","O","O","O","O","O","O","O","O","O"
                    ,"O","O","O","O","O",
                    "U","U","U","U","U","U","U","U","U","U","U",
                    "Y","Y","Y","Y","Y",
                    "D");

                    $str = str_replace($marTViet,$marKoDau,$str);
                    return $str;
	}
	static public function str_normalizer($str,$type="-")
	{
		$str = self::strNormal($str);
		$str = str_replace(',','', $str);
		$str = str_replace('.','', $str);
		$str = str_replace('%','',$str);
		$str = str_replace('#','',$str);
		$str = str_replace('?','',$str);
		$str = str_replace('/','',$str);
		$str = str_replace('(','',$str);
		$str = str_replace(')','',$str);
		$str = str_replace('[','',$str);
		$str = str_replace(']','',$str);
		$str = str_replace('{','',$str);
		$str = str_replace('}','',$str);
		$str = str_replace('"','',$str);
		$str = str_replace('\'','',$str);
		$str = str_replace('+',$type,$str);
		$str = str_replace('_',$type,$str);
		$str = str_replace(' ',$type,$str);

		$str = mb_strtolower($str, 'UTF-8');
		 
		return $str;
	}
	public static function truncateString($string, $limit, $prefix=' ...')
	{
		if (strlen($string) > $limit){
				$string = substr($string, 0, $limit);
				$pos = strrpos($string, " ");
				if($pos === false) {
						return substr($string, 0, $limit). $prefix;
				}
					return substr($string, 0, $pos). $prefix;
			}else{
				return $string;
			}
	}
}
?>