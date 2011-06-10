package com.harrynorthover.site.slideshow 
{
	import adobe.utils.CustomActions;
	import com.harrynorthover.utils.XMLServiceDelegate;
	import com.harrynorthover.interfaces.IResponder;
	
	import flash.events.Event;
	import flash.events.EventDispatcher;
	import flash.events.IOErrorEvent;
	import flash.net.URLLoader;
	import flash.net.URLRequest;
	
	/**
	 * ...
	 * @author Harry Northover
	 */
	
	public class DataModel extends EventDispatcher implements IResponder
	{
		/*
		 * This event is dispatched when the data has been loaded, parsed and is 
		   ready for use. */
		public static const DATA_LOADED			:String	=	"data.loaded";
		
		/*Data*/
		private var 	_xmlFileLocation		:String;
		private var		_xmlDelegate			:XMLServiceDelegate;
		private var 	_parser					:Parser;
		private var		_content				:Object;
		private var 	_numberOfItems			:Number;
		
		public function get numberOfItems():Number 
		{ 
			return _numberOfItems; 	
		}
		
		public function init():void
		{	
			_parser				=	new Parser();
			_xmlDelegate		= 	new XMLServiceDelegate(this);
			_xmlFileLocation	= 	"themes/default/slideshow/xml/pictures.xml";
			
			_xmlDelegate.load(_xmlFileLocation, _parser);
		}
		
		public function result(data:Array):void
		{
			_content = data[0];
			_numberOfItems = data[1];
			
			if (_content)
			{
				dispatchEvent( new Event( DataModel.DATA_LOADED ) );
			}
			else
			{
				trace("No data returned");
			}
		}
		
		public function get content():Object 
		{ 
			return _content; 
		}
		
	}

}