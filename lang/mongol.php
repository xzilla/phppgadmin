<?php

	/**
	 * Mongolian  language file for phpPgAdmin. 
	 * @maintainer Erdenemandal Bat-Erdene [endeeuk@yahoo.com]
	 *
	 * $Id: mongol.php,v 1.5 2007/04/24 11:42:07 soranzo Exp $
	 */

	// Language and character set
	$lang['applang'] = 'Mongolian';
	$lang['appcharset'] = 'ISO-8859-5';
	$lang['applocale'] = 'mn_MN';
  	$lang['appdbencoding'] = 'ISO_8859_5';
	$lang['applangdir'] = 'ltr';

	// Welcome  
	$lang['strintro'] = 'phpPgAdmin-д тавтай морилно уу.';
	$lang['strppahome'] = 'phpPgAdmin - ?ндсэн дэлгэц';
	$lang['strpgsqlhome'] = 'PostgreSQL - ?ндсэн дэлгэц';
	$lang['strpgsqlhome_url'] = 'http://www.postgresql.org/';
	$lang['strlocaldocs'] = 'PostgreSQL - Бичиг баримт (Локал)';
	$lang['strreportbug'] = 'Алдааны мэдээлэл';
	$lang['strviewfaq'] = 'Асуулт ба хариулт';
	$lang['strviewfaq_url'] = 'http://phppgadmin.sourceforge.net/?page=faq';
	
	// Basic strings
	$lang['strlogin'] = 'Холбогдох';
	$lang['strloginfailed'] = 'Холболтын алдаа';
	$lang['strlogindisallowed'] = 'Холбогдох боломжг?й';
	$lang['strserver'] = 'Т?в компьютер' ;
	$lang['strlogout'] = 'Гарах';
	$lang['strowner'] = 'Эзэмшигч';
	$lang['straction'] = '?йлдэл';
	$lang['stractions'] = '?йлдэл??д';
	$lang['strname'] = 'Нэр';
	$lang['strdefinition'] = 'Тодорхойлолт';
	$lang['straggregates'] = 'Нэгтгэх';
	$lang['strproperties'] = 'Т?л?в (шинж чанар)';
	$lang['strbrowse'] = 'Харах';
	$lang['strdrop'] = 'Хасах';
	$lang['strdropped'] = 'Хасагдсан';
	$lang['strnull'] = 'Хоосон';
	$lang['strnotnull'] = 'Хоосох биш';
	$lang['strprev'] = '< ?мн?х';
	$lang['strnext'] = 'Дараагийн >';
	$lang['strfirst'] = '<< Эхэнд';
	$lang['strlast'] = 'С??лд >>';
	$lang['strfailed'] = 'Алдаа';
	$lang['strcreate'] = '??сгэх';
	$lang['strcreated'] = '??сгэсэн';
	$lang['strcomment'] = 'Тайлбар';
	$lang['strlength'] = 'Урт';
	$lang['strdefault'] = 'Тодорхой бус';
	$lang['stralter'] = '??рчил?х';
	$lang['strok'] = 'OK';
	$lang['strcancel'] = 'Х?чинг?й болгох';
	$lang['strsave'] = 'Хадгалах';
	$lang['strreset'] = 'Арилгах';
	$lang['strinsert'] = 'Оруулга хийх';
	$lang['strselect'] = 'Сонгох';
	$lang['strdelete'] = 'Устгах';
	$lang['strupdate'] = 'Сайжируулах';
	$lang['strreferences'] = 'Хамаарал';
	$lang['stryes'] = 'Тийм';
	$lang['strno'] = '?г?й';
	$lang['strtrue'] = '?нэн';
	$lang['strfalse'] = 'Худал';
	$lang['stredit'] = 'Засах';
	$lang['strcolumns'] = 'Багана';
	$lang['strrows'] = 'М?р';
	$lang['strobjects'] = 'Обьект';
	$lang['strexample'] = 'гэх мэт';
	$lang['strback'] = 'Буцах'; 	
	$lang['strqueryresults'] = 'Асуулгын ?р д?н';
	$lang['strshow'] = '?зэх';
	$lang['strempty'] = 'Хоослох';
	$lang['strlanguage'] = 'Хэл';
	$lang['strencoding'] = 'Кодчилох';
	$lang['strvalue'] = 'Утга';
	$lang['strunique'] = 'Онцгой';
	$lang['strprimary'] = '?ндсэн';
	$lang['strexport'] = 'Экспорт';
	$lang['strimport'] = 'Импорт';
	$lang['strsql'] = 'SQL';
	$lang['strgo'] = '?ргэлжл??л';
	$lang['stradmin'] = 'Зохион байгуулах';
	$lang['strvacuum'] = 'Vacuum';
	$lang['stranalyze'] = 'Д?н шинжилгээ';
	$lang['strclusterindex'] = 'Кластер';
	$lang['strclustered'] = 'Кластер';
	$lang['strreindex'] = 'Дахин индекслэх';
	$lang['strrun'] = 'Ажиллуулах';
	$lang['stradd'] = 'Нэмэх';
	$lang['strevent'] = 'Т?л?в';
	$lang['strwhere'] = 'Хаана';
	$lang['strinstead'] = 'Оронд нь ';
	$lang['strwhen'] = 'Хэзээ';
	$lang['strformat'] = 'Формат';
	$lang['strdata'] = '?г?гд?л';
	$lang['strconfirm'] = 'Баталгаажуулах';
	$lang['strexpression'] = '?йлдэл';
	$lang['strellipsis'] = '...';
	$lang['strexpand'] = '?рг?тг?х';
	$lang['strcollapse'] = 'Уналт';
	$lang['strexplain'] = 'Тайлбар';
	$lang['strfind'] = 'Олох';
	$lang['stroptions'] = 'Сонголт';
	$lang['strrefresh'] = 'Сэргээх';
	$lang['strdownload'] = 'Татаж авах';
	$lang['strinfo'] = 'Мэдээлэл';
	$lang['stroids'] = 'OIDs';
	$lang['stradvanced'] = 'Нэмэлт';

	// Error handling
	$lang['strbadconfig'] = 'Таны config.inc.php хуучирсан байна. config.inc.php-dist ?аас дахин ??сгэ.';
	$lang['strnotloaded'] = 'Таны PHP суулгалт нь PostgreSQL ?г?гдлийн сантай хамтран ажмллах боложг?й байна. Та  PHP ?гаа дахин --with-pgsql тохиргоотой суулга.';
	$lang['strbadschema'] = 'Тохиргоо буруу';
	$lang['strbadencoding'] = 'Failed to set client encoding in database.';
	$lang['strsqlerror'] = 'SQL алдаа:';
	$lang['strinstatement'] = 'В операторе:';
	$lang['strinvalidparam'] = 'Неверный параметр скрипта.';
	$lang['strnodata'] = 'Данных не обнаружено.';
	$lang['strnoobjects'] = 'Объектов не обнаружено.';
	$lang['strrownotunique'] = 'Нет уникального идентификатора для этой записи.';

	// Tables
	$lang['strtable'] = 'Таблица';
	$lang['strtables'] = 'Таблицы';
	$lang['strshowalltables'] = 'Показать все таблицы';
	$lang['strnotables'] = 'Таблиц не обнаружено.';
	$lang['strnotable'] = ' Таблица не обнаружена.';
	$lang['strcreatetable'] = 'Создать таблицу';
	$lang['strtablename'] = 'Имя таблицы';
	$lang['strtableneedsname'] = 'Вам необходимо определить имя таблицы.';
	$lang['strtableneedsfield'] = 'Вам необходимо определить по крайней мере одно поле.';
	$lang['strtableneedscols'] = 'Вам необходимо указать допустимое число атрибутов.';
	$lang['strtablecreated'] = 'Таблица создана.';
	$lang['strtablecreatedbad'] = 'Создание таблицы прервано.';
	$lang['strconfdroptable'] = 'Вы уверены, что хотите удалить таблицу "%s"?';
	$lang['strtabledropped'] = 'Таблица удалена.';
	$lang['strtabledroppedbad'] = 'Удаление таблицы прервано.';
	$lang['strconfemptytable'] = 'Вы уверены, что хотите очистить таблицу "%s"?';
	$lang['strtableemptied'] = 'Таблица очищена.';
	$lang['strtableemptiedbad'] = 'Очистка таблицы прервана.';
	$lang['strinsertrow'] = 'Добавить запись';
	$lang['strrowinserted'] = 'Запись добавлена.';
	$lang['strrowinsertedbad'] = 'Добавление записи прервано.';
	$lang['streditrow'] = 'Редактировать запись';
	$lang['strrowupdated'] = 'Запись обновлена.';
	$lang['strrowupdatedbad'] = 'Обновление записи прервано.';
	$lang['strdeleterow'] = 'Удалить запись';
	$lang['strconfdeleterow'] = 'Вы уверены, что хотите удалить запись?';
	$lang['strrowdeleted'] = 'Запись удалена.';
	$lang['strrowdeletedbad'] = 'Удаление записи прервано.';
	$lang['strsaveandrepeat'] = 'Вставить и повторить';
	$lang['strfield'] = 'Поле';
	$lang['strfields'] = 'Поля';
	$lang['strnumfields'] = 'Кол-во полей';
	$lang['strfieldneedsname'] = 'Вам необходимо назвать поле';
	$lang['strselectallfields'] = 'Выбрать все поля';
	$lang['strselectneedscol'] = 'Вам необходимо указать по крайней мере один атрибут';
	$lang['strselectunary'] = 'Унарный оператор не может иметь величину.';
	$lang['straltercolumn'] = 'Изменить атрибут';
	$lang['strcolumnaltered'] = 'Атрибут изменен.';
	$lang['strcolumnalteredbad'] = 'Изменение атрибута прервано.';
	$lang['strconfdropcolumn'] = 'Вы уверены, что хотите удалить атрибут "%s" таблицы "%s"?';
	$lang['strcolumndropped'] = 'Атрибут удален.';
	$lang['strcolumndroppedbad'] = 'Удаление атрибута прервано.';
	$lang['straddcolumn'] = 'Добавить атрибут';
	$lang['strcolumnadded'] = 'Атрибут добавлен.';
	$lang['strcolumnaddedbad'] = 'Добавление атрибута прервано.';
	$lang['strdataonly'] = 'Только данные';
	$lang['strcascade'] = 'Каскадом';
	$lang['strtablealtered'] = 'Таблица изменена.';
	$lang['strtablealteredbad'] = 'Изменение таблицы прервано.';
	$lang['strdataonly'] = 'Только данные';
	$lang['strstructureonly'] = 'Только структуру';
	$lang['strstructureanddata'] = 'Структуру и данные';

	// Users
	$lang['struser'] = 'Пользователь';
	$lang['strusers'] = 'Пользователи';
	$lang['strusername'] = 'Имя пользователя';
	$lang['strpassword'] = 'Пароль';
	$lang['strsuper'] = 'Суперпользователь?';
	$lang['strcreatedb'] = 'Создать базу данных?';
	$lang['strexpires'] = 'Срок действия';
	$lang['strnousers'] = 'Нет таких пользователей.';
	$lang['struserupdated'] = 'Пользователь обновлен.';
	$lang['struserupdatedbad'] = 'Обновление пользователя прервано.';
	$lang['strshowallusers'] = 'Показать всех пользователей';
	$lang['strcreateuser'] = 'Создать пользователя';
	$lang['struserneedsname'] = 'Вы должны ввести имя пользователя.';
	$lang['strusercreated'] = 'Пользователь создан.';
	$lang['strusercreatedbad'] = 'Создание пользователя прервано.';
	$lang['strconfdropuser'] = 'Вы уверены, что хотите удалить пользователя "%s"?';
	$lang['struserdropped'] = 'Пользователь удален.';
	$lang['struserdroppedbad'] = 'Удаление пользователя прервано.';
	$lang['straccount'] = 'Аккаунт';
	$lang['strchangepassword'] = 'Изменить пароль';
	$lang['strpasswordchanged'] = 'Пароль изменен.';
	$lang['strpasswordchangedbad'] = 'Изменение пароля прервано.';
	$lang['strpasswordshort'] = 'Пароль слишком короткий.';
	$lang['strpasswordconfirm'] = 'Пароль не соответствует подтверждению.';

	// Groups
	$lang['strgroup'] = 'Группа';
	$lang['strgroups'] = 'Группы';
	$lang['strnogroup'] = 'Группа не обнаружена.';
	$lang['strnogroups'] = 'Ни одной группы не обнаружено.';
	$lang['strcreategroup'] = 'Создать группу';
	$lang['strshowallgroups'] = 'Показать все группы';
	$lang['strgroupneedsname'] = 'Вам необходимо указать название группы.';
	$lang['strgroupcreated'] = 'Группа создана.';
	$lang['strgroupcreatedbad'] = 'Создание группы прервано.';
	$lang['strconfdropgroup'] = 'Вы уверены, что хотите удалить группу "%s"?';
	$lang['strgroupdropped'] = 'Группа удалена.';
	$lang['strgroupdroppedbad'] = 'Удаление группы прервано.';
	$lang['strmembers'] = 'Участников';
	$lang['straddmember'] = 'Добавить участника';
	$lang['strmemberadded'] = 'Участник добавлен.';
	$lang['strmemberaddedbad'] = 'Добавление участника прервано.';
	$lang['strdropmember'] = 'Удалить участника';
	$lang['strconfdropmember'] = 'Вы уверены, что хотите удалить участника "%s" из группы "%s"?';
	$lang['strmemberdropped'] = 'Участник удален.';
	$lang['strmemberdroppedbad'] = 'Удаление участника прервано.';

	// Privilges
	$lang['strprivilege'] = 'Привилегия';
	$lang['strprivileges'] = 'Привилегии';
	$lang['strnoprivileges'] = 'Объект не имеет привилегий.';
	$lang['strgrant'] = 'Усилить';
	$lang['strrevoke'] = 'Ослабить';
	$lang['strgranted'] = 'Привилегии изменены.';
	$lang['strgrantfailed'] = 'Изменение привилегий прервано.';
	$lang['strgrantbad'] = 'Вам необходимо указать хотя бы одного пользователя или группу и хотя бы одну привилегию.';
	$lang['stralterprivs'] = 'Изменить привилегии';
	$lang['strgrantor'] = 'Донор';
	$lang['strasterisk'] = '*';

	// Databases
	$lang['strdatabase'] = 'База данных';
	$lang['strdatabases'] = 'Базы данных';
	$lang['strshowalldatabases'] = 'Показать все базы данных';
	$lang['strnodatabase'] = 'База данных не обнаружена.';
	$lang['strnodatabases'] = 'Ни одной базы данных не обнаружено.';
	$lang['strcreatedatabase'] = 'Создать базу данных';
	$lang['strdatabasename'] = 'Имя базы данных';
	$lang['strdatabaseneedsname'] = 'Вам необходимо присвоить имя Вашей базе данных.';
	$lang['strdatabasecreated'] = 'База данных создана.';
	$lang['strdatabasecreatedbad'] = 'Создание базы данных прервано.';
	$lang['strconfdropdatabase'] = 'Вы уверены, что хотите уничтожить базу данных "%s"?';
	$lang['strdatabasedropped'] = ' База данных уничтожена.';
	$lang['strdatabasedroppedbad'] = 'Уничтожение базы данных прервано.';
	$lang['strentersql'] = 'Введите SQL-запрос ниже:';
	$lang['strvacuumgood'] = 'Операция перестройки завершена.';
	$lang['strvacuumbad'] = 'Операция перестройки прервана.';
	$lang['stranalyzegood'] = ' Операция анализа завершена.';
	$lang['stranalyzebad'] = ' Операция анализа завершена.';

	// Views
	$lang['strview'] = 'Представление';
	$lang['strviews'] = 'Представления';
	$lang['strshowallviews'] = 'Показать все представления';
	$lang['strnoview'] = 'Представление не обнаружено.';
	$lang['strnoviews'] = 'Ни одного представления не обнаружено.';
	$lang['strcreateview'] = 'Создать представление';
	$lang['strviewname'] = 'Имя представления';
	$lang['strviewneedsname'] = 'Вам необходимо указать имя представления.';
	$lang['strviewneedsdef'] = ' Вам необходимо определить атрибуты представления.';
	$lang['strviewcreated'] = 'Представление создано.';
	$lang['strviewcreatedbad'] = 'Создание представления прервано.';
	$lang['strconfdropview'] = 'Вы уверены, что хотите уничтожить представление "%s"?';
	$lang['strviewdropped'] = 'Представление уничтожено.';
	$lang['strviewdroppedbad'] = 'Уничтожение представления прервано.';
	$lang['strviewupdated'] = 'Представление обновлено.';
	$lang['strviewupdatedbad'] = 'Обновление представления прервано.';

	// Sequences
	$lang['strsequence'] = 'Последовательность';
	$lang['strsequences'] = ' Последовательности';
	$lang['strshowallsequences'] = 'Показать все последовательности';
	$lang['strnosequence'] = 'Последовательность не обнаружена.';
	$lang['strnosequences'] = 'Ни одной последовательности не обнаружено.';
	$lang['strcreatesequence'] = 'Создать последовательность';
	$lang['strlastvalue'] = 'Последнее значение';
	$lang['strincrementby'] = 'Увеличение на';
	$lang['strstartvalue'] = 'Начальное значение';
	$lang['strmaxvalue'] = 'Макс. величина';
	$lang['strminvalue'] = 'Мин. величина';
	$lang['strcachevalue'] = 'Размер кэша';
	$lang['strlogcount'] = 'Log Count';
	$lang['striscycled'] = 'Зациклить?';
	$lang['strsequenceneedsname'] = 'Вам необходимо указать имя последовательности.';
	$lang['strsequencecreated'] = 'Последовательность создана.';
	$lang['strsequencecreatedbad'] = 'Создание последовательности прервано.';
	$lang['strconfdropsequence'] = 'Вы уверены, что хотите уничтожить последовательность "%s"?';
	$lang['strsequencedropped'] = 'Последовательность уничтожена.';
	$lang['strsequencedroppedbad'] = 'Уничтожение последовательности прервано.';
	$lang['strsequencereset'] = 'Последовательность сброшена.';
	$lang['strsequenceresetbad'] = 'Сброс последовательности прерван.'; 

	// Indexes
	$lang['strindexes'] = 'Индекс';
	$lang['strindexname'] = 'Имя индекса';
	$lang['strshowallindexes'] = 'Показать все индексы';
	$lang['strnoindex'] = 'Индекс не обнаружен.';
	$lang['strnoindexes'] = 'Ни одного индекса не обнаружено.';
	$lang['strcreateindex'] = 'Создать индекс';
	$lang['strtabname'] = 'Имя таблицы';
	$lang['strcolumnname'] = 'Имя атрибута';
	$lang['strindexneedsname'] = 'Вам необходимо указать имя индекса';
	$lang['strindexneedscols'] = 'Вам необходимо указать допустимое количество атрибутов.';
	$lang['strindexcreated'] = 'Индекс создан.';
	$lang['strindexcreatedbad'] = 'Создание индекса прервано.';
	$lang['strconfdropindex'] = 'Вы уверены, что хотите уничтожить индекс "%s"?';
	$lang['strindexdropped'] = 'Индекс уничтожен.';
	$lang['strindexdroppedbad'] = 'Уничтожение индекса прервано.';
	$lang['strkeyname'] = 'Имя ключа';
	$lang['struniquekey'] = 'Уникальный ключ';
	$lang['strprimarykey'] = 'Первичный ключ';
	$lang['strindextype'] = 'Вид индекса';
	$lang['strindexname'] = 'Имя индекса';
	$lang['strtablecolumnlist'] = 'Атрибутов в таблице';
	$lang['strindexcolumnlist'] = 'Атрибутов в индексе';
	$lang['strconfcluster'] = 'Вы уверены, что хотите кластеризовать "%s"?';
	$lang['strclusteredgood'] = 'Кластеризация завершена.';
	$lang['strclusteredbad'] = 'Кластеризация прервана.';

	// Rules
	$lang['strrules'] = 'Правила';
	$lang['strrule'] = 'Правило';
	$lang['strshowallrules'] = 'Показать все правила';
	$lang['strnorule'] = 'Правило не обнаружено.';
	$lang['strnorules'] = 'Ни одного правила не обнаружено.';
	$lang['strcreaterule'] = 'Создать правило';
	$lang['strrulename'] = 'Имя правила';
	$lang['strruleneedsname'] = 'Вам необходимо указать имя правила.';
	$lang['strrulecreated'] = 'Правило создано.';
	$lang['strrulecreatedbad'] = 'Создание правила прервано.';
	$lang['strconfdroprule'] = 'Вы уверены, что хотите уничтожить правило "%s" on "%s"?';
	$lang['strruledropped'] = 'Правило уничтожено.';
	$lang['strruledroppedbad'] = 'Уничтожение правила прервано.';

	// Constraints
	$lang['strconstraints'] = 'Ограничения';
	$lang['strshowallconstraints'] = 'Показать все ограничения';
	$lang['strnoconstraints'] = 'Ни одного ограничения не обнаружено.';
	$lang['strcreateconstraint'] = 'Создать ограничение';
	$lang['strconstraintcreated'] = 'Ограничение создано.';
	$lang['strconstraintcreatedbad'] = 'Создание ограничения прервано.';
	$lang['strconfdropconstraint'] = 'Вы уверены, что хотите уничтожить ограничение "%s" on "%s"?';
	$lang['strconstraintdropped'] = 'Ограничение уничтожено.';
	$lang['strconstraintdroppedbad'] = 'Уничтожение ограничения прервано.';
	$lang['straddcheck'] = 'Добавить проверку';
	$lang['strcheckneedsdefinition'] = 'Ограничение проверки нуждается в определении.';
	$lang['strcheckadded'] = 'Ограничение проверки добавлено.';
	$lang['strcheckaddedbad'] = 'Добавление ограничения проверки прервано.';
	$lang['straddpk'] = 'Добавить первичный ключ';
	$lang['strpkneedscols'] = 'Первичный ключ должен включать хотя бы один атрибут.';
	$lang['strpkadded'] = 'Первичный ключ добавлен.';
	$lang['strpkaddedbad'] = 'Добавление первичного ключа прервано.';
	$lang['stradduniq'] = 'Добавить уникальный ключ';
	$lang['struniqneedscols'] = 'Уникальный ключ должен включать хотя бы один атрибут.';
	$lang['struniqadded'] = 'Уникальный ключ добавлен.';
	$lang['struniqaddedbad'] = 'Добавление уникального ключа прервано.';
	$lang['straddfk'] = 'Добавить внешний ключ';
	$lang['strfkneedscols'] = 'Внешний ключ должен включать хотя бы один атрибут.';
	$lang['strfkneedstarget'] = 'Внешнему ключу необходимо указать целевую таблицу.';
	$lang['strfkadded'] = 'Внешний ключ добавлен.';
	$lang['strfkaddedbad'] = 'Добавление внешнего ключа прервано.';
	$lang['strfktarget'] = 'Целевая таблица';
	$lang['strfkcolumnlist'] = 'Атрибуты в ключе';
	$lang['strondelete'] = 'ON DELETE';
	$lang['stronupdate'] = 'ON UPDATE';	

	// Functions
	$lang['strfunction'] = 'Функция';
	$lang['strfunctions'] = ' Функции';
	$lang['strshowallfunctions'] = 'Показать все функции';
	$lang['strnofunction'] = 'Функция не обнаружена.';
	$lang['strnofunctions'] = 'Ни одной функции не обнаружено.';
	$lang['strcreatefunction'] = 'Создать функцию';
	$lang['strfunctionname'] = 'Имя функции';
	$lang['strreturns'] = 'Возвращаемое значение';
	$lang['strarguments'] = 'Аргументы';
	$lang['strproglanguage'] = 'Язык программирования';
	$lang['strproglanguage'] = 'Язык';
	$lang['strfunctionneedsname'] = 'Вам необходимо указать имя функции.';
	$lang['strfunctionneedsdef'] = 'Вам необходимо определить функцию.';
	$lang['strfunctioncreated'] = 'Функция создана.';
	$lang['strfunctioncreatedbad'] = 'Создание функции прервано.';
	$lang['strconfdropfunction'] = 'Вы уверены, что хотите уничтожить функцию "%s"?';
	$lang['strfunctiondropped'] = 'Функция уничтожена.';
	$lang['strfunctiondroppedbad'] = 'Уничтожение функции прервано.';
	$lang['strfunctionupdated'] = 'Функция обновлена.';
	$lang['strfunctionupdatedbad'] = 'Обновление функции прервано.';

	// Triggers
	$lang['strtrigger'] = 'Триггер';
	$lang['strtriggers'] = ' Триггеры';
	$lang['strshowalltriggers'] = 'Показать все триггеры';
	$lang['strnotrigger'] = 'Триггер не обнаружен.';
	$lang['strnotriggers'] = 'Ни одного триггера не обнаружено.';
	$lang['strcreatetrigger'] = 'Создать триггер';
	$lang['strtriggerneedsname'] = 'Вам необходимо указать имя триггера.';
	$lang['strtriggerneedsfunc'] = 'Вам необходимо определить функцию триггера.';
	$lang['strtriggercreated'] = 'Триггер создан.';
	$lang['strtriggercreatedbad'] = 'Создание триггера прервано.';
	$lang['strconfdroptrigger'] = 'Вы уверены, что хотите уничтожить триггер "%s" на "%s"?';
	$lang['strtriggerdropped'] = 'Триггер уничтожен.';
	$lang['strtriggerdroppedbad'] = 'Уничтожение триггера прервано.';
	$lang['strtriggeraltered'] = 'Триггер изменен.';
	$lang['strtriggeralteredbad'] = 'Изменение триггера прервано.';

	// Types
	$lang['strtype'] = 'Тип данных';
	$lang['strtypes'] = 'Типы данных';
	$lang['strshowalltypes'] = 'Показать все типы данных';
	$lang['strnotype'] = 'Тип данных не обнаружен.';
	$lang['strnotypes'] = 'Ни одного типа данных не обнаружено.';
	$lang['strcreatetype'] = 'Создать тип данных';
	$lang['strtypename'] = 'Имя типа данных';
	$lang['strinputfn'] = 'Функция ввода';
	$lang['stroutputfn'] = 'Функция вывода';
	$lang['strpassbyval'] = 'Передать по значению?';
	$lang['stralignment'] = 'Выравнивание';
	$lang['strelement'] = 'Элемент';
	$lang['strdelimiter'] = 'Разделитель';
	$lang['strstorage'] = 'Storage';
	$lang['strtypeneedsname'] = 'Вам необходимо указать имя типа данных.';
	$lang['strtypeneedslen'] = 'Вам необходимо указать размер для типа данных.';
	$lang['strtypecreated'] = 'Тип данных создан.';
	$lang['strtypecreatedbad'] = 'Создание типа данных прервано.';
	$lang['strconfdroptype'] = 'Вы уверены, что хотите уничтожить тип данных "%s"?';
	$lang['strtypedropped'] = 'Тип данных уничтожен.';
	$lang['strtypedroppedbad'] = 'Уничтожение типа данных прервано.';

	// Schemas
	$lang['strschema'] = 'Схема';
	$lang['strschemas'] = 'Схемы';
	$lang['strshowallschemas'] = 'Показать все схемы';
	$lang['strnoschema'] = 'Схема не обнаружена.';
	$lang['strnoschemas'] = 'Ни одной схемы не обнаружено.';
	$lang['strcreateschema'] = 'Создать схему';
	$lang['strschemaname'] = 'Имя схемы';
	$lang['strschemaneedsname'] = 'Вам необходимо указать имя схемы.';
	$lang['strschemacreated'] = 'Схема создана.';
	$lang['strschemacreatedbad'] = 'Создание схемы прервано.';
	$lang['strconfdropschema'] = 'Вы уверены, что хотите уничтожить схему "%s"?';
	$lang['strschemadropped'] = 'Схема уничтожена.';
	$lang['strschemadroppedbad'] = 'Уничтожение схемы прервано.';

	// Reports
	$lang['strreport'] = 'Отчет';
	$lang['strreports'] = 'Отчеты';
	$lang['strshowallreports'] = 'Показать все отчеты';
	$lang['strnoreports'] = 'Отчетов нет.';
	$lang['strcreatereport'] = 'Создать отчет';
	$lang['strreportdropped'] = 'Отчет уничтожен.';
	$lang['strreportdroppedbad'] = 'Уничтожение отчета прервано.';
	$lang['strconfdropreport'] = 'Вы уверены, что хотите уничтожить отчет "%s"?';
	$lang['strreportneedsname'] = 'Вам необходимо указать имя отчета.';
	$lang['strreportneedsdef'] = 'Вам необходимо указать SQL-запрос для Вашего отчета.';
	$lang['strreportcreated'] = 'Отчет сохранен.';
	$lang['strreportcreatedbad'] = 'Сохранение отчета прервано.';

	// Domains
	$lang['strdomain'] = 'Домен';
	$lang['strdomains'] = 'Домены';
	$lang['strshowalldomains'] = 'Показать все домены';
	$lang['strnodomains'] = 'Ни одного домена не обнаружено.';
	$lang['strcreatedomain'] = 'Создать домен';
	$lang['strdomaindropped'] = 'Домен удален.';
	$lang['strdomaindroppedbad'] = 'Удаление домена прервано.';
	$lang['strconfdropdomain'] = 'Вы уверены, что хотите удалить домен "%s"?';
	$lang['strdomainneedsname'] = 'Вам необходимо указать имя домена.';
	$lang['strdomaincreated'] = 'Домен создан.';
	$lang['strdomaincreatedbad'] = 'Создание домена прервано.';	
	$lang['strdomainaltered'] = 'Домен изменен.';
	$lang['strdomainalteredbad'] = 'Изменение домена прервано.';	

	// Operators
	$lang['stroperator'] = 'Оператор';
	$lang['stroperators'] = 'Операторы';
	$lang['strshowalloperators'] = 'Показать все операторы';
	$lang['strnooperator'] = 'Оператор не обнаружен.';
	$lang['strnooperators'] = 'Операторы не обнаружены.';
	$lang['strcreateoperator'] = 'Создать оператор';
	$lang['strleftarg'] = 'Тип левого аргумента';
	$lang['strrightarg'] = 'Тип правого аргумента';
	$lang['strcommutator'] = 'Преобразование';
	$lang['strnegator'] = 'Отрицание';
	$lang['strrestrict'] = 'Ослабление';
	$lang['strjoin'] = 'Объединение';
	$lang['strhashes'] = 'Хеширование';
	$lang['strmerges'] = 'Слияние';
	$lang['strleftsort'] = 'Сотировка по левому';
	$lang['strrightsort'] = 'Сотировка по правому';
	$lang['strlessthan'] = 'Меньше';
	$lang['strgreaterthan'] = 'Больше';
	$lang['stroperatorneedsname'] = 'Вам необходимо указать название оператора.';
	$lang['stroperatorcreated'] = 'Оператор создан';
	$lang['stroperatorcreatedbad'] = 'оздание оператора прервано.';
	$lang['strconfdropoperator'] = 'Вы уверены, что хотите уничтожить оператор "%s"?';
	$lang['stroperatordropped'] = 'Оператор удален.';
	$lang['stroperatordroppedbad'] = 'Удаление оператора прервано.';

	// Casts
	$lang['strcasts'] = 'Образцы';
	$lang['strnocasts'] = 'Образцов не обнаружено.';
	$lang['strsourcetype'] = 'Тип источника';
	$lang['strtargettype'] = 'Тип приемника';
	$lang['strimplicit'] = 'Неявный';
	$lang['strinassignment'] = 'В назначении';
	$lang['strbinarycompat'] = '(двоично совместимый)';
	
	// Conversions
	$lang['strconversions'] = 'Преобразование';
	$lang['strnoconversions'] = 'Преобразований не обнаружено.';
	$lang['strsourceencoding'] = 'Кодировка источника';
	$lang['strtargetencoding'] = 'Кодировка приемника';
	
	// Languages
	$lang['strlanguages'] = 'Языки';
	$lang['strnolanguages'] = 'Языков не обнаружено.';
	$lang['strtrusted'] = 'Проверено';
	
	// Info
	$lang['strnoinfo'] = 'Нет доступной информации.';
	$lang['strreferringtables'] = 'Ссылающиеся таблицы';
	$lang['strparenttables'] = 'Родительские таблицы';
	$lang['strchildtables'] = 'Дочерние таблицы';

	// Miscellaneous
	$lang['strtopbar'] = '%s выполняется на %s:%s -- Вы зарегистрированы как "%s"';
	$lang['strtimefmt'] = ' j-m-Y  g:i';

?>

