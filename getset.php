

<html>
<body>

<?php

if ( array_key_exists( 'code', $_POST )) {
	$code = $_POST['code'];
	
	preg_match_all( '/\$m[a-zA-Z0-9]+/', $code, $matches );
	
?>
<pre style="border: 1px solid #ccc; background="#efefef; padding: .4em .7em;">
<?php
foreach( $matches as $match ) {
		
		
		
}
?>
</pre>
<?php } ?>

<form action="getset.php" method="post">
<textarea rows="7" cols="80" name="code"></textarea>
<br>
<input type="submit" value="Generate Getters and Setters">

</body>
</html>


