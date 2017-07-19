
<?php
 //ライブラリをインクルード
 require_once('simple_html_dom.php');
 
//file_get_htmlでurlまたはファイルを指定する
 $html = file_get_html("sample.html");
 
 //文字化け対策
 mb_language('Japanese');
 echo '$out = $html->find(\'a\')でa属性のhrefの文字列を抽出<br>';
 //findで取り込みたい場所をしていする
 $out = $html->find('a');
 foreach($out as $elm){
 echo $elm->href.'<br>';
 }
 echo '<br>';
 
?>