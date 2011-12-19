include "big2gb.php";  
  
$obj=new big2gb;  
  
//简体 转换 繁体  
$string_big5 = $obj->chg_utfcode($string_gb,'big5');  
  
//繁体 转换 简体  
$string_gb = $obj->chg_utfcode($string_big5,'gb2312''); 