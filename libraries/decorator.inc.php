<?php
// $Id: decorator.inc.php,v 1.1.2.3 2005/03/08 12:35:04 jollytoad Exp $

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

function &noEscape($value) {
	if (is_a($value, 'Decorator')) {
		$value->noEscape = true;
		return $value;
	}
	$dec = new Decorator();
	$dec->v = $value;
	$dec->noEscape = true;
	return $dec;
}

// Resolve a value
function value(&$var, &$fields) {
	if (is_a($var, 'Decorator')) {
		if (isset($var->v)) return $var->v;
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

// Resolve a value, and escape for an XML doc
function value_xml(&$var, &$fields) {
	if (is_a($var, 'Decorator') && isset($var->noEscape) && $var->noEscape === true)
		return value($var, $fields);
	else
		### TODO: Escape for XML's limited entities rather than for HTML
		return htmlentities(value($var, $fields));
}

// Resolve a value, and escape for a URL
function value_url(&$var, &$fields) {
	if (is_a($var, 'Decorator') && isset($var->noEscape) && $var->noEscape === true)
		return value($var, $fields);
	else
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
