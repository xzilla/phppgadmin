//explorerMenu ver. 1.09 script file
//Written by RedHog (Egil Möller)
//Copyright (C) 1997 by Söderköpings Tekniska Datorsupport ek. för

//This script may freely be distributed, used, modyfied and copyed, as long as this copyright
//text remains unchanged at the top of the script.

function createEmptyMenu(title, href, target, code)
 {
  this.showSubMenus = -1;
  this.type = "menuItem";
  this.title = title;
  if (href != "")
   this.href = href;
  else
   this.href = "javaScript:'';";
  this.target = target;
  this.code = code;
  this.mnu = new array(0);
  return this;
 };

function createEmptyMenuFolder(title)
 {
  this.showSubMenus = -1;
  this.type = "menuFolder";
  this.title = title;
  this.mnu = new array(0);
  return this;
 };

function createEmptyFolder(title, target)
 {
  this.showSubMenus = -1;
  this.type = "folder";
  this.title = title;
  this.target = target;
  this.item = new array(0);
  this.mnu = new array(0);
  return this;
 };

function createFolderItem(href, name, description, language, target)
 {
  this.href = href;
  this.name = name;
  this.description = description;
  this.language = language;
  this.target = target;
  return this;
 };

function addSubMenu(mnu, title, href, target, code)
 {
  mnu.mnu.length++;
  mnu.mnu[mnu.mnu.length] = new createEmptyMenu(title, href, target, code);
  return mnu.mnu.length;
 };

function addSubMenuFolder(mnu, title)
 {
  mnu.mnu.length++;
  mnu.mnu[mnu.mnu.length] = new createEmptyMenuFolder(title);
  return mnu.mnu.length;
 };

function addSubFolder(mnu, title, target)
 {
  mnu.mnu.length++;
  mnu.mnu[mnu.mnu.length] = new createEmptyFolder(title, target);
  return mnu.mnu.length;
 };

function addFolderItem(mnu, href, name, description, language, target)
 {
  mnu.item.length++;
  mnu.item[mnu.item.length] = new createFolderItem(href, name, description, language, target);
 };

function unionize(mnu, subMenu)
 {
  mnu.mnu.length++;
  mnu.mnu[mnu.mnu.length] = subMenu;
  return mnu.mnu.length;
 };

function getMenu(mnu, root_varName)
 {
  return "<Html>\n"
       + " <Base href='" + curDir + "'>\n"
       + " <Style type='text/javascript' src='" + proprieties_menuCSS + "'></Style>\n"
       + " <Body " + proprieties_menuBody + ">\n"
       + "  <A href='" + proprieties_aboutEM + "' target='main'><Img align=right border=0 src='" + proprieties_pictureSet + "explorerMenu.gif' alt='Go to explorerMenu homepage.'></Img></A>"
       + "  <A href='" + proprieties_aboutgetIt + "' target='main'><Img align=right border=0 src='" + proprieties_pictureSet + "getIt!.gif' alt='Go to explorerMenu homepage.'></Img></A>"
       + "  <Font " + proprieties_menuItemFont + ">\n"
       + "   <nobr>\n"
       + getSubMenu("", mnu, root_varName, root_varName, -1)
       + "   </nobr>\n"
       + "  </Font>\n"
       + " </Body>\n"
       + "</Html>\n";
 };

function getSubFolder(mnu, varName)
 {
  var html = String();
  html =    "<Html>\n"
          + " <Base href='" + curDir + "'>\n"
          + " <Body " + proprieties_linksBody + ">\n"
          + "  <Font " + proprieties_linksFont + ">\n";
  if (mnu.item.length > 0)
   {
    html += "   <Table border=0 cellspacing=0 cellpadding=0 width=100%>\n"
          + "    <Tr>\n"
          + "     <Td valign=top " + proprieties_leadTextBackground + ">\n"
          + "      <Font " + proprieties_leadTextFont + ">\n"
          + "       <B>\n"
          + "        <Font " + proprieties_leadTextFontFirst + ">" + proprieties_folder_name_firsChar + "</Font>" + proprieties_folder_name_rest + "\n"
          + "       </B>\n"
          + "      </Font>\n"
          + "     </Td>\n"
          + "     <Td valign=top " + proprieties_leadTextBackground + ">\n" 
          + "      <Font " + proprieties_leadTextFont + ">\n" 
          + "       <B>\n"
          + "        <Font " + proprieties_leadTextFontFirst + ">" + proprieties_folder_description_firsChar + "</Font>" + proprieties_folder_description_rest + "\n"
          + "       </B>\n"
          + "      </Font>\n"
          + "     </Td>\n"
          + "     <Td valign=top " + proprieties_leadTextBackground + ">\n" 
          + "      <Font " + proprieties_leadTextFont + ">\n" 
          + "       <B>\n"
          + "        <Font " + proprieties_leadTextFontFirst + " >" + proprieties_folder_language_firsChar + "</Font>" + proprieties_folder_language_rest + "\n"
          + "       </B>\n"
          + "      </Font>\n"
          + "     </Td>\n"
          + "    </Tr>\n";
    for (var i = 1;i <= mnu.item.length;i++)
     {
      html += "    <Tr>\n"
            + "     <Td valign=top>\n"
            + "      <Font " + proprieties_linksFont + ">\n"
            + "       <A Href=\"" + mnu.item[i].href + "\" target=\"" + mnu.item[i].target + "\" >" + mnu.item[i].name + "</A>\n"
            + "      </Font>\n"
            + "     </Td>\n"
            + "     <Td valign=top>\n" 
            + "      <Font " + proprieties_linksFont + ">\n"
            + "       " + mnu.item[i].description + "\n"
            + "      </Font>\n"
            + "     </Td>\n"
            + "     <Td valign=top>\n" 
            + "      <Font " + proprieties_linksFont + ">\n"
            + "       " + mnu.item[i].language + "\n"
            + "      </Font>\n"
            + "     </Td>\n"
            + "    </Tr>\n";
     };
    html += "   </Table>\n";
   }
  else
   html += "Sorry, there are no items in this folder.";

  html += "  </Font>\n"
        + " </Body>\n"
        + "</Html>\n";

  return html;
 };

function getSubMenu(indent, mnu, varName, root_varName, type)
 {
  var html = String();
  if (mnu.mnu.length > 0)
   {
    if (mnu.showSubMenus == 1)
     {
      if (type > 0)
       html = indent + "<A Href=\"javascript:top." + varName + ".showSubMenus *= -1; top.getMenu(top." + root_varName + ", 'top." + root_varName + "');\" onDblClick=\"top.expandMenu(top." + varName + ");document.href='javascript:top.getMenu(top." + root_varName + ", \\'top." + root_varName + "\\');';\"><Img src='" + proprieties_pictureSet + "middle.expanded.gif' border=0 align=top></Img><Img src='" + proprieties_pictureSet + "map.open.gif' border=0 align=top></Img></A>"
      else if (type < 0)
       html = indent + "<A Href=\"javascript:top." + varName + ".showSubMenus *= -1; top.getMenu(top." + root_varName + ", 'top." + root_varName + "');\" onDblClick=\"top.expandMenu(top." + varName + ");document.href='javascript:top.getMenu(top." + root_varName + ", \\'top." + root_varName + "\\');';\"><Img src='" + proprieties_pictureSet + "map.open.gif' border=0 align=top></Img></A>";
      else
       html = indent + "<A Href=\"javascript:top." + varName + ".showSubMenus *= -1; top.getMenu(top." + root_varName + ", 'top." + root_varName + "');\" onDblClick=\"top.expandMenu(top." + varName + ");document.href='javascript:top.getMenu(top." + root_varName + ", \\'top." + root_varName + "\\');';\"><Img src='" + proprieties_pictureSet + "end.expanded.gif' border=0 align=top></Img><Img src='" + proprieties_pictureSet + "map.open.gif' border=0 align=top></Img></A>";

      if (mnu.type == "menuItem")
       html += "<A Href=\"" + mnu.href + "\" target=\"" + mnu.target + "\" onClick=\"" + mnu.code + "\">" + mnu.title + "</A><Br>\n";
      else if (mnu.type == "menuFolder")
       html += "<A Href=\"javascript:top." + varName + ".showSubMenus *= -1; top.getMenu(top." + root_varName + ", 'top." + root_varName + "');\" onDblClick=\"top.expandMenu(top." + varName + ");document.href='javascript:top.getMenu(top." + root_varName + ", \\'top." + root_varName + "\\');';\">" + mnu.title + "</A><Br>\n";
      else if (mnu.type == "folder")
       html += "<A Href=\"javaScript:top.getSubFolder(top." + varName + ", 'top." + varName + "', '');\" target=\"" + mnu.target + "\">" + mnu.title + "</A><Br>\n";
      else
       alert('Unsupported menuitem type: ' + mnu.type + '\n Possible reason: Modules of different versions mixed. Please upgrade.');

      for (var i = 1;i <= mnu.mnu.length;i++)
       {
        if (type > 0)
         html += getSubMenu(indent + "<Img src='" + proprieties_pictureSet + "vertical.gif' border=0 align=top></Img>", mnu.mnu[i], varName + ".mnu[" + i + "]", root_varName, (mnu.mnu.length-i))
        else if (type < 0)
         html += getSubMenu(indent, mnu.mnu[i], varName + ".mnu[" + i + "]", root_varName, (mnu.mnu.length-i))
        else
         html += getSubMenu(indent + "<Img src='" + proprieties_pictureSet + "empty.gif' border=0 align=top></Img>", mnu.mnu[i], varName + ".mnu[" + i + "]", root_varName, (mnu.mnu.length-i));
       };
     }
    else
     { 
      if (type > 0) 
       html = indent + "<A Href=\"javascript:top." + varName + ".showSubMenus *= -1; top.getMenu(top." + root_varName + ", 'top." + root_varName + "');\" onDblClick=\"top.expandMenu(top." + varName + ");document.href='javascript:top.getMenu(top." + root_varName + ", \\'top." + root_varName + "\\');';\"><Img src='" + proprieties_pictureSet + "middle.expandable.gif' border=0 align=top></Img><Img src='" + proprieties_pictureSet + "map.gif' border=0 align=top></A>" 
      else if (type < 0) 
       html = indent + "<A Href=\"javascript:top." + varName + ".showSubMenus *= -1; top.getMenu(top." + root_varName + ", 'top." + root_varName + "');\" onDblClick=\"top.expandMenu(top." + varName + ");document.href='javascript:top.getMenu(top." + root_varName + ", \\'top." + root_varName + "\\');';\"><Img src='" + proprieties_pictureSet + "map.gif' border=0 align=top></A>" 
      else 
       html = indent + "<A Href=\"javascript:top." + varName + ".showSubMenus *= -1; top.getMenu(top." + root_varName + ", 'top." + root_varName + "');\" onDblClick=\"top.expandMenu(top." + varName + ");document.href='javascript:top.getMenu(top." + root_varName + ", \\'top." + root_varName + "\\');';\"><Img src='" + proprieties_pictureSet + "end.expandable.gif' border=0 align=top></Img><Img src='" + proprieties_pictureSet + "map.gif' border=0 align=top></A>"; 
 
      if (mnu.type == "menuItem") 
       html += "<A Href=\"" + mnu.href + "\" target=\"" + mnu.target + "\" onClick=\"" + mnu.code + "\">" + mnu.title + "</A><Br>\n"; 
      else if (mnu.type == "menuFolder") 
       html += "<A Href=\"javascript:top." + varName + ".showSubMenus *= -1; top.getMenu(top." + root_varName + ", 'top." + root_varName + "');\" onDblClick=\"top.expandMenu(top." + varName + ");document.href='javascript:top.getMenu(top." + root_varName + ", \\'top." + root_varName + "\\');';\">" + mnu.title + "</A><Br>\n"; 
      else if (mnu.type == "folder") 
       html += "<A Href=\"javaScript:top.getSubFolder(top." + varName + ", 'top." + varName + "', '');\" target=\"" + mnu.target + "\">" + mnu.title + "</A><Br>\n"; 
      else 
       alert('Unsupported menuitem type: ' + mnu.type + '\n Possible reason: Modules of different versions mixed. Please upgrade.'); 
     }; 
   }
  else
   {
    if (mnu.type == "menuItem") 
     html += indent +  "<A Href=\"" + mnu.href + "\" target=\"" + mnu.target + "\" onClick=\"" + mnu.code + "\">"; 
    else if (mnu.type == "menuFolder") 
     html += indent + "<A Href=\"javascript:top." + varName + ".showSubMenus *= -1; top.getMenu(top." + root_varName + ", 'top." + root_varName + "');\">"; 
    else if (mnu.type == "folder") 
     html += indent + "<A Href=\"javaScript:top.getSubFolder(top." + varName + ", 'top." + varName + "', '');\" target=\"" + mnu.target + "\">"; 
    else 
     alert('Unsupported menuitem type: ' + mnu.type + '\n Possible reason: Modules of different versions mixed. Please upgrade.'); 

    if (type != 0)
     html += "<Img src='" + proprieties_pictureSet + "middle.gif' border=0 align=top></Img><Img src='" + proprieties_pictureSet + "doc.gif' border=0 align=top></Img>" + mnu.title + "</A><Br>\n"
    else if (type < 0)
     html += "<Img src='" + proprieties_pictureSet + "doc.gif' border=0 align=top></Img>" + mnu.title + "</A><Br>\n"
    else
     html += "<Img src='" + proprieties_pictureSet + "end.gif' border=0 align=top></Img><Img src='" + proprieties_pictureSet + "doc.gif' border=0 align=top></Img>" + mnu.title + "</A><Br>\n";
   };
  return html;
 };

function getMenuListing(mnu, root_varName, targets)
 {
  return "<Html>\n"
       + " <Base href='" + curDir + "'>\n"
       + " <Body " + proprieties_menuBody + ">\n"
       + mnu.html
       + "  <Font size=-1 face='Arial'>\n"
       + "   <nobr>\n"
       + getSubMenuListing("", mnu, root_varName, root_varName, targets)
       + "   </nobr>\n"
       + "  </Font>\n"
       + " </Body>\n"
       + "</Html\n";
 };

function getSubMenuListing(indent, mnu, varName, root_varName, targets)
 {
  var html = String();
  html = indent;

  if (targets == 1)
   {
    if (mnu.type == "menuItem")
     html += "<A Href=\"" + mnu.href + "\" target=\"" + mnu.target + "\" onClick=\"" + mnu.code + "\">" + mnu.title + "</A><Br>\n";
    else if (mnu.type == "menuFolder")
     html += mnu.title + "<Br>\n";
    else if (mnu.type == "folder")
     html += "&nbsp; <A Href=\"javaScript:top.getSubFolder(top." + varName + ", 'top." + varName + "', '');\" target=\"" + mnu.target + "\">" + mnu.title + "</A><Br>\n";
    else
     alert('Unsupported menuitem type: ' + mnu.type + '\n Possible reason: Modules of different versions mixed. Please upgrade.');
   }
  else
   {
    if (mnu.type == "menuItem")
     html += "<A Href=\"" + mnu.href + "\" onClick=\"" + mnu.code + "\">" + mnu.title + "</A><Br>\n";
    else if (mnu.type == "menuFolder")
     html += mnu.title + "<Br>\n";
    else if (mnu.type == "folder")
     html += "&nbsp; <A Href=\"javaScript:top.getSubFolder(top." + varName + ", 'top." + varName + "', '');\">" + mnu.title + "</A><Br>\n";
    else
     alert('Unsupported menuitem type: ' + mnu.type + '\n Possible reason: Modules of different versions mixed. Please upgrade.');
   };

  if (mnu.mnu.length > 0)
   {
    for (var i = 1;i <= mnu.mnu.length;i++)
     {
      html += getSubMenuListing(indent + "&nbsp; ", mnu.mnu[i], varName + ".mnu[" + i + "]", root_varName, targets)
     };
   };
  return html;
 };

function expandMenu(mnu)
 {
  mnu.showSubMenus = 1
  if (mnu.mnu.length > 0)
   {
    for (var i = 1;i <= mnu.mnu.length;i++)
     {
      expandMenu(mnu.mnu[i]);
     };
   };
 };
