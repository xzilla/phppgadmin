//explorerMenu menu contents definition file
//Written by RedHog (Egil Möller) 
//Copyright (C) 1997 by Söderköpings Tekniska Datorsupport ek. för 
 
//This script may freely be distributed, used, modyfied and copyed, as long as this copyright 
//text remains unchanged at the top of the script. 

//This creates a new menu with the name 'menu' with a root item named 'Home' pointing at the URL 'main.html'
//The 3rd parameter is the frame to open main.html in, and the 4th is an optional javascript to run when
//opening it (Here unused).
var menu = new createEmptyMenu("Home", "main.html", "main", "");
menu.html = "";

//Each line defines either a menu item pointing at a document, or a menu item only being a sub menu (A normal item may be a sub
//menu too). The definition takes two or five parameters, depending on the type. Definitions for items which does not point at
//a document takes two parameters; the parent menu item and a name. Parent item is defined as the name of the menu and a list
//of the text '.mnu[something]'. Each sub sequent such text identifies a sub menu to the menu identified without that sub sequent
//text. For example menu.mnu[3] identifies the 3rd menu item in the root menu; menu.mnu[3].mnu[5] identifies the 5th menu item in
//the 3rd sub menu to the root menu, and so on... The number identifying the index of an item in a menu (The number inside
//brackets), may be placed in a variable (Using the allotation operator, the equal sign (=)). Here is an example with the same
//result as the previous one: i1 = 3; i2 = 5; menu.mnu[i1].mnu[i2].
//Whenever you define a menu item, the index of the newly created item is returned, thus, you can do:

//This line adds a new sub menu named 'Test directory'
i1 = addSubMenuFolder(menu, "Test directory");
 //This is in a sub menu
 i2 = addSubMenuFolder(menu.mnu[i1], "Some links");
  i3 = addSubMenuFolder(menu.mnu[i1].mnu[i2], "Internet Service Providers in sweden");
   i4 = addSubMenu(menu.mnu[i1].mnu[i2].mnu[i3], "Algonet (My provider until summer -98)", "http://www.algonet.se", "main", "");
   i4 = addSubMenu(menu.mnu[i1].mnu[i2].mnu[i3], "Telia (I hate them!)", "http://www.telia.com", "main", "");
   i4 = addSubMenu(menu.mnu[i1].mnu[i2].mnu[i3], "Tele2", "http://www.tele2.se", "main", "");
  i3 = addSubMenuFolder(menu.mnu[i1].mnu[i2], "Search engines");
   i4 = addSubMenu(menu.mnu[i1].mnu[i2].mnu[i3], "AltaVista", "http://www.altavista.digital.com", "main", "");
   i4 = addSubMenu(menu.mnu[i1].mnu[i2].mnu[i3], "WebCrawler", "http://www.webcrawler.com", "main", "");
  i3 = addSubMenuFolder(menu.mnu[i1].mnu[i2], "Universities");
   i4 = addSubMenuFolder(menu.mnu[i1].mnu[i2].mnu[i3], "Swedish universities");
    i5 = addSubMenu(menu.mnu[i1].mnu[i2].mnu[i3].mnu[i4], "Linköping University", "http://www.liu.se", "main", "");
    i5 = addSubMenu(menu.mnu[i1].mnu[i2].mnu[i3].mnu[i4], "Stockholm University", "http://www.su.se", "main", "");
    i5 = addSubMenu(menu.mnu[i1].mnu[i2].mnu[i3].mnu[i4], "Stockholm Technical High School", "http://www.kth.se", "main", "");
   i4 = addSubMenuFolder(menu.mnu[i1].mnu[i2].mnu[i3], "I don't know about any other universities");
  i3 = addSubMenu(menu.mnu[i1].mnu[i2], "The RedHog's den", "http://www.algonet.se/~redhog", "main", "");
i1 = addSubMenu(menu, "About", "About.html", "main", "");

//This ensures that the top most menu is expanded after loading the site (It can be collapsed by klicking on it).
//The best way to understund what this is about is to comment the line out and see the result...
menu.showSubMenus *= -1;

