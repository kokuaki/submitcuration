
<?php
include "simple_html_dom.php";

// $setwebnumber = range(30000,30050);

set_time_limit(7200);

$controlpage = array();


// $rownumber = 2;
// $rownumber = 1142;
// $rownumber = 3011;
// $rownumber = 3251;
$rownumber = 4001;

// $homepage = range(2,116);
// $homepage = range(117,200);
// $homepage = range(201,261);
// $homepage = range(261,300);
// $homepage = range(301,350);
// $homepage = range(326,400);
$homepage = range(401,550);

$datainhomepage = range(1,1);

// for ($i = 0; $i <= 1000; $i++) {
// echo $a[$i];
// }

// $html = file_get_html( "$sabmitsiteall[0]" );

// echo $html;
// header('Content-Type: text/html; charset=utf-8');

date_default_timezone_set('Asia/Tokyo');
mb_language("Japanese");

// echo '$out = $html->find(\'tr\',0);でH1タグの情報を取り出す<br>';





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
// $excel = new PHPExcel();
$obj = PHPExcel_IOFactory::createReader('Excel2007');

// 0番目のシートをアクティブにします(シートは0から数えます)
// (エクセルを新規作成した時点で0番目の空のシートが作成されています)

$excel = $obj->load("PHPExcel.xlsx");

$excel->setActiveSheetIndex(0);

// シートに対して何かを行うためにアクティブになっているシートを変数に入れます
$sheet = $excel->getActiveSheet();

// シートに名前を付けます
// $sheet->setTitle("キュレーション");


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


$headerpage = ("http://hp.submit.ne.jp/producer/search/homepage");

// for ($i = 0; $i <= 5; $i++) {
//   $companyinfomation = $stringout[$i]; //${$stringout.$i}; 
//   $sheet->setCellValueByColumnAndRow($i, 2, $companyinfomation);
//   // echo $i;
// 
//   $wordget0 = file_get_contents("http://hp.submit.ne.jp/producer/show/" . "$setwebnumber[$rownumber]");
//   //文字列の指定の形式に変える
//   $wordget = mb_convert_encoding($wordget, 'utf-8', 'auto');
//   //文字列をsimple_html_domのメソッドstr_get_htmlで解析して電子辞書化して取り出せるようにする
//   $html = str_get_html($wordget);
// 
// 
//   //H1タグの情報を取り出す
//   $out0 = $html->find('td',0);
//   $out1 = $html->find('td',4);
//   $out2 = $html->find('td',5);
//   $out3 = $html->find('td',6);
//   $out4 = $html->find('td',7);
//   $out5 = $html->find('td',8);
//   // $out6 = $html->find('td',9);
//   // $out7 = $html->find('td',10);
//   // $out8 = $html->find('td',11);
//   // $out9 = $html->find('td',12);
//   // $out10 = $html->find('td',13);
//   //////////////////////////////
//   //////////////////////////////
// 
//   $stringout = [
//     $out0->plaintext,
//     $out1->plaintext,
//     $out2->plaintext,
//     $out3->plaintext,
//     $out4->plaintext,
//     $out5->plaintext,
//     // $out6->plaintext,
//     // $out7->plaintext,
//     // $out8->plaintext,
//     // $out9->plaintext,
//     // $out10->plaintext
//   ];
// 
//   // $stringout0 = $out0->plaintext;
//   // $stringout1 = $out1->plaintext;
//   // $stringout2 = $out2->plaintext;
//   // $stringout3 = $out3->plaintext;
//   // $stringout4 = $out4->plaintext;
//   // $stringout5 = $out5->plaintext;
//   // $stringout6 = $out6->plaintext;
//   // $stringout7 = $out7->plaintext;
//   // $stringout8 = $out8->plaintext;
//   // $stringout9 = $out9->plaintext;
//   // $stringout10 = $out10->plaintext;
// 
//   // echo $sabmitsiteall[$rownumber];
//   // echo $out0;
//   
// 
//   for ($i = 0; $i <= 5; $i++) {
//     $companyinfomation = $stringout[$i]; //${$stringout.$i}; 
//     $sheet->setCellValueByColumnAndRow($i, 2, $companyinfomation);
//     // echo $i;
//   }
// }
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
// $rownumber = 2;
// $rownumber = 1592;

foreach($homepage as $homepageset){
  ////////////////////////////////////
  ////////////////////////////////////
  ////////////////////////////////////
  //    homepage front data get
  ////////////////////////////////////
  ////////////////////////////////////
  ////////////////////////////////////
  // $originalcontrolpage = ("http://hp.submit.ne.jp/producer/search/homepage?page=" . $homepageset);
  $originalcontrolpage = ("http://hp.submit.ne.jp/producer/search/homepage?page=" . $homepageset);

  echo $homepageset;
  $htmlcontrol = file_get_html( "$originalcontrolpage" );
  // $out0select = $htmlcontrol->find('.mgBtm30 li', 0);
  // echo $out0select;
  // foreach($datainhomepage as $datainhomepagenumbar){
    
      
      
      
      // $stringout = [
      //   $out0urlWithdrawn->plaintext,
        // $out6->plaintext,
        // $out7->plaintext,
        // $out8->plaintext,
        // $out9->plaintext,
        // $out10->plaintext
      // ];
      
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
      
        // $companyinfomation = $stringout0; 
        //${$stringout.$i}; 
        // echo $i;
      

      // $writer = PHPExcel_IOFactory::createWriter($excel, "Excel2007");
      ////////////////////////////////////
      ////////////////////////////////////
      ////////////////////////////////////
      ////////////////////////////////////
      ////////////////////////////////////
      ////////////////////////////////////

      
      // foreach($number as $rownumber){
      // for ($hometag = 0; $hometag <= 9; $hometag++) {
      $urlpartstringout = [

        $out0chileselect = $htmlcontrol->find('.name a', 0),
        $out1chileselect = $htmlcontrol->find('.name a', 1),
        $out2chileselect = $htmlcontrol->find('.name a', 2),
        $out3chileselect = $htmlcontrol->find('.name a', 3),
        $out4chileselect = $htmlcontrol->find('.name a', 4),
        $out5chileselect = $htmlcontrol->find('.name a', 5),
        $out6chileselect = $htmlcontrol->find('.name a', 6),
        $out7chileselect = $htmlcontrol->find('.name a', 7),
        $out8chileselect = $htmlcontrol->find('.name a', 8),
        $out9chileselect = $htmlcontrol->find('.name a', 9),
      ];



      
        // $out0chileselect = $htmlcontrol->find('.name a', 0);
        // echo $out0chileselect;
      $urlpartout = [
        $out0urlWithdrawn = $out0chileselect->href,
        $out1urlWithdrawn = $out1chileselect->href,
        $out2urlWithdrawn = $out2chileselect->href,
        $out3urlWithdrawn = $out3chileselect->href,
        $out4urlWithdrawn = $out4chileselect->href,
        $out5urlWithdrawn = $out5chileselect->href,
        $out6urlWithdrawn = $out6chileselect->href,
        $out7urlWithdrawn = $out7chileselect->href,
        $out8urlWithdrawn = $out8chileselect->href,
        $out9urlWithdrawn = $out9chileselect->href,
      ];
        // echo "$urlpartout[0]";
        // echo "$urlpartout[1]";
        // echo "$urlpartout[2]";
        // echo "$urlpartout[3]";
        // echo "$urlpartout[4]";
        // echo "$urlpartout[5]";
        // echo "$urlpartout[6]";
        // echo "$urlpartout[7]";
        // echo "$urlpartout[8]";
        // echo "$urlpartout[9]";

        // $originalcontrolpage = "http://hp.submit.ne.jp/producer/search/homepage?page=" . "$rownumber + 1";

        //url先のコードを文字列としてget
        // $wordget = file_get_contents("http://hp.submit.ne.jp/producer/search/homepage" . ($rownumber ? ("?page=". ($rownumber+1)) : ""));
        //url先のコードを文字列としてget
        for ($urlsetcicle = 0; $urlsetcicle <= 9; $urlsetcicle++) {

          $wordget = file_get_contents("http://hp.submit.ne.jp" . "$urlpartout[$urlsetcicle]");
          //文字列の指定の形式に変える
          $wordget = mb_convert_encoding($wordget, 'utf-8', 'auto');
          //文字列をsimple_html_domのメソッドstr_get_htmlで解析して電子辞書化して取り出せるようにする
          $html = str_get_html($wordget);
          
          
          //H1タグの情報を取り出す
          $out0 = $html->find('td',0);
          // echo "out0は通った";
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
            $sheet->setCellValueByColumnAndRow($i, $rownumber, $companyinfomation);
            // echo $i;
          }
          $rownumber++;

          $html->clear(); 
          unset($html);

      }
      // }
      $writer = PHPExcel_IOFactory::createWriter($excel, "Excel2007");
      $writer->save("PHPExcel.xlsx");
      $htmlcontrol->clear(); 
      unset($htmlcontrol);

    // }
  // }
  
  // $html-> clear();
}
// Excel2007形式で出力する

// $sheet->setCellValueByColumnAndRow(0, 2, "$stringout0");

// $writer = PHPExcel_IOFactory::createWriter($excel, "Excel2007");
exit;
?>
