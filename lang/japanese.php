<?php

	/**
	 * Japanese language file for phpPgAdmin.
	 * @maintainer Tadashi Jokagi [elf2000@users.sourceforge.net]
	 *
	 * $Id: japanese.php,v 1.4 2003/08/01 06:24:16 chriskl Exp $
	 */

	// Language and character set
	$lang['applang'] = '日本語(EUC-JP)';
	$lang['appcharset'] = 'EUC-JP';
	$lang['applocale'] = 'ja_JP';
  	$lang['appdbencoding'] = 'EUC_JP';
  
	// Welcome  
	$lang['strintro'] = 'ようこそphpPgAdminへ。';
	$lang['strppahome'] = 'phpPgAdmin ホームページ';
	$lang['strpgsqlhome'] = 'PostgreSQL ホームページ';
	$lang['strpgsqlhome_url'] = 'http://www.postgresql.org/';
	$lang['strlocaldocs'] = 'PostgreSQL ドキュメント (local)';
	$lang['strreportbug'] = 'バグレポート';
	$lang['strviewfaq'] = 'FAQを見る';
	$lang['strviewfaq_url'] = 'http://phppgadmin.sourceforge.net/?page=faq';
	
	// Basic strings
	$lang['strintro'] = 'ようこそphpPgAdminへ。';
	$lang['strlogin'] = 'ログイン';
	$lang['strloginfailed'] = 'ログイン失敗';
	$lang['strserver'] = 'サーバー';
	$lang['strlogout'] = 'ログアウト';
	$lang['strowner'] = '所有者';
	$lang['straction'] = 'アクション';
	$lang['stractions'] = '操作一覧';
	$lang['strname'] = '名前';
	$lang['strdefinition'] = '定義';
	$lang['stroperators'] = '操作';
	$lang['straggregates'] = '総計';
	$lang['strproperties'] = 'プロパティ';
	$lang['strbrowse'] = '表示';
	$lang['strdrop'] = '破棄';
	$lang['strdropped'] = '破棄しました';
	$lang['strnull'] = 'NULL';
	$lang['strnotnull'] = 'NOT NULL';
	$lang['strprev'] = '前に';
	$lang['strnext'] = '次に';
	$lang['strfailed'] = '失敗';
	$lang['strcreate'] = '作成';
	$lang['strcreated'] = '作成しました';
	$lang['strcomment'] = 'コメント';
	$lang['strlength'] = '長さ';
	$lang['strdefault'] = 'デフォルト';
	$lang['stralter'] = '変更';
	$lang['strok'] = 'OK';
	$lang['strcancel'] = '取り消し';
	$lang['strsave'] = '保存';
	$lang['strreset'] = 'リセット';
	$lang['strinsert'] = '挿入';
	$lang['strselect'] = '選択';
	$lang['strdelete'] = '削除';
	$lang['strupdate'] = '更新';
	$lang['strreferences'] = '参照';
	$lang['stryes'] = 'はい';
	$lang['strno'] = 'いいえ';
	$lang['strtrue'] = '真(true)';
	$lang['strfalse'] = '偽(false)';
	$lang['stredit'] = '編集';
	$lang['strcolumns'] = 'カラム一覧';
	$lang['strrows'] = 'レコード';
	$lang['strrowsaff'] = '影響を受けたレコード';
	$lang['strexample'] = '例)';
	$lang['strback'] = '戻る';
	$lang['strqueryresults'] = 'クエリ結果';
	$lang['strshow'] = '表示';
	$lang['strempty'] = '空にする';
	$lang['strlanguage'] = '言語';
	$lang['strencoding'] = 'エンコード';
	$lang['strvalue'] = '値';
	$lang['strunique'] = 'ユニーク';
	$lang['strprimary'] = 'プライマリ';
	$lang['strexport'] = 'エクスポート';
	$lang['strimport'] = 'インポート';
	$lang['strsql'] = 'SQL';
	$lang['strgo'] = 'Go';
	$lang['stradmin'] = '管理';
	$lang['strvacuum'] = 'バキューム';
	$lang['stranalyze'] = '解析';
	$lang['strcluster'] = 'クラスター';
	$lang['strreindex'] = '再インデックス';
	$lang['strrun'] = '実カラム';
	$lang['stradd'] = '追加';
	$lang['strevent'] = 'イベント';
	$lang['strwhere'] = 'Where';
	$lang['strinstead'] = '代行';
	$lang['strwhen'] = 'When';
	$lang['strformat'] = 'フォーマット';
	$lang['strdata'] = 'データ';
	$lang['strconfirm'] = '確認';
	$lang['strexpression'] = '評価式';
	$lang['strellipsis'] = '...';
	$lang['strexpand'] = '展開';
	$lang['strcollapse'] = '閉じる';

	// Error handling
	$lang['strnoframes'] = 'このアプリケーションを使用するためにはフレームが使用可能なブラウザーが必要です。';
	$lang['strbadconfig'] = 'config.inc.phpが旧式です。新しいconfig.inc.php-distから再作成する必要があります。';
	$lang['strnotloaded'] = 'データベースをサポートするようにPHPのコンパイル・インストールがされていません';
	$lang['strbadschema'] = '無効のスキーマが指定されました。';
	$lang['strbadencoding'] = 'データベースの中でクライアントエンコードを指定しませんでした。';
	$lang['strsqlerror'] = 'SQLエラー:';
	$lang['strinstatement'] = 'In statement:';
	$lang['strinvalidparam'] = 'スクリプトパラメータが無効です。';
	$lang['strnodata'] = 'レコードが見つかりません。';
	$lang['strcascade'] = 'カスケード';

	// Tables
	$lang['strtable'] = 'テーブル';
	$lang['strtables'] = 'テーブル一覧';
	$lang['strshowalltables'] = '全テーブルを見る';
	$lang['strnotables'] = 'テーブルが見つかりません。';
	$lang['strnotable'] = 'テーブルが見つかりません。';
	$lang['strcreatetable'] = 'テーブル作成';
	$lang['strtablename'] = 'テーブル名';
	$lang['strtableneedsname'] = 'テーブル名を指定する必要があります。';
	$lang['strtableneedsfield'] = '少なくとも一つのフィールドを指定しなければなりません。';
	$lang['strtableneedscols'] = '有効なカラム数を指定しなければなりません。';
	$lang['strtablecreated'] = 'テーブルを作成しました。';
	$lang['strtablecreatedbad'] = 'テーブルの作成に失敗しました。';
	$lang['strconfdroptable'] = 'テーブル「%s」を本当に破棄しますか?';
	$lang['strtabledropped'] = 'テーブルを破棄しました。';
	$lang['strtabledroppedbad'] = 'テーブルの破棄に失敗しました。';
	$lang['strconfemptytable'] = '本当にテーブル「%s」の内容を破棄しますか?';
	$lang['strtableemptied'] = 'テーブルが空になりました.';
	$lang['strtableemptiedbad'] = 'テーブルを空にできませんでした。';
	$lang['strinsertrow'] = 'レコードの挿入';
	$lang['strrowinserted'] = 'レコードを挿入しました。';
	$lang['strrowinsertedbad'] = 'レコードの挿入に失敗しました。';
	$lang['streditrow'] = 'レコード編集';
	$lang['strrowupdated'] = 'レコードを更新しました。';
	$lang['strrowupdatedbad'] = 'レコードの更新に失敗しました。';
	$lang['strdeleterow'] = 'レコード削除';
	$lang['strconfdeleterow'] = '本当にこのレコードを削除しますか?';
	$lang['strrowdeleted'] = 'レコードを削除しました。';
	$lang['strrowdeletedbad'] = 'レコードの削除に失敗しました。';
	$lang['strsaveandrepeat'] = '保存と繰り返し';
	$lang['strfield'] = 'フィールド';
	$lang['strfields'] = 'フィールド一覧';
	$lang['strnumfields'] = 'フィールド数';
	$lang['strfieldneedsname'] = 'フィールド名を指定する必要があります。';
	$lang['strselectneedscol'] = '少なくとも一カラムは必要です。';
	$lang['straltercolumn'] = 'カラムの変更';
	$lang['strcolumnaltered'] = 'カラムを変更しました。';
	$lang['strcolumnalteredbad'] = 'カラムの変更に失敗しました。';
        $lang['strconfdropcolumn'] = '本当にカラム「%s」をテーブル「%s」から破棄していいですか?';
	$lang['strcolumndropped'] = 'カラムを破棄しました。';
	$lang['strcolumndroppedbad'] = 'カラムの破棄に失敗しました。';
	$lang['straddcolumn'] = 'カラム追加';
	$lang['strcolumnadded'] = 'カラムを追加しました。';
	$lang['strcolumnaddedbad'] = 'カラムの追加に失敗しました。';
	$lang['strschemaanddata'] = 'スキーマとデータ';
	$lang['strschemaonly'] = 'スキーマのみ';
	$lang['strdataonly'] = 'データのみ';

	// Users
	$lang['struseradmin'] = 'ユーザー管理';
	$lang['struser'] = 'ユーザー';
	$lang['strusers'] = 'ユーザー一覧';
	$lang['strusername'] = 'ユーザー名';
	$lang['strpassword'] = 'パスワード';
	$lang['strsuper'] = 'スーパーユーザー?';
	$lang['strcreatedb'] = 'データベースを作成しますか?';
	$lang['strexpires'] = '有効期限';
	$lang['strnousers'] = 'ユーザーが見つかりません。';
        $lang['struserupdated'] = 'ユーザーを更新しました。';
	$lang['struserupdatedbad'] = 'ユーザーの更新に失敗しました。';
	$lang['strshowallusers'] = '全てのユーザーを見る。';
	$lang['strcreateuser'] = 'ユーザー作成';
	$lang['strusercreated'] = 'ユーザーを作成しました。';
	$lang['strusercreatedbad'] = 'ユーザーの作成に失敗しました。';
	$lang['strconfdropuser'] = '本当にユーザー「%s」を破棄しますか?';
	$lang['struserdropped'] = 'ユーザーを破棄しました。';
	$lang['struserdroppedbad'] = 'ユーザーの削除に破棄しました';
	$lang['straccount'] = 'アカウント';
	$lang['strchangepassword'] = 'パスワード変更';
	$lang['strpasswordchanged'] = 'パスワードの変更をしました。';
	$lang['strpasswordchangedbad'] = 'パスワードの変更に失敗しました。';
	$lang['strpasswordshort'] = 'パスワードが短すぎます。';
	$lang['strpasswordconfirm'] = 'パスワードの確認が一致しませんでした。';
		
	// Groups
	$lang['strgroupadmin'] = 'グループ管理';
	$lang['strgroup'] = 'グループ';
	$lang['strgroups'] = 'グループ一覧';
	$lang['strnogroup'] = 'グループがありません。';
	$lang['strnogroups'] = 'グループが見つかりません。';
	$lang['strcreategroup'] = 'グループ作成';
	$lang['strshowallgroups'] = '全グループを見る';
	$lang['strgroupneedsname'] = 'グループ名を指定しなければなりません。';
	$lang['strgroupcreated'] = 'グループを作成しました。';
	$lang['strgroupcreatedbad'] = 'グループの作成に失敗しました。';	
	$lang['strconfdropgroup'] = '本当にグループ「%s」を破棄しますか?';
	$lang['strgroupdropped'] = 'グループを破棄しました。';
	$lang['strgroupdroppedbad'] = 'グループの破棄に失敗しました。';
	$lang['strmembers'] = 'メンバー';

	// Privilges
	$lang['strprivilege'] = '特権';
	$lang['strprivileges'] = '特権一覧';
	$lang['strnoprivileges'] = 'このオブジェクトは特権を持っていません。';
	$lang['strgrant'] = '権限';
	$lang['strrevoke'] = '廃止';
	$lang['strgranted'] = '特権を与えました。';
	$lang['strgrantfailed'] = '特権を与える事に失敗しました。';
	$lang['strgrantbad'] = '少なくとも一人のユーザーかグループに、少なくともひとつの特権を指定しなければなりません。';
	$lang['stralterprivs'] = '特権の変更';

	// Databases
	$lang['strdatabase'] = 'データベース';
	$lang['strdatabases'] = 'データベース一覧';
	$lang['strshowalldatabases'] = '全データベースを見る';
	$lang['strnodatabase'] = 'データベースが見つかりません。';
	$lang['strnodatabases'] = 'データベースが全くありません。';
	$lang['strcreatedatabase'] = 'データベース作成';
	$lang['strdatabasename'] = 'データベース名';
	$lang['strdatabaseneedsname'] = 'データベース名を指定しなければなりません。';
	$lang['strdatabasecreated'] = 'データベースを作成しました。';
	$lang['strdatabasecreatedbad'] = 'データベースの作成に失敗しました。';	
	$lang['strconfdropdatabase'] = '本当にデータベース「%s」を破棄しますか?';
	$lang['strdatabasedropped'] = 'データベースを破棄しました。';
	$lang['strdatabasedroppedbad'] = 'データベースの破棄に失敗しました。';
	$lang['strentersql'] = '下に実行するSQLを入力します:';
	$lang['strsqlexecuted'] = 'SQLを実行しました。';
	$lang['strvacuumgood'] = 'バキュームを完了しました。';
	$lang['strvacuumbad'] = 'バキュームに失敗しました。';
	$lang['stranalyzegood'] = '解析を完了しました。';
	$lang['stranalyzebad'] = '解析に失敗しました。';

	// Views
	$lang['strview'] = 'ビュー';
	$lang['strviews'] = 'ビュー一覧';
	$lang['strshowallviews'] = '全ビューの表示';
	$lang['strnoview'] = 'ビューがありません。';
	$lang['strnoviews'] = 'ビューが見つかりません。';
	$lang['strcreateview'] = 'ビュー作成';
	$lang['strviewname'] = 'ビュー名';
	$lang['strviewneedsname'] = 'ビュー名を指定しなければなりません。';
	$lang['strviewneedsdef'] = '定義名を指定しなければなりません。';
	$lang['strviewcreated'] = 'ビューを作成しました。';
	$lang['strviewcreatedbad'] = 'ビューの作成に失敗しました。';
	$lang['strconfdropview'] = '本当にビュー「%s」を破棄しますか?';
	$lang['strviewdropped'] = 'ビューを破棄しました。';
	$lang['strviewdroppedbad'] = 'ビューの破棄に失敗しました。';
	$lang['strviewupdated'] = 'ビューを更新しました。';
	$lang['strviewupdatedbad'] = 'ビューの更新に失敗しました。';

	// Sequences
	$lang['strsequence'] = 'シーケンス';
	$lang['strsequences'] = 'シーケンス一覧';
	$lang['strshowallsequences'] = '全シーケンスを見る';
	$lang['strnosequence'] = 'シーケンスがありません。';
	$lang['strnosequences'] = 'シーケンスが見つかりません。';
	$lang['strcreatesequence'] = 'シーケンス作成';
	$lang['strlastvalue'] = '最終値';
	$lang['strincrementby'] = '増加数';	
	$lang['strstartvalue'] = '開始値';
	$lang['strmaxvalue'] = '最大値';
	$lang['strminvalue'] = '最小値';
	$lang['strcachevalue'] = 'キャッシュ値';
	$lang['strlogcount'] = 'ログカウント';
	$lang['striscycled'] = 'Is Cycled?';
	$lang['striscalled'] = 'Is Called?';
	$lang['strsequenceneedsname'] = 'シーケンス名を指定しなければなりません。';
	$lang['strsequencecreated'] = 'シーケンスを作成しました。';
	$lang['strsequencecreatedbad'] = 'シーケンスの作成に失敗しました。'; 
	$lang['strconfdropsequence'] = '本当にシーケンス「%s」を破棄しますか?';
	$lang['strsequencedropped'] = 'シーケンスを破棄しました。';
	$lang['strsequencedroppedbad'] = 'シーケンスの破棄に失敗しました。';

	// Indexes
	$lang['strindexes'] = 'インデックス一覧';
	$lang['strindexname'] = 'インデックス名';
	$lang['strshowallindexes'] = '全インデックスの表示';
	$lang['strnoindex'] = 'インデックスがありません。';
	$lang['strnoindexes'] = 'インデックスが見つかりません。';
	$lang['strcreateindex'] = 'インデックス作成';
	$lang['strindexname'] = 'インデックス名';
	$lang['strtabname'] = 'タブ名';
	$lang['strcolumnname'] = 'カラム名';
	$lang['strindexneedsname'] = '有効なインデックス名を指定しなければいけません。';
	$lang['strindexneedscols'] = '有効なカラム数を指定しなければいけません。';
	$lang['strindexcreated'] = 'インデックスを作成しました。';
	$lang['strindexcreatedbad'] = 'インデックスを作成に失敗しました。';
	$lang['strconfdropindex'] = '本当にインデックス「%s」を破棄しますか?';
	$lang['strindexdropped'] = 'インデックスを破棄しました。';
	$lang['strindexdroppedbad'] = 'インデックスの破棄に失敗しました。';
	$lang['strkeyname'] = 'キー名';
	$lang['struniquekey'] = 'ユニークキー';
	$lang['strprimarykey'] = 'プライマリキー';
 	$lang['strindextype'] = 'インデックスタイプ';
	$lang['strindexname'] = 'インデックス名';
	$lang['strtablecolumnlist'] = 'テーブル中のカラム';
	$lang['strindexcolumnlist'] = 'インデックス中のカラム';

	// Rules
	$lang['strrules'] = 'ルール一覧';
	$lang['strrule'] = 'ルール';
	$lang['strshowallrules'] = '全ルールの表示';
	$lang['strnorule'] = 'ルールがありません。';
	$lang['strnorules'] = 'ルールが見つかりません。';
	$lang['strcreaterule'] = 'ルール作成';
	$lang['strrulename'] = 'ルール名';
	$lang['strruleneedsname'] = 'ルール名を指定しなければなりません。';
	$lang['strrulecreated'] = 'ルールを作成しました。';
	$lang['strrulecreatedbad'] = 'ルールの作成に失敗しました。';
	$lang['strconfdroprule'] = '本当にルール「%s」をデータベース「%s」から破棄しますか?';
	$lang['strruledropped'] = 'ルールを破棄しました。';
	$lang['strruledroppedbad'] = 'ルールの破棄に失敗しました。';

	// Constraints
	$lang['strconstraints'] = '検査制約一覧';
	$lang['strshowallconstraints'] = '全検査制約の表示';
	$lang['strnoconstraints'] = '検査制約がありません。';
	$lang['strcreateconstraint'] = '検査制約の作成';
	$lang['strconstraintcreated'] = '検査制約を作成しました。';
	$lang['strconstraintcreatedbad'] = '検査制約の作成に失敗しました。';
	$lang['strconfdropconstraint'] = '本当に検査制約「%s」をデータベース「%s」から破棄しますか?';
	$lang['strconstraintdropped'] = '検査制約を破棄しました。';
	$lang['strconstraintdroppedbad'] = '検査制約の破棄に失敗しました。';
	$lang['straddcheck'] = 'チェック追加';
	$lang['strcheckneedsdefinition'] = '検査制約には定義が必要です。';
	$lang['strcheckadded'] = '検査制約を追加しました。';
	$lang['strcheckaddedbad'] = '検査制約の追加に失敗しました。';
	$lang['straddpk'] = 'プライマリキー追加';
	$lang['strpkneedscols'] = 'プライマリキーは少なくとも一カラムを必要とします。';
	$lang['strpkadded'] = 'プライマリキーを追加しました。';
	$lang['strpkaddedbad'] = 'プライマリキーの追加に失敗しました。';
	$lang['stradduniq'] = 'ユニークキー追加';
	$lang['struniqneedscols'] = 'ユニークキーは少なくとも一カラムを必要とします。';
	$lang['struniqadded'] = 'ユニークキーを追加しました。';
	$lang['struniqaddedbad'] = 'ユニークキーの追加に失敗しました。';
	$lang['straddfk'] = '外部キーの追加';
	$lang['strfkneedscols'] = '外部キーは少なくとも一カラムを必要とします。';
	$lang['strfkneedstarget'] = '外部キーはターゲットテーブルを必要とします。';
	$lang['strfkadded'] = '外部キーを追加しました。';
	$lang['strfkaddedbad'] = '外部キーの追加に失敗しました。';
	$lang['strfktarget'] = '対象テーブル';
	$lang['strfkcolumnlist'] = 'Columns in key';
	$lang['strondelete'] = 'ON DELETE';
	$lang['stronupdate'] = 'ON UPDATE';	

	// Functions
	$lang['strfunction'] = '関数';
	$lang['strfunctions'] = '関数一覧';
	$lang['strshowallfunctions'] = '全関数の表示';
	$lang['strnofunction'] = '関数がありません。';
	$lang['strnofunctions'] = '関数が見つかりません。';
	$lang['strcreatefunction'] = '関数作成';
	$lang['strfunctionname'] = '関数名';
	$lang['strreturns'] = '返り値';
	$lang['strarguments'] = '引数';
	$lang['strfunctionneedsname'] = '関数名を指定しなければなりません。';
	$lang['strfunctionneedsdef'] = '関数の定義をしなければなりあせん。';
	$lang['strfunctioncreated'] = '関数を作成しました。';
	$lang['strfunctioncreatedbad'] = '関数の作成に失敗しました。';
	$lang['strconfdropfunction'] = '本当に関数「%s」を破棄しますか?';
	$lang['strfunctiondropped'] = '関数を破棄しました。';
	$lang['strfunctiondroppedbad'] = '関数の破棄に失敗しました。';
	$lang['strfunctionupdated'] = '関数を更新しました。';
	$lang['strfunctionupdatedbad'] = '関数の更新に失敗しました。';

	// Triggers
	$lang['strtrigger'] = 'トリガ';
	$lang['strtriggers'] = 'トリガ一覧';
	$lang['strshowalltriggers'] = '全トリガを表示';
	$lang['strnotrigger'] = 'トリガがありません。';
	$lang['strnotriggers'] = 'トリガが見つかりません。';
	$lang['strcreatetrigger'] = 'トリガ作成';
	$lang['strtriggerneedsname'] = 'トリガ名を指定する必要があります。';
	$lang['strtriggerneedsfunc'] = 'トリガのための関数を指定しなければなりません。';
	$lang['strtriggercreated'] = 'トリガを作成しました。';
	$lang['strtriggercreatedbad'] = 'トリガの作成に失敗しました。';
	$lang['strconfdroptrigger'] = '本当にトリガ「%s」をデータベース「%s」から破棄しますか?';
	$lang['strtriggerdropped'] = 'トリガを破棄しました。';
	$lang['strtriggerdroppedbad'] = 'トリガの破棄に失敗しました。';

	// Types
	$lang['strtype'] = 'データ型';
	$lang['strtypes'] = 'データ型一覧';
	$lang['strshowalltypes'] = '全データ型を表示する';
	$lang['strnotype'] = 'データ型がありません。';
	$lang['strnotypes'] = 'データ型が見つかりませんでした。';
	$lang['strcreatetype'] = 'データ型の作成';
	$lang['strtypename'] = 'データ型名';
	$lang['strinputfn'] = '入力関数';
	$lang['stroutputfn'] = '出力関数';
	$lang['strpassbyval'] = 'Passed by val?';
	$lang['stralignment'] = 'アライメント';
	$lang['strelement'] = '要素';
	$lang['strdelimiter'] = 'デミリタ';
	$lang['strstorage'] = 'ストレージ';
	$lang['strtypeneedsname'] = '型名を指定しなければなりません。';
	$lang['strtypeneedslen'] = 'データ型の長さを指定しなければなりません。';
	$lang['strtypecreated'] = 'データ型を作成しました。';
	$lang['strtypecreatedbad'] = 'データ型の作成に失敗しました';
	$lang['strconfdroptype'] = '本当にデータ型「%s」を破棄しますか?';
	$lang['strtypedropped'] = 'データ型を破棄しました。';
	$lang['strtypedroppedbad'] = 'データ型の破棄に失敗しました。';

	// Schemas
	$lang['strschema'] = 'スキーマ';
	$lang['strschemas'] = 'スキーマ一覧';
	$lang['strshowallschemas'] = '全スキーマの表示';
	$lang['strnoschema'] = 'スキーマがありません。';
	$lang['strnoschemas'] = 'スキーマが見つかりません。';
	$lang['strcreateschema'] = 'スキーマ作成';
	$lang['strschemaname'] = 'スキーマ名';
	$lang['strschemaneedsname'] = 'スキーマ名を指定する必要があります。';
	$lang['strschemacreated'] = 'スキーマを作成しました。';
	$lang['strschemacreatedbad'] = 'スキーマの作成に失敗しました。';
	$lang['strconfdropschema'] = '本当にスキーマ「%s」を破棄しますか?';
	$lang['strschemadropped'] = 'スキーマを破棄しました。';
	$lang['strschemadroppedbad'] = 'スキーマの破棄に失敗しました。';

	// Reports
	$lang['strreport'] = 'レポート';
	$lang['strreports'] = 'レポート一覧';
	$lang['strshowallreports'] = '全レポートを見る';
	$lang['strnoreports'] = 'レポートが見つかりません.';
	$lang['strcreatereport'] = 'レポート作成';
	$lang['strreportdropped'] = 'レポートを破棄しました。';
	$lang['strreportdroppedbad'] = 'レポートの破棄に失敗しました。';
	$lang['strconfdropreport'] = '本当にレポート「%s」を破棄しますか?';
	$lang['strreportneedsname'] = 'レポート名を指定する必要があります。';
	$lang['strreportneedsdef'] = 'レポート用のSQLを指定する必要があります。';
	$lang['strreportcreated'] = 'レポートの保存をしました。';
	$lang['strreportcreatedbad'] = 'レポートの保存に失敗しました。';

	// Miscellaneous
	$lang['strtopbar'] = '%sに%sポート番号%sで接続しています。<br />ユーザー「%s」でホスト「%s」にログインしています。';
	$lang['strtimefmt'] = 'Y年n月j日 G:i';

?>
