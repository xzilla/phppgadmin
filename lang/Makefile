# 
# This Makefile recodes source lang files into HTML Unicode.
# You should add your encodings to this file.  You need to have GNU Recode
# installed.
# 
# It is important to fix first and last lines of the file <?php and ?>
# using 'awk'
# 
# $Id: Makefile,v 1.4 2003/01/27 13:38:25 chriskl Exp $
#
DESTDIR=./recoded

all:	polish english chinese-tr-utf8 chinese-tr-big5 dutch german spanish italian

polish:
	cat polish.php | recode latin2..html | \
		awk '{ gsub("&gt;",">"); gsub("&lt;","<"); print $0}' \
		> ${DESTDIR}/polish.php

english:
	cat english.php | recode latin1..html | \
		awk '{ gsub("&gt;",">"); gsub("&lt;","<"); print $0}' \
		> ${DESTDIR}/english.php

dutch:
	cat dutch.php | recode latin1..html | \
		awk '{ gsub("&gt;",">"); gsub("&lt;","<"); print $0}' \
		> ${DESTDIR}/dutch.php

german:
	cat german.php | recode latin1..html | \
		awk '{ gsub("&gt;",">"); gsub("&lt;","<"); print $0}' \
		> ${DESTDIR}/german.php

spanish:
	cat spanish.php | recode latin1..html | \
		awk '{ gsub("&gt;",">"); gsub("&lt;","<"); print $0}' \
		> ${DESTDIR}/spanish.php

italian:
	cat italian.php | recode latin1..html | \
		awk '{ gsub("&gt;",">"); gsub("&lt;","<"); print $0}' \
		> ${DESTDIR}/italian.php

chinese-tr-utf8:
	cat chinese-tr-utf8.php | recode utf8..html | \
		awk '{ gsub("&gt;",">"); gsub("&lt;","<"); print $0}' \
		> ${DESTDIR}/chinese-tr-utf8.php

chinese-tr-big5:
	cat chinese-tr-big5.php | recode big5..html | \
		awk '{ gsub("&gt;",">"); gsub("&lt;","<"); print $0}' \
		> ${DESTDIR}/chinese-tr-big5.php

