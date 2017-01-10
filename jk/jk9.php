<DOCTYPE>
<html>
<head>
<meta charset="utf-8">
<title>테스트 화면</title>

<style>
/* Only resize the element if PDF is embedded */
.pdfobject-container {
   width: 200px;
   height: 500px;
}
</style>
<script src="./PDFObject-master/pdfobject.js"></script>


</head>
<body>
<?

function getFileNames($directory) 
{
    $results = array(); 

    $handler = opendir($directory); 

    while ($file = readdir($handler)) { 

        if ($file != '.' && $file != '..' && is_dir($file) != '1') {

            $results[] = $file; 
        }
    } 

    closedir($handler); 
    return $results;
}

$file1 = "./";
$aa = getFileNames($file1); 

for($i=0;$i<sizeof($aa);$i++){
	echo $aa[$i].'<br>';
}
?>
<object width="100%" height="100%" data="./sk.pdf" type="application/pdf">
   <p><b>Example fallback content</b>: This browser does not support PDFs. Please download the PDF to view it: <a href="/sk.pdf">Download PDF</a>.</p>
</object>


<div id="my-container"></div>
</body>
</html>


