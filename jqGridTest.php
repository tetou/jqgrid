<html lang="ja">
	<head>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<meta http-equiv="content-style-type" content="text/css" />
		<meta http-equiv="content-script-type" content="text/javascript" />
		<link rel="stylesheet" href="./css/jquery-ui-1.8.19.custom.css" type="text/css" />
		<link rel="stylesheet" href="./css/ui.jqgrid.css" type="text/css" />
		<script type="text/javascript" src="./js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="./js/jquery-ui-1.8.19.custom.min.js"></script>
		<script type="text/javascript" src="./js/i18n/grid.locale-ja.js"></script>
		<script type="text/javascript" src="./js/jquery.jqGrid.min.js"></script>
		<script type="text/javascript">
			window.onload=function(){
				jQuery("#bodyoftable").jqGrid({
					url:'dataload.php',
					datatype:'xml',
					mtype:'GET',
					colNames:['ID','USER'],
					colModel:[
						{name:'id',index:'id',width:50},
						{name:'name',index:'name',width:300}
					],
					pager:jQuery('#pager'),
					rowNum:10,
					//rowList:[10,20,30],
					sortname:'id',
					sortorder:"asc",
					viewrecords:true,
					//imgpath:'themes/base/images',
					height:'auto',
					width:'1000',
					caption:'This is just a test!!'
				});
				jQuery("#bodyoftable").jqGrid('navGrid',"#pager",{edit:true,add:true,del:true});
				jQuery("#bodyoftable").jqGrid('inlineNav',"#pager");
			}
		</script>
	</head>
	<body>
		<table id="bodyoftable" class="scroll" style="text-align:center;width:800px;"></table>
		<div id="pager" class="scroll" style="text-align:center;padding:10px;"></div>
	</body>
</html>