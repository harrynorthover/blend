<?php
/**
 * File: header.php
 * Created: 6:43:08 PM - Aug 14, 2010
 * Project: blend_v2
 *
 * Author: Harry Northover
 *         harrynorthover.com
 *
 * Description:
 * The header that includes all the resources (.css, .js, etc files) for the default template.
 */
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<base href="<?php if($_SERVER["HTTP_HOST"] == "localhost") echo 'http://localhost/blend_v2/'; else echo 'http://projects.harrynorthover.com/blend/'?>"/>

<link rel="shortcut icon" href="images/favicon.ico" />
<link href="system/themes/default/css/base.css" rel="stylesheet" type="text/css" />

<!-- Include js -->
<script src="system/themes/default/js/external/jquery-1.4.2.js"></script>
<script src='system/themes/default/js/external/jquery.qtip-1.0.0-rc3.js'></script>
<script src="system/themes/default/js/head.load.min.js"></script>
<script src="system/themes/default/js/blend.js"></script>
<script src="system/themes/default/js/fileManager.js"></script>
<script src="system/themes/default/js/formValidate.js"></script>
<script src="system/themes/default/js/external/jquery-ui.min.js"></script>
<script src="system/themes/default/js/utils.js"></script>
<script src="system/themes/default/js/data.js"></script>
<script src="system/themes/default/js/visual.js"></script>
<script src="system/themes/default/js/init.js"></script>
