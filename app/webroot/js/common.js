/*
 [WWW.KUAIPAN.CN] (C) 2011 KUAIPAN Inc.
 Author:huangqianyuan
 CretaeDate:2011-8-3
 Description:快盘网站JS公共函数
 */
String.prototype.trim = function() {
	return this.replace(/\s+$|^\s+/, '');
}
function isEmail(email) {
	return /^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/i.test(email)
}

//获取按键值
function CommGetKeyCode(e){
	var keyc;
	if (window.event) {
		keyc = e.keyCode;
	}
	else {
		if (e.which) {
			keyc = e.which;
		}
	}
	return keyc;
}

function CommFormatFileName(fileName,firstLen,lastLen)
{
	var firstLen = firstLen||14
	var lastLen = lastLen||6
	var fileNameLen = fileName.length;
	if(fileNameLen<(firstLen+lastLen))
	{
		return fileName;
	}else
	{
		return fileName.substr(0,firstLen)+'…'+fileName.substr(fileNameLen-lastLen);
	}
}


//WEBKP命名空间的实现方法
var WEBKP = window.WEBKP || {};
WEBKP.namespace = function(ns) {
	if (!ns || !ns.length) {
		return null;
	}
	var levels = ns.split(".");
	var nsobj = WEBKP;
	for (var i = (levels[0] == "WEBKP") ? 1 : 0; i < levels.length; ++i) {
		nsobj[levels[i]] = nsobj[levels[i]] || {};
		nsobj = nsobj[levels[i]];
	}
	return nsobj;
};

/*observer*/
function ArrayList()
{
	this.aList = []; //initialize with an empty array
}
		
ArrayList.prototype.Count = function()
{
	return this.aList.length;
}
		
ArrayList.prototype.Add = function( object )
{
	return this.aList.push( object ); //Object are placed at the end of the array
}
ArrayList.prototype.GetAt = function( index ) //Index must be a number
{
	if( index > -1 && index < this.aList.length )
		return this.aList[index];
	else
		return undefined; //Out of bound array, return undefined
}
		
ArrayList.prototype.Clear = function()
{
	this.aList = [];
}

ArrayList.prototype.RemoveAt = function ( index ) // index must be a number
{
	var m_count = this.aList.length;	
	if(m_count > 0 && index > -1 && index < this.aList.length ) 
	{
		switch( index )
		{
			case 0:
				this.aList.shift();
				break;
			case m_count - 1:
				this.aList.pop();
				break;
			default:
				var head   = this.aList.slice( 0, index );
				var tail   = this.aList.slice( index + 1 );
				this.aList = head.concat( tail );
				break;
		}
	}
}

ArrayList.prototype.Insert = function ( object, index )
{
	var m_count       = this.aList.length;
	var m_returnValue = -1;	
	if ( index > -1 && index <= m_count ) 
	{
		switch(index)
		{
			case 0:
				this.aList.unshift(object);
				m_returnValue = 0;
				break;
			case m_count:
				this.aList.push(object);
				m_returnValue = m_count;
				break;
			default:
				var head      = this.aList.slice(0, index - 1);
				var tail      = this.aList.slice(index);
				this.aList    = this.aList.concat(tail.unshift(object));
				m_returnValue = index;
				break;
		}
	}
	return m_returnValue;
}

ArrayList.prototype.IndexOf = function( object, startIndex )
{
	var m_count       = this.aList.length;
	var m_returnValue = - 1;
	if ( startIndex > -1 && startIndex < m_count ) 
	{
		var i = startIndex;
					
		while( i < m_count )
		{
			if ( this.aList[i] == object )
			{
				m_returnValue = i;
				break;
			}
						
			i++;
		}
	}
	return m_returnValue;
}
		
ArrayList.prototype.LastIndexOf = function( object, startIndex )
{
	var m_count       = this.aList.length;
	var m_returnValue = - 1;
	if ( startIndex > -1 && startIndex < m_count ) 
	{
		var i = m_count - 1;
					
		while( i >= startIndex )
		{
			if ( this.aList[i] == object )
			{
				m_returnValue = i;
				break;
			}
						
			i--;
		}
	}	
	return m_returnValue;
}

function Observer()
{
	this.Update = function()
	{
		return;
	}
}

function Subject()
{
	this.observers = new ArrayList();
}

Subject.prototype.Notify = function( context )
{
	var m_count = this.observers.Count();
	for( var i = 0; i < m_count; i++ )
		this.observers.GetAt(i).Update( context );
}

Subject.prototype.AddObserver = function( observer )
{
	if( !observer.Update )
		throw 'Wrong parameter';
	
	this.observers.Add( observer );
}

Subject.prototype.RemoveObserver = function( observer )
{
	if( !observer.Update )
		throw 'Wrong parameter';
	this.observers.RemoveAt(this.observers.IndexOf( observer, 0 ));
}


/*interface*/
function Interface(name, methods) 
{
    if(arguments.length != 2) {
        throw new Error("接口构造函数含" + arguments.length + "个参数, 但需要2个参数.");
    }
    
    this.name = name;
    this.methods = [];
    
    if(methods.length < 1) {
        throw new Error("第二个参数为空数组.");
    }
    
    for(var i = 0, len = methods.length; i < len; i++) {
        
        if(typeof methods[i][0] !== 'string') {
            throw new Error("接口构造函数第一个参数必须为字符串类型.");
        }
        if(methods[i][1] && typeof methods[i][1] !== 'number') {
            throw new Error("接口构造函数第二个参数必须为整数类型.");
        }
        if(methods[i].length == 1) {
            methods[i][1] = 0;
        }
        this.methods.push(methods[i]);
    }    
};

Interface.registerImplements = function(object) {
    if(arguments.length < 2) {
        throw new Error("接口的实现必须包含至少2个参数.");
    }
    for(var i = 1, len = arguments.length; i < len; i++) {
        var interface = arguments[i];
        if(interface.constructor !== Interface) {
            throw new Error("从第2个以上的参数必须为接口实例.");
        }
        
        for(var j = 0, methodsLen = interface.methods.length; j < methodsLen; j++) {
            var method = interface.methods[j][0];

            if(!object[method] || typeof object[method] !== 'function' || object[method].getParameters().length != interface.methods[j][1]) {
                throw new Error("接口的实现对象不能执行" + interface.name + "的接口方法" + method + "，因为它找不到或者不匹配.");
            }
        }
    }
};

Function.prototype.getParameters = function() {
    var str = this.toString();
    var paramString = str.slice(str.indexOf('(') + 1, str.indexOf(')')).replace(/\s*/g,'');     //取得参数字符串
    try
    {
        return (paramString.length == 0 ? [] : paramString.split(','));
    }
    catch(err)
    {
        throw new Error("函数不合法!");
    }
}

function inherits(base, extension){
    for (var property in base) {
        try {
            extension[property] = base[property];
        } 
        catch (warning) {
        }
    }
}
WEBKP.namespace('floatToolbar');
WEBKP.floatToolbar = function(){
	this.toolbarid = '';
	this.rightsideid = '';
	this.datawrapid = '';
	this.kuaipantoolbar = '';
	this.rightSideNode = '';
	this.headerAndNavHeight = 150;
	this.toolbarOffset = {};
	this.rightSideOffset = {};
}
WEBKP.floatToolbar.prototype ={
	init:function(datawrap,toolbar,rightNode)
	{
		var _this = this;
		_this.toolbarid = toolbar;
		_this.rightsideid = rightNode;
		_this.datawrapid = datawrap;
		_this.kuaipantoolbar = document.getElementById(toolbar);
		_this.rightSideNode = document.getElementById(rightNode);
		_this.resize(_this.datawrapid,rightNode);
		_this.onScroll();
		$(window).scroll( function(){
			_this.onScroll();
		});
		$(window).resize( function(){
			_this.resize(_this.datawrapid);
			_this.onScroll();
		});
	},
	resize:function(toolbar)
	{
		var _this = this;
		_this.toolbarOffset =$("#"+toolbar).offset();
		var windowW = $(window).width();
		//_this.rightSideOffset = (windowW -960)/2 + 719;
		_this.rightSideOffset  = _this.toolbarOffset.left + (960 - 242);
		//this.rightSideOffset = $("#"+_this.rightsideid).offset();
	},
	getScrollTop:function(){
		if(typeof pageYOffset!= 'undefined') {
			//most browsers
			return pageYOffset;
		}
		else {
			var b = document.body; //IE 'quirks'
			var d = document.documentElement; //IE with doctype
			d = (d.clientHeight) ? d : b;
			return d.scrollTop;
		}
	},
	onScroll:function(){
		var _this = this;
		var menu = _this.kuaipantoolbar;
		var r = _this.rightSideNode;
		var headerAndNavHeight = _this.headerAndNavHeight;
		var sh = _this.getScrollTop();
		if (sh < headerAndNavHeight) {
			if ($.browser.msie && ($.browser.version == "6.0") && !$.support.style){	
				$('#kuaipantoolbar').css({
					'position': 'static'
				});
				r.style.position = 'absolute';
				r.style.top = '0px';
			}else{
				menu.style.position = '';
				r.style.position = 'absolute';
				r.style.left = 'auto';
				r.style.right = '6px';
				r.style.top = '0px';
			}
		}
		else {
			if ($.browser.msie && ($.browser.version == "6.0") && !$.support.style){	
				menu.style.position ='absolute';
				menu.style.top = sh+'px';
				menu.style.left = _this.toolbarOffset.left+'px';
				menu.style.zIndex = 90;
				
				r.style.position = 'absolute';
				r.style.top = (sh-60)+'px';
				r.style.zIndex = 90;
			}else{
				menu.style.position = 'fixed';
				menu.style.top = '-8px';
				menu.style.left = _this.toolbarOffset.left+'px';
				menu.style.zIndex = 90;
				 
				r.style.position = 'fixed';
				r.style.top = '80px';
				r.style.left = _this.rightSideOffset +'px';
				r.style.zIndex = 90;
			}
		}
	}
}
/* read Cookies*/
var Cookies = {};
Cookies.get = function(name){
	var arg = name + "=";
	var alen = arg.length;
	var clen = document.cookie.length;
	var i = 0;
	var j = 0;
	while(i < clen){
		j = i + alen;
		if (document.cookie.substring(i, j) == arg)
		return Cookies.getCookieVal(j);
		i = document.cookie.indexOf(" ", i) + 1;
		if(i == 0)
		break;
	}
	return null;
};
/* clear Cookies*/
Cookies.set = function(name, value){
	var argv = arguments;
	var argc = arguments.length;
	var expires = (argc > 2) ? argv[2] : null;
	var path = (argc > 3) ? argv[3] : '/';
	var domain = (argc > 4) ? argv[4] : null;
	var secure = (argc > 5) ? argv[5] : false;
	document.cookie = name + "=" + escape (value) +
	((expires == null) ? "" : ("; expires=" + expires.toGMTString())) +
	((path == null) ? "" : ("; path=" + path)) +
	((domain == null) ? "" : ("; domain=" + domain)) +
	((secure == true) ? "; secure" : "");
};
Cookies.clear = function(name) {
	if(Cookies.get(name)){
		var expdate = new Date();
		expdate.setTime(expdate.getTime() - (86400 * 1000 * 1));
		Cookies.set(name, "", expdate);
	}
};

Cookies.getCookieVal = function(offset){
	var endstr = document.cookie.indexOf(";", offset);
	if(endstr == -1){
		endstr = document.cookie.length;
	}
	return unescape(document.cookie.substring(offset, endstr));
};



WEBKP.namespace('CommAjaxData');
WEBKP.CommAjaxData = function()
{
	this.pointspacewrap = $("#userinfowrap");
	
}
WEBKP.CommAjaxData.prototype = {
	init:function(){
		var _this = this;
		_this.getPointAndSpace();
	},
	getPointAndSpace:function()
	{
		var _this = this;
		$.ajax({
			url:'index.php?ac=common',
			dataType:'html',
			type:'get',
			success:function(res){
				$("#userinfowrap").html(res);
			}
		})
	}
}
$(function(){
	if(typeof getCommUser == 'undefined'){
		var commObj = new WEBKP.CommAjaxData();
		commObj.getPointAndSpace();
	}
});

