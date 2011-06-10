package com.harrynorthover.site.slideshow 
{
	import com.harrynorthover.interfaces.IParser;
	import flash.events.Event;
	import flash.events.EventDispatcher;
	import com.harrynorthover.site.slideshow.Item;
	
	/**
	 * ...
	 * @author Harry Northover
	 */
	
	public class Parser extends EventDispatcher implements IParser
	{
		private var numberOfElements		:Number;
		private var dataArray				:Array;
		private var itemsList				:XMLList
		
		public function parse(data:XML):Array
		{
			dataArray 			= 	[];
			itemsList			= 	new XMLList( data.item );
			numberOfElements 	= 	itemsList.length();
			
			for (var i:int = 0; i < numberOfElements; i++) 
			{
				var s_item:Item 		= 		new Item();
				
				s_item.itemName 		= 		itemsList[i].title;
				s_item.itemLink 		= 		itemsList[i].link;
				s_item.itemDescription 	= 		itemsList[i].desc;
				s_item.itemPictureURL 	= 		itemsList[i].contentUrl;
				
				if (s_item.itemPictureURL == null)
					return null;
				
				s_item.init();
				s_item.buttonMode = true;
				
				dataArray.push(s_item);
			}
			
			/* 
			 * Return all the data that has been parsed and then return the 
			 * amount of items in the dataArray. */
			return [dataArray, dataArray.length];
		}
		
	}

}