package com.harrynorthover.utils 
{
	import com.harrynorthover.interfaces.IParser;
	import com.harrynorthover.interfaces.IResponder;
	import com.harrynorthover.site.slideshow.DataModel;
	
	import flash.events.Event;
	import flash.events.IOErrorEvent;
	import flash.net.URLLoader;
	import flash.net.URLRequest;
	
	/**
	 * ...
	 * @author Harry Northover
	 */
	
	public class XMLServiceDelegate
	{
		private var _xmlURL				:String;
		private var _parser				:IParser;
		private var _responder			:IResponder;
		
		/* 
		 * Loaders */
		private var xmlLoader			:URLLoader;
		private var xmlLoaderURLRequest	:URLRequest;
		
		public function XMLServiceDelegate(responder:IResponder) 
		{
			_responder = responder;
			init();
		}
		
		/* 
		 * This function initalised the XMLDelegate and assigns the class
		 * variables then calls the load() function. */
		private function init()
		{
			xmlLoader = new URLLoader();
			xmlLoader.addEventListener( Event.COMPLETE, onXMLLoadCompleteHandler );
			xmlLoader.addEventListener( IOErrorEvent.IO_ERROR, onIOError );
		}
		
		/*
		 * This function loads the specified XML file. */
		public function load(url:String, parser:IParser):void
		{
			_parser = parser;
			xmlLoader.load( new URLRequest(url) );
		}
		
		/*
		 * This is called when the xml file has been loaded.*/
		private function onXMLLoadCompleteHandler(e:Event):void 
		{
			if (e.target.data != null)
			{
				_responder.result(  _parser.parse( new XML( e.target.data ) ) );
			} 
		}
		
		/*
		 * Handle IO Error here.*/
		private function onIOError(e:IOErrorEvent):void
		{
			trace("AN IO ERROR OCCURRED WHEN ATTEMPTING TO LOAD XML. Error: \n" + e.text);
		}
	}

}