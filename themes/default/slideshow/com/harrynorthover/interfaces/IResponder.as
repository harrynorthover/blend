package com.harrynorthover.interfaces 
{
	
	/**
	 * ...
	 * @author Harry Northover
	 */
	public interface IResponder 
	{		
		/*
		 * This initalises the data model and calls the XMLDelegate class to load 
		and parse the data*/
		function init():void;
		
		/* 
		 * This takes the data back from the XMLDelegate. */
		function result(data:Array):void;
	}
	
}