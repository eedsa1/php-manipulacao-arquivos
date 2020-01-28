<?php 

$images = scandir("images");

var_dump($images);

echo "<br/>";

$data = array();

foreach ($images as $img) {
	if(!in_array($img, array(".", ".."))){
		$filename = "images".DIRECTORY_SEPARATOR.$img;
		$info = pathinfo($filename);
		$info["size"] = filesize($filename);
		$info["modified"] = date("d/m/Y H:i:s", filemtime($filename));
		$info["url"] = "/http://localhost/php-manipulacao-arquivos/".str_replace("\\", "/", $filename);
		array_push($data, $info);
	}
}

echo json_encode($data);

?>