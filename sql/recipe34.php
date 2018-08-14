<?php
require 'vendor/autoload.php';

use QL\QueryList;

$total = 4272;

$url = 'http://home.meishichina.com/recipe/recai/page/';

/*能找到采集不了图的真实地址
$url = 'http://home.meishichina.com/recipe/recai/page/2/'; 
$url = file_get_contents ($url);

$find = '/<img.*src\s*=\s*[\"|\']?\s*([^>\"\'\s]*)/i';
$find = '/<img.*src\s*=\s*[\"|\']?\s*([^>\"\'\s]*)/i';
preg_match_all($find, $url, $match);
var_dump($match);exit;

*/


$con = mysql_connect("localhost","root","");
mysql_select_db("meishi", $con);
mysql_query("set names 'utf8'");




//采集所有分类
//div.category_sub:nth-child(1) > ul:nth-child(3) > li:nth-child(1) > a:nth-child(1)
//$shicaicategory = 'http://www.meishichina.com/YuanLiao/category/rql/';
//$shicaicategory = 'http://www.meishichina.com/YuanLiao/category/scl/';
$shicaicategory = 'http://www.meishichina.com/YuanLiao/category/shucailei/';
//$shicaicategory = 'http://www.meishichina.com/YuanLiao/category/guopinlei/';
//$shicaicategory = 'http://www.meishichina.com/YuanLiao/category/mmdr/';
//$shicaicategory = 'http://www.meishichina.com/YuanLiao/category/tiaoweipinl/';
//$shicaicategory = 'http://www.meishichina.com/YuanLiao/category/yaoshiqita/';





//$category = QueryList::Query($shicaicategory,array(
//    'category' => array('div.category_sub:nth-child(1) > ul:nth-child(3) > li > a','text'),
//    ))->data;
//
//var_dump($category);exit;
//
//    foreach($category as $key => $value){
//    	$sql = "INSERT INTO ms_category (module,modelid,parentid,arrparentid,child,catname) VALUES ('content',1,269,'0,8,3,269',0,'".$value['category']."')";
//    	mysql_query($sql,$con);
//		$catid  = mysql_insert_id();
//		$sql = "UPDATE ms_category set arrchildid = $catid where catid = $catid";
//		mysql_query($sql,$con);
//    }
//    echo '<pre>';
//    print_r($category);
//    exit;

//食谱热菜
//$("a[title='鸡腿的做法']").parent().next().text();

$list = array();
for( $i = 1; $i <= 216; $i++){
//	$url = "http://home.meishichina.com/recipe/recai/list-$i.html";
//	$url = "http://home.meishichina.com/html/recipe/recai/";
//	$url = "http://home.meishichina.com/recipe/liangcai/list-$i.html";
//	$url = "http://home.meishichina.com/recipe/liangcai/";
//	$url = "http://home.meishichina.com/recipe/tanggeng/list-$i.html";
//	$url = "http://home.meishichina.com/html/recipe/zhushi/list-$i.html";
//	$url = "http://home.meishichina.com/recipe/xiaochi/list-$i.html";
//	$url = "http://home.meishichina.com/recipe/xican/list-$i.html";
//	$url = "http://home.meishichina.com/recipe/hongbei/list-$i.html";
//	$url = "http://home.meishichina.com/recipe/yinpin/list-$i.html";
//	$url = "http://home.meishichina.com/recipe/lingshi/list-$i.html";
//	$url = "http://home.meishichina.com/recipe/jiangpaoyancai/list-$i.html";
	$url = "http://home.meishichina.com/recipe/zizhishicai/list-$i.html";

	$data = QueryList::Query($url,array(
	    'title' => array('#J_list >ul > li >.detail > h2>a','text'),
		'refferurl' => array('#J_list >ul > li >.detail > h2>a','href'),
	    'tags' => array('#J_list >ul > li >.detail > p.subcontent','text'),
		'thumb' => array('#J_list >ul > li >.pic> a > img ','data-src'),
		'page' => array('.ui-page-inner .now_page','text'),
	    ))->data;
    $list[] = $data;
}

$listconent = array();    
foreach ($list as $key => $value){
	foreach ($value as $k => &$v){
		$v['tags'] = str_replace('原料：','',$v['tags']);
		$v['tags'] = str_replace('。','',$v['tags']);
		$v['catname'] = explode('、', $v['tags']);
		$v['oldid'] = explode(',', (explode('-', $v['refferurl'])[1]))[0];
		$v['oldid'] = explode('.',$v['oldid'])[0];
//		echo '|';
//		echo $v['oldid'];exit;
		unset($article_id);
		mysql_query("BEGIN");
		$sql = "INSERT INTO ms_article (title,oldid,refferurl,tags,thumb,catid) VALUES ('".$v['title']."','".$v['oldid']."','".$v['refferurl']."','".$v['tags']."','".$v['thumb']."',34)";
		$res1 = mysql_query($sql,$con);
		$article_id = mysql_insert_id();

		if ($article_id > 0){
//			$url = '/index.php?a=shows&catid=1&id='.$article_id;
			$url = 'show-34-'.$article_id.'.html';
			echo $sql = "UPDATE `ms_article` SET url = '{$url}'".' WHERE id = '.$article_id;
			echo '<br>';
			$res2 = mysql_query($sql,$con);
		}else{
			continue;
		}
		$urlcontent = $v['refferurl'];
		$datacontent[$k] = QueryList::Query($urlcontent,array(
		    'title' => array('.recipe_De_title > a:nth-child(1)','text'),
			'topimage' => array('a.J_photo > img:nth-child(2)','src'),
			'tag1' => array('div.recipeCategory_sub_R.clear','html'),
			'tag2' => array('div.recipeCategory_sub_R.mt30.clear','html'),
			'images' => array('.recipeStep_img > img','src'),
			'desc' => array('.recipeStep_word','text'),
			'qiaomen1' => array('.recipeTip','text'),
			'qiaomen2' => array('.recipeTip.mt16','text'),
			'descrption' => array('#block_txt1','text'),
	    ))->data;

		$datacontent[$k][0]['descrption'] = htmlspecialchars($datacontent[$k][0]['descrption']);
		$datacontent[$k][0]['descrption'] = str_replace('“','',$datacontent[$k][0]['descrption']);
		$datacontent[$k][0]['descrption'] = str_replace('”','',$datacontent[$k][0]['descrption']);
		
		$datacontent[$k][0]['qiaomen1'] = str_replace('1.','',$datacontent[$k][0]['qiaomen1']);
		$datacontent[$k][0]['qiaomen2'] = str_replace('2.','',$datacontent[$k][0]['qiaomen2']);
		if ($datacontent[$k][0]['qiaomen1'] == $datacontent[$k][0]['qiaomen2']){
			unset($datacontent[$k][0]['qiaomen2']);
		}
		
	    preg_match_all('/<b>(.+?)<\/b>/', $datacontent[$k][0]['tag1'], $tag1);
	    preg_match_all('/<span class="category_s2">(.+?)<\/span>/', $datacontent[$k][0]['tag1'], $tag2);
	    
	    str_replace('<b>','',$tag1[1]);
	    str_replace('</b>','',$tag1[1]);

	    $table1 = array_combine($tag1[1],$tag2[1]);
    
	    preg_match_all('/target="_blank">(.+?)<\/a>/', $datacontent[$k][0]['tag2'], $tag3);
	    preg_match_all('/<span class="category_s2">(.+?)<\/span>/', $datacontent[$k][0]['tag2'], $tag4);
	    
	    str_replace('<b>','',$tag3[1]);
	    str_replace('</b>','',$tag3[1]);

	    $table2 = array_combine($tag3[1],$tag4[1]);

	    $datacontent[$k][0]['tag1'] = $table1;
	    unset($datacontent[$k][1]['tag1']);
	    $datacontent[$k][0]['tag2'] = $table2;
	    unset($datacontent[$k][1]['tag2']);

	    $content = json_encode($datacontent[$k],JSON_UNESCAPED_UNICODE);
	    echo $sql = "INSERT INTO ms_article_data (id,content,paginationtype) VALUES ('".$article_id."','".$content."',2)";
		echo '<br>';
	    $res3 = mysql_query($sql,$con);

		$sql = "select id from ms_article order by id desc limit 1";
		$result = mysql_query($sql,$con);

		foreach ($v['catname'] as $catname){
			$sql = "select catid from ms_category where catname = '$catname'";
			$result = mysql_query($sql,$con);
			if ($cate = mysql_fetch_assoc($result)){
				$sql = "select id from ms_article_category where catid = {$cate['catid']} and aid = $article_id";
				$res = mysql_query($sql,$con);
				if (!mysql_fetch_assoc($res)){
					$sql = "INSERT INTO ms_article_category (catid,aid) VALUES ('".$cate['catid']."','".$article_id."')";
					$res4 = mysql_query($sql,$con);
//					$sql = "INSERT INTO ms_article_data (id,content,paginationtype) VALUES ('".$article_id."','".$content."',2)";
//		    		mysql_query($sql,$con);
				}else{
					echo '菜品与分类已经存在关系';
				}
			}
			if($res1 && $res2 && $res3 && $res4){
				mysql_query("COMMIT");
				echo '提交成功。';
			}else{
				mysql_query("ROLLBACK");
				echo '数据回滚。';
			}
		}	

		$contentHtml = file_get_contents($v['refferurl']);
		$content = QueryList::Query($contentHtml,array(
	//		'description' => array('.txt_tart'.'text'),
			'bigimage' => array('.J_photo img','src'),
			'smallimage' => array('.recipeStep_img img','src'),
			'setup' => array('.recipeStep_num','text'),
			'setupdescription' => array('.recipeStep_word','text'),
			'tag1' => array('.category_s1','text'),
			'tag2' => array('.category_s2','text'),
	    ))->data;
//		var_dump($content);exit;
	    $listconent[] = $content; 
	}
}
