<?php
	/**
		このコードはそのまま実行することはできません。
		あくまでサンプルコードです。叩くAPIやDOM成形方法などは
		あなたの環境に合わせて書き直して下さい。
		
		This program would not work on your platform right now.
		This is just a sample code. You have to rewrite the URL of API which will be implemented
		and the method of remodeling the DOM so that it can be run.
	*/
	//APIを実行
	//Implement the API
	include("../conf/Tools.php");
	$url="http://chocola.moe.hm/Java/WebAPIBeta/Twitter/unCheckedFriends?num=100";
	$httpGet=new HTTPGet($url,"","");
	$httpObj=$httpGet->fetchString();
	//echo $httpGet->result['derived'];
	$responseObj=$httpGet->getAsXML()->RESPONSE[0];
	
	//DOM生成(APIの結果だとjqGridが読めないので別のXMLとして成形し直す)
	//Generate a new DOM
	$dom=new DomDocument('1.0');
	$dom->encoding="UTF-8";
	$dom->formatOutput=true;
	$invoices=$dom->appendChild($dom->createElement("invoices"));
	$rows=$invoices->appendChild($dom->createElement("rows"));
	for ($i=0;isset($responseObj->ITEM[$i]);$i++){
		$row=$rows->appendChild($dom->createElement("row"));
		$cell1=$row->appendChild($dom->createElement("cell"));
		$cell1->appendChild($dom->createTextNode((int)$responseObj->ITEM[$i]->ID));
		$cell2=$row->appendChild($dom->createElement("cell"));
		$cell2->appendChild($dom->createTextNode((String)$responseObj->ITEM[$i]->USER));
	}
	echo $dom->saveXML();
/*
$str=<<<EOF
<?xml version='1.0' encoding='utf-8'?>
<invoices>
    <rows>
        <row>
            <cell>data1</cell>
            <cell>data2</cell>
            <cell>data3</cell>
            <cell>data4</cell>
            <cell>data5</cell>
            <cell>data6</cell>
        </row>
    </rows>
</invoices>
EOF;
echo $str;
*/
?>