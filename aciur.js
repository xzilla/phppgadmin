var nkeycode = 0;
var curopt = 0;
var bnsr = false;
var aSuggests = [];
var otxb = null;
var xo = null;
var acv = false;
var fac_c = 1;
var c_fac_c = 1;
var asg = new Array();
var rasg = new Array();
var rasgc = new Array();
var iMoR = false;
var g_c_tb = "";
var g_c_fk = "";
var g_c_sid = "";
var g_c_db = "";
var g_c_v = "";
var g_i_ac = true;

document.body.onclick=function() {deAC();};

function aS(aSuggests) {
    if (aSuggests.length > 0) {
        tA(aSuggests[curopt]);
    }
}

function hKU(oEvent) {
	nkeycode = oEvent.keyCode;
	var iKeyCode = oEvent.keyCode;
	if(iKeyCode!=13) {
		if(iKeyCode==40 && (curopt+1)<=(rasg.length-1)) {
			curopt++;
			bnsr = true;
			tA(rasg[curopt]);
			htr(document.getElementById('option_tr_'+(curopt+1)));
		} else if(iKeyCode==38 && ((curopt-1)<=(rasg.length-1) && (curopt-1)>=0)) {
			curopt--;
			bnsr = true;
			tA(rasg[curopt]);
			htr(document.getElementById('option_tr_'+(curopt+1)));
		} else {
			if ( (iKeyCode!=8 && iKeyCode <= 32) || (iKeyCode >= 33 && iKeyCode <= 46) || (iKeyCode >= 112 && iKeyCode <= 123)) {
			} else {
				var sTextboxValue = otxb.value.toLowerCase();
				SG1(sTextboxValue);				
				bnsr = false;
			}
		}
	}
	else {
		if(acv) {
			hideAC();
		}
		return false;
	}
}

function initac(tb,fk,sid,db,v) {
    g_c_tb = tb;
    g_c_fk = fk;
    g_c_sid = sid;
    g_c_db = db;
}

function sR(p_start,p_len) {
if(!bnsr) {
    if (otxb.createTextRange) {
        var oRange = otxb.createTextRange(); 
        oRange.moveStart("character", p_start); 
        oRange.moveEnd("character", p_len - otxb.value.length);
        oRange.select();
    } else if (otxb.setSelectionRange) {
        otxb.setSelectionRange(p_start, p_len);
    }
} else {
	if (otxb.createTextRange) {
        var oRange = otxb.createTextRange();
        oRange.moveStart("character",p_len);
        oRange.moveEnd("character",p_len);
        oRange.select();
    	} 
		else if (otxb.setSelectionRange) {
       	 otxb.setSelectionRange(p_len,p_len);
		}
	}
    otxb.focus();
}

function tA(p_suggestion) {
	if(nkeycode!=8) {
		if ((otxb.createTextRange || otxb.setSelectionRange) && p_suggestion) {
			var p_len = otxb.value.length; 
			otxb.value = p_suggestion; 
			sR(p_len, p_suggestion.length);
		}
	}
}

function findPosX(obj) {
	if(obj) {
		var curleft = 0;
		if (obj.offsetParent) {
			while (obj.offsetParent)
			{
				curleft += obj.offsetLeft
				obj = obj.offsetParent;
			}
		}
		else if (obj.x)
			curleft += obj.x;
		return curleft;
	}
}

function findPosY(obj) {
	if(obj) {
		var curtop = 0;
		var n = 0;
		if (obj.y) {
			curtop += obj.y;
		}
		else if (obj.offsetParent) {
			while (obj.offsetParent) {
				curtop += obj.offsetTop;
				obj = obj.offsetParent;
			}
		}
		return curtop;
	}
}

function hideAC() {
		var d = document.getElementById('ac');
		d.innerHTML='';
		d.style.zIndex=0;
		d.style.border=0;
		d.style.visibility='hidden';
		acv = false;
}

function deAC() {
	if(acv) {
		hideAC();
	}
}

function makenormaltr(id) {
	var tr = document.getElementById(id);
	tr.style.backgroundColor='white';tr.style.color='black';
}

function fillinval(val) {
	var tx = document.getElementById('fac' + c_fac_c);
	tx.value=val;
	hideAC();
}

function showAC() {
	var d = document.getElementById('ac');
	d.innerHTML='';
	var tb = document.getElementById('fac'+c_fac_c+'_ph');
	d.style.top=findPosY(tb)+'px';
	d.style.visibility='visible';
	acv = true;
	d.style.left=findPosX(tb)+'px';
	d.style.border='1px solid black';
	d.style.position='absolute';
	d.style.width=(document.getElementById('aciwp' + c_fac_c).offsetWidth-3) + "px";
	d.style.zIndex=20;
	d.style.backgroundColor='white';
	d.style.margin='0px';
	d.style.padding='0px';
	d.style.textAlign='left';
	document.getElementById("ac_form").onsubmit=function(){return false;};
	return d;
}

function aftr() {
	for(i=0;i<rasg.length;i++) {
		ftr(document.getElementById('option_tr_'+(i+1)));
	}
}

function htr(obj) {
	aftr();
	obj.style.backgroundColor='#3d80df';
	obj.style.color='white';
}

function ftr(obj) {
	obj.style.backgroundColor='white';
	obj.style.color='black'; 
}

function buildSelectOptions() {
	if(rasg.length>0) {
	var t = document.createElement('table');
	var tb = document.createElement('tbody');
	var d = showAC();
	t.style.width='100%';
	t.style.margin='0px';
	t.style.padding='0px';
	t.cellPadding='0px';
	t.cellSpacing='0px';
	t.style.zIndex=6;
	t.style.visibility='visible';
	for(i=0;i<rasg.length;i++) {
		var tr = document.createElement('tr');
		var td = document.createElement('td');
		var tx = document.createTextNode(rasg[i]);
		if(i==0) {
			td.style.color='white';
			td.id='option_tr_1';
			td.style.backgroundColor='#3d80df';
		} else {
			td.id='option_tr_' + (i+1);
			td.style.color='black';
			td.style.backgroundColor='white';
		}
		td.onmouseover=function() { htr(this); this.style.cursor='pointer'; };
		td.onmouseout=function() { ftr(this); this.style.cursor='normal'; };
		td.onclick=function() { fillinval(this.firstChild.innerHTML); };
		td.style.paddingLeft='10px';
		td.style.fontSize='9pt';
		td.style.fontFamily='Arial';
		td.appendChild(tx);
		tr.appendChild(td);
		tb.appendChild(tr);
	}
	t.appendChild(tb);
	d.appendChild(t);
	} else {
		hideAC();
	}
}

function dF(v) {
	g_i_ac = document.getElementById(v).checked;
}

function makeAC(tx,n,tb,fk,sid,db) {
	otxb = document.getElementById(tx);
	c_fac_c = n;
	if(document.getElementById('no_ac').checked) {
		if(acv) {
			hideAC();
		}
		otxb = document.getElementById(tx);
		v = otxb.value;
		curopt = 0;
		bnsr = false;
		otxb.onkeyup = function (oEvent) {
			if (!oEvent) { oEvent = window.event; } hKU(oEvent); 
		};
		initac(tb,fk,sid,db,v);
	} else {
		otxb.onkeyup = function() {};
	}
}

function gfacc(s) {
	return s.substr(3);
}

function iA(parent, node, referenceNode) {
    parent.insertBefore(node, referenceNode.nextSibling);
}

var asg = new Array();
var rasg = new Array();
var rasgc = new Array();

function rS(tx) {
    rasg = [];
    rasgc = [];
    var sTextboxValue = otxb.value.toLowerCase(); 
    if (sTextboxValue.length > 0) {
        for (var i=0;i<asg.length;i++) { 
	var c = asg[i];
            if (c.indexOf(sTextboxValue) == 0) {
                rasg.push(asg[i]);
            }
        }
	buildSelectOptions();
    } else {
		hideAC();
	}
}

function SG1(s) {
	if(!iMoR && s.length>0) {
		pr("autocomplete.php","tb="+g_c_tb+"&database="+g_c_db+"&server="+g_c_sid+"&fk="+g_c_fk+"&v="+escapeHTML(s)+"");
	} else if(!s.length) {
		hideAC();
	}
}

function escapeHTML(s) {
	s = escape(s);
	s = s.replace(/\//g,"%2F");
	s = s.replace(/\?/g,"%3F");
	s = s.replace(/=/g,"%3D");
	s = s.replace(/&/g,"%26");
	s = s.replace(/@/g,"%40");
	return s;
}

function rEB(v) {
	var il = document.getElementsByTagName('input');
	for(i in il) {
		if(il[i].className=='ac_field' || il[i].className=='normal_field') {
			if(v==false) {
				il[i].className='normal_field';
				il[i].setAttribute("autocomplete",'on');
			} else {
				il[i].className='ac_field';
				il[i].setAttribute("autocomplete",'off');
			}
		}
	}
}

function pgsg(v) {
	prgsp(v);
}

function prgsp(v) {
	var d = v.split("PPA_EOF;|"); // pondered using RegExp here, but overhead to gain ratio is not convincing
	var l = d.length;
	asg = [];
	for(i=0;i<l;i++) {
		asg.push(d[i]);
	}
	rS(otxb);
    	aS(rasg);
}

function rS(tx) {
    rasg = [];
    rasgc = [];
    var sTextboxValue = otxb.value.toLowerCase(); 
    if (sTextboxValue.length > 0) {
        for (var i=0;i<asg.length;i++) { 
	var c = asg[i];
            if (c.indexOf(sTextboxValue) == 0) {
                rasg.push(asg[i]);
            }
        }
	buildSelectOptions();
    } else {
		hideAC();
	}
}

function pr(pg,sr) {
        mii();
        xo.open("POST",pg,true);
        xo.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xo.onreadystatechange=xoc;
        xo.send(sr);
}

function mii() {
        if(!xo) {
                /*@cc_on @*//*@if (@_jscript_version >= 5) try {
                xo = new ActiveXObject("Msxml2.XMLHTTP");
                }
                catch (e) {
                try {
                xo = new ActiveXObject("Microsoft.XMLHTTP");
                }
                catch (E) {
                xo = false;
                }
                }
                @end @*/if (!xo && typeof XMLHttpRequest!='undefined') {
                xo = new XMLHttpRequest();
                }
        }
}

function xoc(){
        iMoR = true;
        szr = "";
        if (xo.readyState==4) {
                if(xo.status==200) {
			pgsg(xo.responseText);
                        iMoR = false;
                }
                else {
                        alert("Oops, something unexpected happened, try again");
                        window.location.reload();
                }
        }
}

