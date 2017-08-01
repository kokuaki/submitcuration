
<?php
include "simple_html_dom.php";

$setwebnumber = range(30000,30100);



// $sabmitsiteall = array("http://hp.submit.ne.jp/producer/show/29658", "http://hp.submit.ne.jp/producer/show/30678", "http://hp.submit.ne.jp/producer/show/27966");
$number = range(0,100);
// for ($i = 0; $i <= 1000; $i++) {
// echo $a[$i];
// }


// $html = file_get_html( "$sabmitsiteall[0]" );


header('Content-Type: text/html; charset=utf-8');

date_default_timezone_set('Asia/Tokyo');
mb_language("Japanese");

echo '$out = $html->find(\'tr\',0);でH1タグの情報を取り出す<br>';





// $stringout0 = $out0->plaintext;
// $stringout1 = $out0->outertext;
// $stringout2 = $out0->innertext;

// echo $out0-> outertext;
// echo $out2-> outertext;
// echo $out3-> outertext;
// echo $out4-> outertext;
// echo $out5-> outertext;
// echo $out6-> outertext;
// echo $out7-> outertext;
// 
// echo $out8-> innertext;
// echo $out9-> innertext;
// echo $out10-> innertext;
// echo $out11-> innertext;

// print $stringout0;

// $var1 = '';
// 
// $var1 = $out0;
// echo $var1;
////////////////////////////////////////////
////////////////////////////////////////////
////////////////////////////////////////////
////////////////////////////////////////////
////////////////////////////////////////////
////////////////////////////////////////////
////////////////////////////////////////////
////////////////////////////////////////////

// http://web-dev.xyz/phpexcel-1/
//ライブラリをインクルード
require_once(__DIR__ . "/lib/PHPExcel.php");
require_once(__DIR__ . "/lib/PHPExcel/IOFactory.php");
ini_set('memory_limit', '1024M');

// $source = mb_convert_encoding($source, 'utf-8', 'auto');

// エクセルを新規作成
$excel = new PHPExcel();
 
// 0番目のシートをアクティブにします(シートは0から数えます)
// (エクセルを新規作成した時点で0番目の空のシートが作成されています)
$excel->setActiveSheetIndex(0);

// シートに対して何かを行うためにアクティブになっているシートを変数に入れます
$sheet = $excel->getActiveSheet();

// シートに名前を付けます
$sheet->setTitle("キュレーション");


////////////////////////////////////
///////////////////////////////////
//            header
////////////////////////////////////
///////////////////////////////////
// セル(A1)に値を入力します。
$sheet->setCellValue('A1', '企業名');
$sheet->setCellValue('B1', '代表者名');
$sheet->setCellValue('C1', '資本金');
$sheet->setCellValue('D1', '従業員数');
$sheet->setCellValue('E1', '担当者');
$sheet->setCellValue('F1', '提供可能サービス');
////////////////////////////////////
///////////////////////////////////
//            header
////////////////////////////////////
///////////////////////////////////
// セル名ではなく数値(座標)で値を入力する方法もあります
// 第1引数は列を「0から」数えた数値、第2引数は行を「1から」数えた数値になります
// 下記はA2に値を入力しています
// $sheet->setCellValueByColumnAndRow(0, 2, "$stringout0");
// 
// for ($i = 1; $i <= 1; $i++) {
//     echo $i;
// }



foreach($number as $rownumber){
  $html = file_get_html( "http://hp.submit.ne.jp/producer/show/" . "$setwebnumber[$rownumber]" );
  
  
  //H1タグの情報を取り出す
  $out0 = $html->find('td',0);
  $out1 = $html->find('td',4);
  $out2 = $html->find('td',5);
  $out3 = $html->find('td',6);
  $out4 = $html->find('td',7);
  $out5 = $html->find('td',8);
  // $out6 = $html->find('td',9);
  // $out7 = $html->find('td',10);
  // $out8 = $html->find('td',11);
  // $out9 = $html->find('td',12);
  // $out10 = $html->find('td',13);
  //////////////////////////////
  //////////////////////////////
  
  $stringout = [
    $out0->plaintext,
    $out1->plaintext,
    $out2->plaintext,
    $out3->plaintext,
    $out4->plaintext,
    $out5->plaintext,
    // $out6->plaintext,
    // $out7->plaintext,
    // $out8->plaintext,
    // $out9->plaintext,
    // $out10->plaintext
  ];
  
  // $stringout0 = $out0->plaintext;
  // $stringout1 = $out1->plaintext;
  // $stringout2 = $out2->plaintext;
  // $stringout3 = $out3->plaintext;
  // $stringout4 = $out4->plaintext;
  // $stringout5 = $out5->plaintext;
  // $stringout6 = $out6->plaintext;
  // $stringout7 = $out7->plaintext;
  // $stringout8 = $out8->plaintext;
  // $stringout9 = $out9->plaintext;
  // $stringout10 = $out10->plaintext;

  // echo $sabmitsiteall[$rownumber];
  // echo $out0;
  for ($i = 0; $i <= 5; $i++) {
    $companyinfomation = $stringout[$i]; //${$stringout.$i}; 
    $sheet->setCellValueByColumnAndRow($i, $rownumber+2, $companyinfomation);
    // echo $i;
  }
  $writer = PHPExcel_IOFactory::createWriter($excel, "Excel2007");
$html-> clear();
}
// Excel2007形式で出力する

// $sheet->setCellValueByColumnAndRow(0, 2, "$stringout0");

// $writer = PHPExcel_IOFactory::createWriter($excel, "Excel2007");
$writer->save("PHPExcel.xlsx");
exit;
?>
