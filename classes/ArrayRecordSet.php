<?php

/**
 * Really simple RecordSet to allow printTable of arrays.
 *
 * $Id: ArrayRecordSet.php,v 1.2 2005/05/02 15:47:25 chriskl Exp $
 */
class ArrayRecordSet {

	var $_array;
	var $_count;
	var $EOF = false;
	var $f;
	
	function ArrayRecordSet($data) {
		$this->_array = $data;
		$this->_count = count($this->_array);
		$this->f = reset($this->_array);
		if ($this->f === false) $this->EOF = true;
	}
	
	function recordCount() {
		return $this->_count;
	}
	
	function moveNext() {
		$this->f = next($this->_array);
		if ($this->f === false) $this->EOF = true;
	}
}

?>
