<?php include('includes/header.php'); ?>

<style>

body {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
	background-color:#333;
	padding:10px;
	margin-top:60px;
}

</style>

<title><?php echo $page_title; ?></title>

</head>

<body>

</div><div id="loginForm">
<div class="container_cms">
<h2 align="left" style="padding-top:0px;">Login:</h2>
<p><a href="" class="subButton">Return To Homepage</a></p>

<p style="color:#FFFFFF">

<form id="login_form" name="login_form" method="post" action="login/check">
  <p>
    <label>Username<br />
      <input type="text" name="username" id="username" size="50"/>
    </label>
  </p>
  <p>
    <label>Password<br />
      <input type="password" name="password" id="password" size="50"/>
    </label>
  </p>
  <p>
    <label>
      <input type="submit" name="submit" id="submit" value="Submit" />
    </label>
  </p>
</form>
</div>
</div>
</body>
</html>