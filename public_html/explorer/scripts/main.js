//explorerMenu global function script file
//Written by RedHog (Egil Möller) 
//Copyright (C) 1997 by Söderköpings Tekniska Datorsupport ek. för 
 
//This script may freely be distributed, used, modyfied and copyed, as long as this copyright 
//text remains unchanged at the top of the script. 

curDir = new String(window.top.location);
if (curDir.substring(curDir.length - 10, curDir.length) == "index.html")
 curDir = curDir.substring(0, curDir.length - 10);
if (curDir.substring(curDir.length, curDir.length - 1) != "/")
 curDir = curDir + "/";

function array(n)
 {
  this.length = n;
  if (n > 0) for (var i = 1; i <= n; i++)
   { 
    this[i] = 0;
   };
  return this;
 };
