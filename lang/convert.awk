#!/usr/bin/awk -f
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

	{ 
	  # Convert CRLF -> LF (== "remove CR" ) ;-)
	  gsub("&#13;","");
	  gsub("&apos;","'");
	  print $0
	}
