include "big2gb.php";  
  
$obj=new big2gb;  
  
//���� ת�� ����  
$string_big5 = $obj->chg_utfcode($string_gb,'big5');  
  
//���� ת�� ����  
$string_gb = $obj->chg_utfcode($string_big5,'gb2312''); 