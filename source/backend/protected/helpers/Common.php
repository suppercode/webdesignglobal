<?php
class Common{
	public static function EncryptClientId($id,$num = 8){
		return substr(md5($id), 0, $num).dechex($id);
	}

	public static function DecryptClientId($id,$num = 8){
		$md5_8 = substr($id, 0, $num);
		$real_id = hexdec(substr($id, $num));
		return ($md5_8==substr(md5($real_id), 0, $num)) ? $real_id : 0;
	}
public static function getFileType($ext) {
	
	// Accepted MIME types are set here as PCRE unless provided.
		$mimes = array(
		'jpg' => 'image/jpeg',
		'jpeg' => 'image/jpeg',
		'jpe' => 'image/jpeg',
		'gif' => 'image/gif',
		'png' => 'image/png',
		'bmp' => 'image/bmp',
		'jad' => 'text/vnd.sun.j2me.app-descriptor',
		'jar' => 'application/java-archive',
		'sis' => 'application/vnd.symbian.install',
		'sisx' => 'pplication/octet-stream',
		'ipa' => 'application/octet-stream',
		'apk' => 'application/octet-stream',
		'nth' => 'application/theme-nokia',
		'tif|tiff' => 'image/tiff',
		'tiff' => 'image/tiff',
		'ico' => 'image/x-icon',
		'asf' => 'video/asf',
		'wmx' => 'video/asf',
		'wmv' => 'video/asf',
		'wax' => 'video/asf',
		'asx' => 'video/asf',
		'avi' => 'video/avi',
		'divx' => 'video/divx',
		'flv' => 'video/x-flv',
		'qt' => 'video/quicktime',
		'mov' => 'video/quicktime',
		'mpeg' => 'video/mpeg',
		'mpg' => 'video/mpeg',
		'mpe' => 'video/mpeg',
		'txt' => 'text/plain',
		'csv' => 'text/csv',
		'tsv' => 'text/tab-separated-values',
		'rtx' => 'text/richtext',
		'css' => 'text/css',
		'htm|html' => 'text/html',
		'mp3' => 'audio/mpeg',
		'm4a' => 'audio/mpeg',
		'm4b' => 'audio/mpeg',
		'm4v' => 'video/mp4',
		'mp4' => 'video/mp4',
		'ra|ram' => 'audio/x-realaudio',
		'wav' => 'audio/wav',
		'oga' => 'audio/ogg',
		'ogg' => 'audio/ogg',
		'ogv' => 'video/ogg',
		'midi' => 'audio/midi',
		'mid' => 'audio/midi',
		'wma' => 'audio/wma',
		'mka' => 'audio/x-matroska',
		'mkv' => 'video/x-matroska',
		'rtf' => 'application/rtf',
		'js' => 'application/javascript',
		'pdf' => 'application/pdf',
		'docx' => 'application/msword',
		'doc' => 'application/msword',
		'pot|pps|ppt|pptx|ppam|pptm|sldm|ppsm|potm' => 'application/vnd.ms-powerpoint',
		'wri' => 'application/vnd.ms-write',
		'xls' => 'application/vnd.ms-excel',
		'xla|xls|xlsx|xlt|xlw|xlam|xlsb|xlsm|xltm' => 'application/vnd.ms-excel',
		'mdb' => 'application/vnd.ms-access',
		'mpp' => 'application/vnd.ms-project',
		'docm|dotm' => 'application/vnd.ms-word',
		'pptx|sldx|ppsx|potx' => 'application/vnd.openxmlformats-officedocument.presentationml',
		'xlsx|xltx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml',
		'docx|dotx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml',
		'onetoc|onetoc2|onetmp|onepkg' => 'application/onenote',
		'swf' => 'application/x-shockwave-flash',
		'class' => 'application/java',
		'tar' => 'application/x-tar',
		'zip' => 'application/zip',
		'gz|gzip' => 'application/x-gzip',
		'exe' => 'application/x-msdownload',
		// openoffice formats
		'odt' => 'application/vnd.oasis.opendocument.text',
		'odp' => 'application/vnd.oasis.opendocument.presentation',
		'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
		'odg' => 'application/vnd.oasis.opendocument.graphics',
		'odc' => 'application/vnd.oasis.opendocument.chart',
		'odb' => 'application/vnd.oasis.opendocument.database',
		'odf' => 'application/vnd.oasis.opendocument.formula',
		// wordperfect formats
		'wp|wpd' => 'application/wordperfect',
		);
		
		return $mimes[$ext];
	}
	public static function getCoverSize($size=0)
	{
			$kbSize = round($size/1024,2);
		return $kbSize.' KB';
	}
	public static function FormatDateAgo($t)
	{
		$t_now = time();

	$tdiff = $t_now - $t;
	if ($tdiff > 24 * 60 * 60) {
		return date('H:i d/m/Y', $t);
	} else if ($tdiff > 60 * 60) {
		return floor($tdiff / 60 / 60) . ' Giờ trước';
	}
	return floor($tdiff / 60) . ' Phút trước';
	}
	public static function ReadConfig()
	{
		$file_config = Yii::app()->getBasePath().'/config/config.txt';
		$read = file_get_contents($file_config);
		if($read!=''){
			$data = explode("\n", $read);
			if(count($data)>0){
				$Result = array();
				foreach ($data as $value){
					if($value!='' && strpos($value, '{:}')!==false){
						$ex = explode('{:}', $value);
						$Result[$ex[0]] = $ex[1];
					}
				}
				return $Result;
			}
		}
		return false;
	}
	
	public static function Recursive($data, $parentid=0)//de qui
	{
		  $catList = "<ul >";
		   foreach($data as $key =>$aCat) {
		      if ($aCat->parent_id == $parentid) {
		         $catList .= "<li>".$aCat->name."</li>";
		         $catList .= self::Recursive($data, $aCat->id);
		      }
		   }
		 $catList .= "</ul>";
		return $catList;
	}
}
?>