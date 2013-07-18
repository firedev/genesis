<!--

function addLoadEvent(func)
{
  var oldonload = window.onload;

  if (typeof window.onload != 'function')
  {
    window.onload = func;
  }
  else
  {
    window.onload = function()
    				{
      					if (oldonload)
      					{
        					oldonload();
      					}
      					func();
    				}
  }
};

function unloadObject(objId)
{
	playing = 0;
    connecting = 0;
    var obj = document.getElementById(objId);
    /*
    try
   	{
   		alert( "unload item counts = " + obj.playlist.items ) ;
   		if( 1 == connecting )
   		{
   			obj.playlist.stop();
   		}
    	obj.playlist.clear();
    }
    catch(e){}
    try
   	{
	    obj.parentNode.removeChild(obj);
	}
	catch(a){}
	*/
    delete obj;
}

function closewindow()
{
	// Howard. 2010.3.4
	doStop() ;
	unloadObject(MPEG4AX) ;	// Howard. 2009.11.11 added to unload the ax4web properly
	
	/* mark off by Howard. 2010.3.4
	var majorVersion = 0;
	var nAgt = navigator.userAgent;
	unloadObject(MPEG4AX) ;	// Howard. 2009.11.11 added to unload the ax4web properly
	// In Internet Explorer, the true version is after "MSIE" in userAgent
	if ((verOffset=nAgt.indexOf("MSIE"))!=-1) 
	{
 		var fullVersion  = parseFloat(nAgt.substring(verOffset+5));
 		majorVersion = parseInt(''+fullVersion);
	}
	if(majorVersion >= 7)
	{
		doClose();
	}*/
}

function getQueryVariable(variable) {
  var query = window.location.search.substring(1);
  var vars = query.split("&");
  for (var i=0;i<vars.length;i++) {
    var pair = vars[i].split("=");
    if (pair[0] == variable) {
      return pair[1];
    }
  } 
  //alert('Query Variable ' + variable + ' not found');
}

function MM_openBrWindow(theURL,winName,features) {
  var win = window.open(theURL,winName,features);
  win.focus();
}

function MM_swapImgRestore() { 
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { 
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document); return x;
}

function MM_swapImage() { 
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

function ZoomIn()
{
	if(1 == playing)
	{
		var axp = document.getElementById(MPEG4AX);
		var width = axp.style.width ;
		var height = axp.style.height ;
		var i_width = parseInt(width);
		var i_height = parseInt(height);
		if( ZOOM_IN_MAX_WIDTH > i_width )
		{
			axp.style.width = i_width * 2 ;
			axp.style.height = i_height * 2 ;
		}
	}
};

function ZoomOut()
{
	if(1 == playing)
	{
		var axp = document.getElementById(MPEG4AX);
		var width = axp.style.width ;
		var height = axp.style.height ;
		var i_width = parseInt(width);
		var i_height = parseInt(height);
		if( ZOOM_OUT_MIN_WIDTH < i_width )
		{
			axp.style.width = i_width / 2 ;
			axp.style.height = i_height / 2 ;
		}
	}
};

function doHome()
{
	if(1 == playing)
	{
		var axp = document.getElementById(MPEG4AX);
		var speed = document.getElementById(SPEED_DROPDOWN).value;
		axp.playlist.control(speed,5);
	}
};

function doUp()
{
	if(1 == playing)
	{
		var axp = document.getElementById(MPEG4AX);
		var speed = document.getElementById(SPEED_DROPDOWN).value;
		axp.playlist.control(speed,6);
	}
};

function doDown()
{
	if(1 == playing)
	{
		var axp = document.getElementById(MPEG4AX);
		var speed = document.getElementById(SPEED_DROPDOWN).value;
		axp.playlist.control(speed,7);
	}
};

function doLeft()
{
	if(1 == playing)
	{
		var axp = document.getElementById(MPEG4AX);
		var speed = document.getElementById(SPEED_DROPDOWN).value;
		axp.playlist.control(speed,8);
	}
};

function doRight()
{
	if(1 == playing)
	{
		var axp = document.getElementById(MPEG4AX);
		var speed = document.getElementById(SPEED_DROPDOWN).value;
		axp.playlist.control(speed,9);
	}
};

function doPan()
{
	if(1 == playing)
	{
		var axp = document.getElementById(MPEG4AX);
		axp.playlist.patrol(0,5,0);
	}
};

function doTilt()
{
	if(1 == playing)
	{
		var axp = document.getElementById(MPEG4AX);
		axp.playlist.patrol(0,6,0);
	}
};

function doZoomIn()
{
	if(1 == playing)
	{
		var axp = document.getElementById(MPEG4AX);
		axp.playlist.Rs485Control(33,9,7,0);
	}
};

function doZoomOut()
{
	if(1 == playing)
	{
		var axp = document.getElementById(MPEG4AX);
		axp.playlist.Rs485Control(33,9,8,0);
	}
};

function doFocusPlus()
{
	if(1 == playing)
	{
		var axp = document.getElementById(MPEG4AX);
		axp.playlist.Rs485Control(33,10,9,0);
	}
};

function doFocusMinus()
{
	if(1 == playing)
	{
		var axp = document.getElementById(MPEG4AX);
		axp.playlist.Rs485Control(33,10,10,0);
	}
};

function doSpeedChange()
{
	if((1 == rs485_control) && (1 == playing) )
	{
		var axp = document.getElementById(MPEG4AX);
		var speed = document.getElementById(SPEED_DROPDOWN).value;
		axp.playlist.Rs485Control(33,8,6,speed);
	}
}

function onDisconnected( msg, forced_not_to_auto_reconnect )
{
	ShowMessage( msg ) ;
	document.getElementById(MPEG4AX).style.width = 0;
	document.getElementById(MPEG4AX).style.height = 0;
	connecting = 0;
	playing = 0;
	video_id = 0;
	video_passwd = 0;
	if( setsizeTimerId != 0 )
   	{
		clearTimeout(setsizeTimerId);
		setsizeTimerId = 0;
    }
	// Howard. 2010.3.5 for auto reconnect
    if( ( 0 == forced_not_to_auto_reconnect ) && ( 0 == do_not_auto_reconnect_for_this_session ) )
   	{
   		/* Howard. 2010.6.23 no auto reconnect checkbox for live.html
		if( true == document.getElementById("AUTORECONNECT").checked )
		{
			doGoInternal(null, null, 1) ;
		}
		else*/
		{
			do_not_auto_reconnect_for_this_session = 1 ;
		}
	}
};

var model_detected_ok = 0;
function doStop()
{
	if( (1 == playing) || (1 == connecting) )
	{
		try
		{
    		document.getElementById(MPEG4AX).playlist.stop();
    	}
    	catch(e){}
    	if( monitorTimerId != 0 )
    	{
			clearTimeout(monitorTimerId);
			monitorTimerId = 0;
    	}
    	if( setsizeTimerId != 0 )
    	{
			clearTimeout(setsizeTimerId);
			setsizeTimerId = 0;
    	}
    	var str = new String(DISCONNECTED);
    	var str1 = str.fontcolor(FONT_COLOR);
    	document.getElementById(CONNECTION_INFO).innerHTML = str1.fontsize(FONT_SIZE).bold();
    	document.getElementById(MPEG4AX).style.width = 0;
		document.getElementById(MPEG4AX).style.height = 0;
    	playing = 0;
    	connecting = 0;
    	set_size = 0;
    	video_id = 0;
		video_passwd = 0;
		model_detected_ok = 0;
		rs485_control = 0;
		document.getElementById(SPEED_DROPDOWN).disabled = true;
		document.getElementById(PAN_TILT).style.visibility="visible";
		document.getElementById(PAN_TILT_AND_NAVIGATOR).style.visibility="visible";
		document.getElementById(ZOOM_FOCUS).style.visibility="visible";
		document.getElementById(SPEED_TEXT).style.color=SPEED_TEXT_DISABLED_COLOR;
    	onStop();
    }
};

function onStop()
{
    if( monitorTimerId != 0 )
    {
		clearTimeout(monitorTimerId);
		monitorTimerId = 0;
    }
    if( setsizeTimerId != 0 )
    {
		clearTimeout(setsizeTimerId);
		setsizeTimerId = 0;
    }
    document.getElementById(MPEG4AX).style.width = 0;
	document.getElementById(MPEG4AX).style.height = 0;
    playing = 0;
    connecting = 0;
};

function sleep(timeout) {
	window.showModalDialog("javascript:document.writeln('<script>window.setTimeout(function () { window.close(); }, " + timeout + ");<\/script>');");
};

function updateVolume(deltaVol)
{
    var axp = document.getElementById(MPEG4AX);
    try
    {
    	axp.audio.volume += deltaVol;
    }
    catch(e)
    {
    	;
	}
};

function monitor()
{
    var axp = document.getElementById(MPEG4AX);
    var newState = axp.input.windowState;
	if(0 == isfile)
	{
		switch( newState )
		{
			case 0:
				break ;
			case 1:
				ShowMessage(LOCATING_CAMID);
				break ;
			case 2:
				ShowMessage(HANDSHAKING) ;
				break ;
			case 3:
				ShowMessage(HANDSHAKING2) ;
				break ;
			case 4:
				onPlaying() ;
				break ;
			case 5:
				onPlaying() ;
				break ;
			case 6:
				onDisconnected(DISCONNECTED, 0) ;
				break ;
			case 7:
				onDisconnected(FAILED, 0) ;
				break ;
		// error. refers to CONNECT_ERROR_E in P2Pc.h
			case 0xA1:
				onDisconnected(OFFLINE, 1) ;
				break ;
			case 0xA2:
				onDisconnected(CONNECT_FAILED, 0) ;
				break ;
			case 0xA3:
				onDisconnected(CONNECT_FAILED2, 0) ;
				break ;
			case 0xA4:
				onDisconnected(PASSWORD_INCORRECT, 1) ;
				break ;
			case 0xA5:
				onDisconnected(USER_FULL, 1) ;
				break ;
			case 0xA6:
				onDisconnected(REJECT, 1) ;
				break ;
			case 0xA7:
				onDisconnected(DISCONNECTED_BY_REMOTE, 0) ;
				break ;
			case 0xA8:
				onDisconnected(CAMID_EXPIRED, 0) ;
				break ;
			case 0xA9:
				onDisconnected(CAMID_NOT_EXISTS, 0) ;
				break ;
			case 0xAA:
				onDisconnected(CAMID_DEACTIVATED, 0) ;
				break ;
			case 0xAB:
				onDisconnected(ACCESS_DENIED, 0) ;
				break ;
			default:
				//alert("state = " + newState) ;
				//msg = new String("Unknown") ;
				break ;
		}
	    monitorTimerId = setTimeout("monitor()", 300);
    }
};

function setsize()
{
  var width = 0, height = 0; 
    var axp = document.getElementById(MPEG4AX);

    if( ( 0 == set_size ) && ( 0 == setsizeTimerId ) )
   	{
   		setsizeTimerId = setTimeout("setsize()", 500);
   	}
   	else if(set_size == 0)
    {
		try
    	{
	    	width = DISPLAY_AREA_WIDTH ;
	   		height = DISPLAY_AREA_HEIGHT ;
			axp.style.height = height ;
	   		axp.style.width = width ;
	   		set_size = 1 ;
   		}
   		catch(e)
   		{
   			setsizeTimerId = setTimeout("setsize()", 500);
   		}
	}
};

function AutoStart()
{
	//http://10.10.10.7/live-test.html?CamID=001001003&Passwd=1234
	var CamID_value = getQueryVariable(CAMID);
	var Passwd_value = getQueryVariable(PASSWD);
	if( ( null != CamID_value ) && ( null != Passwd_value ) )
	{
		if( ( CamID_value.length > 0 ) && ( Passwd_value.length > 0 ) )
		{
			doGo(CamID_value, Passwd_value) ;
		}
	}
}

function doGo( a, b )
{
	do_not_auto_reconnect_for_this_session = 0 ;
	doGoInternal( a, b, 0) ;
}

function doGoInternal( a, b, auto_reconnect )
{
	var axp = document.getElementById(MPEG4AX);
	var ipc_id = document.getElementById(CAMID).value;
	var ipc_passwd = document.getElementById(PASSWD).value;
	if( (ipc_id && ipc_passwd) && (ipc_id == video_id) && (ipc_passwd == video_passwd) )
	{
		return;
	}
	if( null != a )
	{
		if( ( a.length > 0 ) && ( b.length > 0 ) )
		{
			ipc_id = a ;
			ipc_passwd = b ;
		}
	}
	if(1 == playing )
	{
		doStop();
	}

	if(0 == connecting)
	{
		document.getElementById(CONNECTION_INFO).innerHTML = "";
		set_size = 0 ;

		if(ipc_id && ipc_passwd)
		{
			if( ipc_id.length < 9 )
			{
				alert(CAMID_MUST_BE_9_DIGITS);
				return;
			}
			if( isNaN(ipc_id) )
			{
				alert(CAMID_MUST_BE_NUMERIC_DIGITS);
				return;
			}
			
			var str = new String(WAITING);
			var str1 = str.fontcolor(FONT_COLOR);
			document.getElementById(CONNECTION_INFO).innerHTML = str1.fontsize(FONT_SIZE).bold();

			var ipc_data = ipc_id + "/" + ipc_passwd + "/" + activeXID.toString();

    		axp.style.height = 0 ;
   			axp.style.width = 0 ;

	    	if( 0 != monitorTimerId )	// Howard. 2010.6.23
	    	{
				clearTimeout( monitorTimerId ) ;
				monitorTimerId = 0 ;
	    	}
	    	monitor();
	    	
			connecting = 1;  

    		var options = new Array(":vout-filter=deinterlace", ":deinterlace-mode=linear" );

 			axp.playlist.add(ipc_data);

			video_id = ipc_id;
			video_passwd = ipc_passwd;
    	}
    	else
    	{
	    	alert(CAMID_PASSWORD_CANNOT_BE_EMPTY);
    	}
	}
	else if(1 == connecting)
	{
		document.getElementById(CAMID).value = video_id ;
		document.getElementById(PASSWD).value = video_passwd ;
	}
};

function ShowMessage( msg )
{
	if( msg && msg.length != 0 )
	{
		var str1 = msg.fontcolor(FONT_COLOR);	// set its color to white
		document.getElementById(CONNECTION_INFO).innerHTML = str1.fontsize(FONT_SIZE).bold();
	}
};

var video_id = 0 ;
var video_passwd = 0 ;
var rs485_control = 0;
function Original()
{
	if(1 == playing)
	{
		var axp = document.getElementById(MPEG4AX);
		axp.video.width = DISPLAY_AREA_WIDTH;
		axp.video.height = DISPLAY_AREA_HEIGHT ;
		axp.style.width = DISPLAY_AREA_WIDTH ;// axp.video.width;	
		axp.style.height = DISPLAY_AREA_HEIGHT ;//axp.video.height;
	}
};

var monitorTimerId = 0;
var setsizeTimerId = 0;
var playing = 0 ;
var connecting = 0 ;
var set_size = 0 ;
var mute = 0;
var first = 0;
var isfile = 0;
var myTimetoID = new Date();
var activeXID = myTimetoID.getMinutes() * 60000 + myTimetoID.getSeconds() * 1000 + myTimetoID.getMilliseconds() ;

function MuteToggle()
{
	if(mute == 0)
	{
		document.getElementById(SPEAKER).src = SPEAKER_OFF_IMG;
		document.getElementById(SPEAKER).alt = UNMUTE;
		mute = 1;
		return;
	}
	if(mute == 1)
	{
		document.getElementById(SPEAKER).src = SPEAKER_ON_IMG;
		document.getElementById(SPEAKER).alt = MUTE;
		mute = 0;
		return;
	}
};

var liveFeedText = new Array(ONLINE, ONLINE1, ONLINE2, ONLINE3);
var liveFeedRoll = 0;
function onPlaying()
{
	var axp = document.getElementById(MPEG4AX);
	var model = axp.video.model;
	if( ((model == 5) || (model == 6)) && (model_detected_ok == 0) )
	{
		model_detected_ok = 1;
		document.getElementById(SPEED_DROPDOWN).disabled=false;
		document.getElementById(SPEED_DROPDOWN).options.length = 0;
		for(var i = 1;i<=3;i++)
		{
			document.getElementById(SPEED_DROPDOWN).options.add(new Option(i,i));
		}
		document.getElementById(SPEED_TEXT).style.color=SPEED_TEXT_ENABLED_COLOR;
		document.getElementById(PAN_TILT).style.visibility="hidden";
		document.getElementById(PAN_TILT_AND_NAVIGATOR).style.visibility="hidden";
	}
	else if(((model == 7) || (model == 10) || (model == 11) || (model == 12) || (model == 15)) && (model_detected_ok == 0))
	{
		var rs485_enable = axp.video.rs485enable;
		if( 255 != rs485_enable )
		{
			model_detected_ok = 1;
			if(1 == rs485_enable)
			{
				rs485_control = 1;
				var moving_speed = axp.video.speed;
				document.getElementById(SPEED_DROPDOWN).disabled=false;
				document.getElementById(SPEED_DROPDOWN).options.length = 0;
				for(var i = 1;i<=10;i++)
				{
					document.getElementById(SPEED_DROPDOWN).options.add(new Option(i,i));
				}
				if( moving_speed > 0 )
				{
					moving_speed = moving_speed - 1 ;
				}
				document.getElementById(SPEED_DROPDOWN).selectedIndex=moving_speed;//speed;
				document.getElementById(SPEED_TEXT).style.color=SPEED_TEXT_ENABLED_COLOR;
				document.getElementById(PAN_TILT_AND_NAVIGATOR).style.visibility="hidden";
				document.getElementById(ZOOM_FOCUS).style.visibility="hidden";
			}
		}
	}
    liveFeedRoll = liveFeedRoll & 3;
    var str = new String(liveFeedText[liveFeedRoll++]);
    var str1 = str.fontcolor(FONT_COLOR);
    document.getElementById(CONNECTION_INFO).innerHTML = str1.fontsize(FONT_SIZE).bold();
    playing = 1;
	connecting = 0;
	first = 1;
    if( setsizeTimerId == 0 )
    {
		setsize();
    }
};

function onStateChange()
{
    if( document.readyState == 'complete' )
    {
       updateVolume(0);
    }
};

var browser = navigator.appName;
if(browser != "Microsoft Internet Explorer")
{
	alert(BROWSER_NOT_SUPPORTED);
};
document.onreadystatechange=onStateChange;

function EmbedActiveXControl()
{
	document.write("<OBJECT classid=\"clsid:D9D72A92-132E-46EC-A6F1-896B19227142\"");
	document.write(" codebase=\"" + CODEBASE + "#Version=" + VERSION + "\"");
	document.write(" width=\"0\" height=\"0\" id=\"" + MPEG4AX + "\" events=\"True\"></OBJECT>");
}
//-->
