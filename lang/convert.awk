#!/bin/awk -f
#
# Script contains all needed conversions of recoded text
#
# Remove everything before first "<?php"
BEGIN	{ while (index($0,"&lt;?php")==0) { getline; continue } 
	  print "<?php";
	}
# Remove everything after first "?>"
# (as there should be only one occurance, thats no problem)
/\?\&gt;/ { print "?>"; exit }

	{ # I'm not sure if its still needed
	  gsub("&gt;",">"); 
	  gsub("&lt;","<"); 
	  # Convert CRLF -> LF (== "remove CR" ) ;-)
	  gsub("&#13;","");
	  print $0
	}
