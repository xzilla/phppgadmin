<?php
// $Id: decorator.inc.php,v 1.1.2.1 2005/03/01 10:40:15 jollytoad Exp $

// Field decorator
function &field($fieldname, $default = null) {
	$dec = new Decorator();
	$dec->f = $fieldname;
	if ($default !== null) $dec->d = $default;
	return $dec;
}

// Merge arrays decorator
function &merge() {
	$dec = new Decorator();
	$dec->m = func_get_args();
	return $dec;
}

// Resolve a value
function value(&$var, &$fields) {
	if (is_a($var, 'Decorator')) {
		if (isset($var->f)) {
			return isset($fields[$var->f]) ? $fields[$var->f] : (isset($var->d) ? $var->d : null);
		}
		if (isset($var->m)) {
			foreach ($var->m as $dec) {
				$val = value($dec, $fields);
				if (!isset($accum))
					$accum = $val;
				else
					$accum = array_merge($accum, $val);
			}
			return $accum;
		}
	} else
		return $var;
}

// Resolve a value, and escape for an XML/HTML doc
function value_xml(&$var, &$fields) {
	return htmlentities(value($var, $fields));
}

// Resolve a value, and escape for a URL
function value_url(&$var, &$fields) {
	return urlencode(value($var, $fields));
}

// Resolve a value as an XML/HTML attribute
function value_xml_attr($attr, &$var, &$fields) {
	$value = value_xml($var, $fields);
	if (!empty($value))
		return " {$attr}=\"{$value}\"";
	else
		return '';
}

class Decorator
{
	function Decorator() {
	}
}

?>
