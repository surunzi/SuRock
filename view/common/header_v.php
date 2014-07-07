<!doctype html>
<html>
<head>

    <meta charset="utf-8">

	<title>
    <?php
    if (isset($this->title)) {
    	echo $this->title;
    }else{
    	echo TITLE;
    }
	?>
    </title>

    <?php
	foreach ($this->css as $key => $value) {
    ?>
	   <link rel="stylesheet" href="<?php e(URL.CSS.$value.'.css');?>">
    <?php
    }
    ?>

</head>
<body>