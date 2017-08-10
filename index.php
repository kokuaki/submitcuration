
<?php
include "simple_html_dom.php";

// $setwebnumber = range(30000,30050);

set_time_limit(7200);

$controlpage = array();

////////////////////////////////
////////////////////////////////
      //  header
$tosel11 = 2;
////////////////////////////////
////////////////////////////////


// $rownumber = 2;
// $rownumber = 1142;
// $rownumber = 3011;
// $rownumber = 3251;
$rownumber = 12;

// $homepage = range(2,116);
// $homepage = range(117,200);
// $homepage = range(201,261);
// $homepage = range(261,300);
// $homepage = range(301,350);
// $homepage = range(326,400);
$homepage = range(2,550);

// $datainhomepage = range(1,1);

// for ($i = 0; $i <= 1000; $i++) {
// echo $a[$i];
// }

// $html = file_get_html( "$sabmitsiteall[0]" );

// echo $html;
// header('Content-Type: text/html; charset=utf-8');

date_default_timezone_set('Asia/Tokyo');
mb_language("Japanese");


////////////////////////////////////////////
////////////////////////////////////////////
////////////////////////////////////////////

///////////////////設定/////////////////////////

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
//            header12まで
////////////////////////////////////
///////////////////////////////////
// セル(A1)に値を入力します。

$sheet->setCellValue('A1', '企業名');
$sheet->setCellValue('B1', '代表者名');
$sheet->setCellValue('C1', '資本金');
$sheet->setCellValue('D1', '従業員数');
$sheet->setCellValue('E1', '担当者');
$sheet->setCellValue('F1', '提供可能サービス');

  $headerpage12 = ("http://hp.submit.ne.jp/producer/search/homepage");

  $headerpagefile12 = file_get_html( "$headerpage12" );
  
  
      $urlpartstringout = [

        $out00chileselect = $headerpagefile12->find('.name a', 0),
        $out01chileselect = $headerpagefile12->find('.name a', 1),
        $out02chileselect = $headerpagefile12->find('.name a', 2),
        $out03chileselect = $headerpagefile12->find('.name a', 3),
        $out04chileselect = $headerpagefile12->find('.name a', 4),
        $out05chileselect = $headerpagefile12->find('.name a', 5),
        $out06chileselect = $headerpagefile12->find('.name a', 6),
        $out07chileselect = $headerpagefile12->find('.name a', 7),
        $out08chileselect = $headerpagefile12->find('.name a', 8),
        $out09chileselect = $headerpagefile12->find('.name a', 9),
      ];



      
        // $out0chileselect = $htmlcontrol->find('.name a', 0);
        // echo $out0chileselect;
      $urlpartouthead = [
        $out00urlWithdrawn = $out00chileselect->href,
        $out01urlWithdrawn = $out01chileselect->href,
        $out02urlWithdrawn = $out02chileselect->href,
        $out03urlWithdrawn = $out03chileselect->href,
        $out04urlWithdrawn = $out04chileselect->href,
        $out05urlWithdrawn = $out05chileselect->href,
        $out06urlWithdrawn = $out06chileselect->href,
        $out07urlWithdrawn = $out07chileselect->href,
        $out08urlWithdrawn = $out08chileselect->href,
        $out09urlWithdrawn = $out09chileselect->href,
      ];
  

      for ($urlsetciclehead = 0; $urlsetciclehead <= 9; $urlsetciclehead++) {

        $wordgethead = file_get_contents("http://hp.submit.ne.jp" . "$urlpartouthead[$urlsetciclehead]");
        //文字列の指定の形式に変える
        $wordgethead = mb_convert_encoding($wordgethead, 'utf-8', 'auto');
        //文字列をsimple_html_domのメソッドstr_get_htmlで解析して電子辞書化して取り出せるようにする
        $htmlhead = str_get_html($wordgethead);
        
        
        //H1タグの情報を取り出す
        $out00 = $htmlhead->find('td',0);
        // echo "out0は通った";
        $out01 = $htmlhead->find('td',4);
        $out02 = $htmlhead->find('td',5);
        $out03 = $htmlhead->find('td',6);
        $out04 = $htmlhead->find('td',7);
        $out05 = $htmlhead->find('td',8);

        
        $stringouthead = [
          $out00->plaintext,
          $out01->plaintext,
          $out02->plaintext,
          $out03->plaintext,
          $out04->plaintext,
          $out05->plaintext,
        
        ];
        
        

            for ($headi = 0; $headi <= 5; $headi++) {
              $companyinfomation = $stringouthead[$headi]; //${$stringout.$i}; 
              $sheet->setCellValueByColumnAndRow($headi, $tosel11, $companyinfomation);
              // echo $i;
            }
            $tosel11++;
            $htmlhead->clear(); 
            unset($htmlhead);
      

  

      }
      $writer = PHPExcel_IOFactory::createWriter($excel, "Excel2007");
      $writer->save("PHPExcel.xlsx");
      $headerpagefile12->clear(); 
      unset($headerpagefile12);



////////////////////////////////////
///////////////////////////////////
//            header
////////////////////////////////////
///////////////////////////////////






































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
    
          
          $stringout = [
            $out0->plaintext,
            $out1->plaintext,
            $out2->plaintext,
            $out3->plaintext,
            $out4->plaintext,
            $out5->plaintext,
          
          ];
          
          
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
