# PHP Spreadsheet 테스트

엑셀 데이터 저장 및 처리

## 요구사항
* extension 활성화
    * _gd
    * _fileinfo
    * 그 외 기타등등 - 매뉴얼 참고

## 설치
* 실행할 php파일이 있는 곳에서 아래 명령으로 설치
```sh
$ php composer.phar require phpoffice/phpspreadsheet
# 또는
$ php composer.phar install 
```

## 주의
* 엑셀에서 전화번호 입력시 `010xxxx`처럼 모두 숫자인 경우, 처음 0을 씹어먹으므로 `-`기호 붙여서 글자로 인식하게 해야할 듯

## 참고
* PhpSpreadsheet 문서: https://phpspreadsheet.readthedocs.io/en/latest/#installation
* `read.php`, `save.php` 코드

# SheetJS

## 데모 사이트
* https://sheetjs.com/demos

## 예시
```html
<!DOCTYPE html>
<!-- (C) 2013-present  SheetJS http://sheetjs.com -->
<html>
<head>
<title>SheetJS JS-XLSX In-Browser HTML Table Export Demo</title>
<meta charset="utf-8" />
<style>
.xport, .btn {
	display: inline;
	text-align:center;
}
a { text-decoration: none }
#data-table, #data-table th, #data-table td { border: 1px solid black }
</style>
</head>
<body>
<script type="text/javascript" src="//unpkg.com/xlsx/dist/shim.min.js"></script>
<script type="text/javascript" src="//unpkg.com/xlsx/dist/xlsx.full.min.js"></script>

<script type="text/javascript" src="//unpkg.com/blob.js@1.0.1/Blob.js"></script>
<script type="text/javascript" src="//unpkg.com/file-saver@1.3.3/FileSaver.js"></script>

<script>
function doit(type, fn, dl) {
	var elt = document.getElementById('data-table');
	var wb = XLSX.utils.table_to_book(elt, {sheet:"Sheet JS"});
	return dl ?
		XLSX.write(wb, {bookType:type, bookSST:true, type: 'base64'}) :
		XLSX.writeFile(wb, fn || ('test.' + (type || 'xlsx')));
}
</script>
<pre><h3><a href="//sheetjs.com/">SheetJS</a> JS-XLSX In-Browser HTML Table Export Demo</h3>

<b>Editable Data Table:</b> (click a cell to edit it)
</pre>
<div id="container"></div>
<script type="text/javascript">
/* initial table */
var aoa = [
	["This",   "is",     "a",    "Test"],
	["வணக்கம்", "สวัสดี", "你好", "가지마"],
	[1,        2,        3,      4],
	["Click",  "to",     "edit", "cells"]
];
var ws = XLSX.utils.aoa_to_sheet(aoa);
var html_string = XLSX.utils.sheet_to_html(ws, { id: "data-table", editable: true });
document.getElementById("container").innerHTML = html_string;
</script>
<br />
<pre><b>Export it!</b></pre>
<table id="xport">
<tr><td><pre>XLSX Excel 2007+ XML</pre></td><td>
	<p id="xportxlsx" class="xport"><input type="submit" value="Export to XLSX!" onclick="doit('xlsx');"></p>
	<p id="xlsxbtn" class="btn">Flash required for actually downloading the generated file.</p>
</td></tr>
<tr><td><pre>XLSB Excel 2007+ Binary</pre></td><td>
	<p id="xportxlsb" class="xport"><input type="submit" value="Export to XLSB!" onclick="doit('xlsb');"></p>
	<p id="xlsbbtn" class="btn">Flash required for actually downloading the generated file.</p>
</td></tr>
<tr><td><pre>XLS Excel 97-2004 Binary</pre></td><td>
	<p id="xportbiff8" class="xport"><input type="submit" value="Export to XLS!"  onclick="doit('biff8', 'test.xls');"></p>
	<p id="biff8btn" class="btn">Flash required for actually downloading the generated file.</p>
</td></tr>
<tr><td><pre>ODS</pre></td><td>
	<p id="xportods" class="xport"><input type="submit" value="Export to ODS!"  onclick="doit('ods');"></p>
	<p id="odsbtn" class="btn">Flash required for actually downloading the generated file.</p>
</td></tr>
<tr><td><pre>Flat ODS</pre></td><td>
	<p id="xportfods" class="xport"><input type="submit" value="Export to FODS!"  onclick="doit('fods', 'test.fods');"></p>
	<p id="fodsbtn" class="btn">Flash required for actually downloading the generated file.</p>
</td></tr>
</table>
<pre><b>Powered by the <a href="//sheetjs.com/opensource">community version of js-xlsx</a></b></pre>
<script type="text/javascript">
function tableau(pid, iid, fmt, ofile) {
	if(typeof Downloadify !== 'undefined') Downloadify.create(pid,{
			swf: 'downloadify.swf',
			downloadImage: 'download.png',
			width: 100,
			height: 30,
			filename: ofile, data: function() { return doit(fmt, ofile, true); },
			transparent: false,
			append: false,
			dataType: 'base64',
			onComplete: function(){ alert('Your File Has Been Saved!'); },
			onCancel: function(){ alert('You have cancelled the saving of this file.'); },
			onError: function(){ alert('You must put something in the File Contents or there will be nothing to save!'); }
	}); else document.getElementById(pid).innerHTML = "";
}
tableau('biff8btn', 'xportbiff8', 'biff8', 'test.xls');
tableau('odsbtn',   'xportods',   'ods',   'test.ods');
tableau('fodsbtn',  'xportfods',  'fods',  'test.fods');
tableau('xlsbbtn',  'xportxlsb',  'xlsb',  'test.xlsb');
tableau('xlsxbtn',  'xportxlsx',  'xlsx',  'test.xlsx');

</script>
</body>
</html>

```

끝.
