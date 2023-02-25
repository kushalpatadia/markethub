<?php
	
	$main->set("module", $module);
	require_once(DIR_THEME.'theme.template.php');

	$head->title = $winTitle;
	$head->metaTag = $metaTag;

  	/* Loading template files */

	/* for head  start*/
	$search = array('%METATAG%','%TITLE%');
	$replace = array($metaTag,$winTitle);
	$head_content=str_replace($search,$replace,$head->parse());
	$head_content = ($head_content);
	/* for head  end*/

    /* Outputting the data to the end user */
	$search = array('%HEAD%','%SITE_HEADER%','%BODY%','%FOOTER%','%MESSAGE_TYPE%');
	$replace = array($head_content,$objHome->getHeaderContent(),$pageContent,$objHome->getFooterContent());
	//$search = array('%HEAD%','%BODY%','%MESSAGE_TYPE%');
	//$replace = array($head_content,$pageContent,$msgType);
	$page_content=str_replace($search,$replace,$page->parse());
    echo ($page_content);
	exit;
