<html>
<body>
<?php

/**
 *  @author: Samuel Lampa - samuel.lampa # gmail.com
 */

?>
<pre style="border: 1px solid #ccc; background: #efefef; padding: .4em .7em;">
<?php
if ( array_key_exists( 'code', $_POST )) {
	$code = $_POST['code'];
	preg_match_all( '/\$m[a-zA-Z0-9]+/', $code, $matches );
	foreach( $matches as $memberFieldNameArr ) {
		$memberFieldName = $memberFieldNameArr[0];
		$memberFieldName = substr( $memberFieldName, 1 );
		$fieldName = lcfirst(substr( $memberFieldName, 1 ));
		if ( count( $memberFieldName > 1 )) {
		$fieldNameCapitalized = ucfirst($fieldName);
			
		# Generate the getters and setters
		$getter	= "public function get$fieldNameCapitalized() { 
    return \$this->$memberFieldName;
}";
	echo( $getter );
		$setter	= "
public function set$fieldNameCapitalized( \$$fieldName ) { 
    \$this->$memberFieldName = \$$fieldName;
}";
	echo( $setter );
		}
	}

?>
</pre>
<?php } ?>

<form action="getset.php" method="post">
<textarea rows="7" cols="80" name="code"><?php echo($code) ?></textarea>
<br>
<input type="submit" value="Generate Getters and Setters">

</body>
</html>


