<?php
/**
 * index.php for Multisite Language Switcher Theme.
 * v1.0 by oncleben31
 * 
 * Description: This theme redirect users from "/" to "/fr/" or "/en/" in function of the languages accepted by the browser
 * The Theme redirect the 404 error page too.
 * This theme is a quick and dirty hack for my multilingual blog (oncleben31.cc). I don't have any competency in Theme development. 
 * Don't hesitate to improve it.
 *
 * TODO:
 * - use theme option to set the languages
 * - don't use only the prefered language ($Langue[0]), use the others.
 */

/* Get Prefered language of the browser */
if (!isset($Langue)) {
	$Langue = explode(',',$_SERVER['HTTP_ACCEPT_LANGUAGE']);
	$Langue = strtolower(substr(chop($Langue[0]),0,2));
}


/* Check if the visitor requests the root of you multisite blog (ie "/")
 * In this case, the visitor is redirected to the language specific home depending of the language 
 * Change /fr/ and /en/ by the name of your subsites */
if ($_SERVER['REQUEST_URI'] == "/") {
	if ($Langue == "fr") {
		header("Location: /fr/");
	}	
	else {
		header("Location: /en/");
	}
}
else 
/* 404 error catch: if the user requests somthing else and not direclty en language specific subsite, the visitor is rediredcted to a 
 * language specific 404 error page.
 * The trick is to redirect to a page which doesn't exist on your blogs. */
{
	if ($Langue == "fr") {
		header("Location: /fr/erreur404"); /* Call a page that doesn't exist on my french site */
	}	
	else {
		header("Location: /en/404error"); /* Call a page that doesn't exist on my english site */
	}
}
/* End of the Hack */

?>
