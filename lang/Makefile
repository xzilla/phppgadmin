# 
# That Makefile recodes source lang files into HTML Unicode
# You should add your encodings to this file.
#
# line with 'awk' fixes <?php and ?> tags at the top and bottom of file
# 
DESTDIR=./recoded

all:	polish english

polish:
	cat polish.php | recode latin2..html | \
		awk '{ gsub("&gt;",">"); gsub("&lt;","<"); print $0}' \
		> ${DESTDIR}/polish.php

english:
	cat english.php | recode latin1..html | \
		awk '{ gsub("&gt;",">"); gsub("&lt;","<"); print $0}' \
		> ${DESTDIR}/english.php

chinese-utf8:
	cat chinese-tr-utf8.php | recode utf8..html | \
		awk '{ gsub("&gt;",">"); gsub("&lt;","<"); print $0}' \
		> ${DESTDIR}/chinese-tr-utf8.php

