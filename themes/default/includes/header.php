<?php
/**
 * File: header.php
 * Created: 16:58 19th April 2011
 * Project: blend_v2
 *
 * Author: Harry Northover
 *         harrynorthover.com
 *
 * Description:
 * The header that includes all the resources (.css, .js, etc files) for the default template.
 */
?>
<base href="<?php if($_SERVER["HTTP_HOST"] == "localhost") echo 'http://localhost/blend_v2/'; else echo 'http://projects.harrynorthover.com/blend/'?>"/>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="shortcut icon" href="assets/imgs/favicon.ico" />

<link href="themes/default/css/front/header.css" rel="stylesheet" type="text/css" />
<link href="themes/default/css/front/general.css" rel="stylesheet" type="text/css" />
<link href="themes/default/css/front/codeDisplay.css" rel="stylesheet" type="text/css" />
<link href="themes/default/css/front/footer.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="themes/default/js/swfobject.js"></script>
<script type="text/javascript" src="themes/default/js/utils.js"></script>