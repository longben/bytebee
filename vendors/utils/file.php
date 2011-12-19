<?php

  //得到文件扩展名
  function getFileExtension($file){
    $n=strrchr($file,'.');//截取字符串，找不到则返回false
    return (!$n)?false:strtolower(substr($n,1));
  }


  //得到文件的mime
  function getFileMime($file_extension){
	$file_type=array(); 
	$file_type['hqx']="application/mac-binhex40"; 
	$file_type['bin']="application/octet-stream"; 
	$file_type['oda']="application/oda"; 
	$file_type['pdf']="application/pdf"; 
	$file_type['ai']="application/postsrcipt"; 
	$file_type['eps']="application/postsrcipt"; 
	$file_type['es']="application/postsrcipt"; 
	$file_type['rtf']="application/rtf"; 
	$file_type['mif']="application/x-mif"; 
	$file_type['csh']="application/x-csh"; 
	$file_type['dvi']="application/x-dvi"; 
	$file_type['hdf']="application/x-hdf"; 
	$file_type['nc']="application/x-netcdf"; 
	$file_type['cdf']="application/x-netcdf"; 
	$file_type['latex']="application/x-latex"; 
	$file_type['ts']="application/x-troll-ts"; 
	$file_type['src']="application/x-wais-source"; 
	$file_type['zip']="application/zip"; 
	$file_type['rar']="application/x-rar-compressed"; 
	$file_type['bcpio']="application/x-bcpio"; 
	$file_type['cpio']="application/x-cpio"; 
	$file_type['gtar']="application/x-gtar"; 
	$file_type['shar']="application/x-shar"; 
	$file_type['sv4cpio']="application/x-sv4cpio"; 
	$file_type['sv4crc']="application/x-sv4crc"; 
	$file_type['tar']="application/x-tar"; 
	$file_type['ustar']="application/x-ustar"; 
	$file_type['man']="application/x-troff-man"; 
	$file_type['sh']="application/x-sh"; 
	$file_type['tcl']="application/x-tcl"; 
	$file_type['tex']="application/x-tex"; 
	$file_type['texi']="application/x-texinfo"; 
	$file_type['texinfo']="application/x-texinfo"; 
	$file_type['t']="application/x-troff"; 
	$file_type['tr']="application/x-troff"; 
	$file_type['roff']="application/x-troff"; 
	$file_type['shar']="application/x-shar"; 
	$file_type['me']="application/x-troll-me"; 
	$file_type['ts']="application/x-troll-ts"; 
	$file_type['gif']="image/gif"; 
	$file_type['jpeg']="image/pjpeg"; 
	$file_type['jpg']="image/jpeg"; 
	$file_type['jpe']="image/pjpeg"; 
	$file_type['ras']="image/x-cmu-raster"; 
	$file_type['pbm']="image/x-portable-bitmap"; 
	$file_type['ppm']="image/x-portable-pixmap"; 
	$file_type['xbm']="image/x-xbitmap"; 
	$file_type['xwd']="image/x-xwindowdump"; 
	$file_type['ief']="image/ief"; 
	$file_type['tif']="image/tiff"; 
	$file_type['tiff']="image/tiff"; 
	$file_type['pnm']="image/x-portable-anymap"; 
	$file_type['pgm']="image/x-portable-graymap"; 
	$file_type['rgb']="image/x-rgb"; 
	$file_type['xpm']="image/x-xpixmap"; 
	$file_type['txt']="text/plain"; 
	$file_type['c']="text/plain"; 
	$file_type['cc']="text/plain"; 
	$file_type['h']="text/plain"; 
	$file_type['html']="text/html"; 
	$file_type['htm']="text/html"; 
	$file_type['htl']="text/html"; 
	$file_type['rtx']="text/richtext"; 
	$file_type['etx']="text/x-setext"; 
	$file_type['tsv']="text/tab-separated-values"; 
	$file_type['mpeg']="video/mpeg"; 
	$file_type['avi']="video/avi"; 
	$file_type['rm']="video/rm"; 
	$file_type['rmvb']="video/rmvb"; 
	$file_type['wmv']="video/x-ms-wmv"; 
	$file_type['flv']="application/octet-stream"; 
	$file_type['mpg']="video/mpeg"; 
	$file_type['mpe']="video/mpeg"; 
	$file_type['avi']="video/x-msvideo"; 
	$file_type['qt']="video/quicktime"; 
	$file_type['mov']="video/quicktime"; 
	$file_type['moov']="video/quicktime"; 
	$file_type['movie']="video/x-sgi-movie"; 
	$file_type['au']="audio/basic"; 
	$file_type['mp3']="audio/mp3"; 
	$file_type['snd']="audio/basic"; 
	$file_type['wav']="audio/wav"; 
	$file_type['wma']="audio/x-ms-wma"; 
	$file_type['aif']="audio/x-aiff"; 
	$file_type['aiff']="audio/x-aiff"; 
	$file_type['aifc']="audio/x-aiff"; 
	$file_type['swf']="application/x-shockwave-flash"; 
	$file_type['doc']="application/msword"; 
	$file_type['ini']='application/octet-stream'; 
	$file_type['sql'] = 'application/x-sql';

	return $file_type[$file_extension];
  }


function cutStr($string, $length) {
   $strcut = '';
   $strLength = 0;
   if(strlen($string) > $length) {
       //将$length换算成实际UTF8格式编码下字符串的长度
       for($i = 0; $i < $length; $i++) {
           if ( $strLength >= strlen($string) )
               break;
           //当检测到一个中文字符时
           if( ord($string[$strLength]) > 127 )
               $strLength += 3;
           else
               $strLength += 1;
       }
       return substr($string, 0, $strLength);
   } else {
       return $string;
   }
}
?>