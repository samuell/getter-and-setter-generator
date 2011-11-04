<html>
<body>
<?php

/**
 *  @author: Samuel Lampa - samuel.lampa # gmail.com
 */

?>
<pre style="border: 1px solid #ccc; background: #efefef; 
            padding: .4em .7em; width: 566px;">
<?php

$code = '';

if ( array_key_exists( 'code', $_POST )) {
	$code = $_POST['code'];
	preg_match_all( '/\$m[a-zA-Z0-9]+/', $code, $matchgroups );
	// print_r($matchgroups);
	foreach( $matchgroups[0] as $memberFieldName ) {
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
}
";
	echo( $setter );
		}
	}

?>
</pre>
<?php } ?>

<form action="getset-gen.php" method="post">
<textarea rows="7" cols="80" name="code"><?php echo( $code ) ?></textarea>
<br>
<input type="submit" value="Generate Getters and Setters">

</body>
</html>


