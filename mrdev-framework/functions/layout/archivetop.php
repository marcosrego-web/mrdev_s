<?php
	if(function_exists('mrdev_archivetop')) {
		mrdev_archivetop();
	} else {
        echo '<div class="mr-archive mrdev_s-archive mrdev-archive mr-'.get_post_type().' mr-theme mr-nonetheme mr-boxsize">
        <div class="mr-layout mr-nonelayout mr-flex mr-wrap mr-relative mr-noscroll mr-donotinactive">
		<div class="mr-pages mr-1perline mr-nobullets active">
		';
    }
?>