package com.harrynorthover.site.slideshow
{
import com.greensock.easing.Expo;
	import com.greensock.TweenLite;
	
	import flash.display.Loader;
	import flash.display.MovieClip;
	import flash.display.Sprite;
	import flash.events.*;
	import flash.net.URLLoader;
	import flash.net.URLRequest;
	import flash.net.navigateToURL;
	import flash.text.TextField;
	import flash.utils.Timer;
	
	public class Slideshow extends Sprite
	{	
		public static const 	ITEM_WIDTH			:Number 	= 800;
		public static const 	ITEM_ZERO			:Number		= -747;
		
		// Data
		private var 			data				:DataModel;
		private var 			items				:Array;
		
		// Containers
		private var 			itemsContainer		:MovieClip;
		
		// Container mask
		private var 			itemsContainerMask	:MovieClip;
		
		// Timer
		private var 			timer				:Timer;
		private var 			currentItem			:Number 	= 0;
		private var 			isLeft				:Boolean	= false;
		private var 			isRight				:Boolean	= true;
		
		private var 			navBar				:NavigationBar;
		
		public function Slideshow()
		{
			background.visible 			=	false;
			decoration.visible 			= 	false;
			drop_shadow.visible 		= 	false;
			
			init();
		}
		
		private function init():void
		{
			items						= 	[];
			data 						= 	new DataModel();
			
			data.addEventListener(DataModel.DATA_LOADED, onDataParserCompleteHandler);
			data.init();
			
			timer 						= new Timer(5000);
			timer.addEventListener(TimerEvent.TIMER, onTimerHandler);
		}
		
		private function onTimerHandler(e:TimerEvent):void 
		{
			var targetX:Number;
			
			if (isRight)
			{
				if (currentItem == (data.numberOfItems - 1))
				{
					isRight = false;
					isLeft = true;
					targetX = (itemsContainer.x + ITEM_WIDTH);
				}
				else 
				{
					targetX = (itemsContainer.x - ITEM_WIDTH);
				}
			}
			else if (isLeft)
			{
				if (currentItem == 0)
				{
					isRight = true;
					isLeft = false;
					targetX = ITEM_ZERO;
				}
				else
				{
					targetX = (itemsContainer.x + ITEM_WIDTH);
				}
			}
			
			trace(this, "targetX: ", targetX);
			TweenLite.to(itemsContainer, 1.5, { x: targetX, ease:Expo.easeInOut } );
			
			if (isLeft)
			{
				currentItem--;
			}
			else  if (isRight)
			{
				currentItem++;
			}
			
			trace(this, "currentItem: ", currentItem);
		}
		
		private function onDataParserCompleteHandler(e:Event):void 
		{	
			itemsContainerMask 			= new MovieClip();
			addChild(itemsContainerMask);
			
			itemsContainer 				= new MovieClip();
			addChild(itemsContainer);
			
			if (data.content != null)
			{
				draw();
			}

		}
		
		private function draw():void
		{
			/* 
			* Show the assets in the .FLA (background, etc...) */
			background.visible 			=	true;
			decoration.visible 			= 	true;
			drop_shadow.visible 		= 	true;
			
			itemsContainerMask.graphics.beginFill(0x000000, 0.5);
			itemsContainerMask.graphics.drawRect(54, 15, 794, 349);
			itemsContainerMask.graphics.endFill();
			
			itemsContainer.y 			= 14;
			itemsContainer.x 			= 53;
			itemsContainer.mask 		= itemsContainerMask;
			
			navBar 						= new NavigationBar();
			navBar.numberOfItems 		= data.numberOfItems;
			navBar.addEventListener(NavigationBar.NAV_BUTTON_CLICK, onNavigationButtonClickHandler);
			navBar.y = 14;
			navBar.x = 53;
			
			
			for (var i:int = 0; i < data.numberOfItems; i++) 
			{
				data.content[i].y 		= 0;
				data.content[i].x 		= (800 * i);
				data.content[i].addEventListener(Item.ITEM_CLICKED, onItemClickHandler);
				
				itemsContainer.addChild(data.content[i]);
			}
			addChild(navBar);
			timer.start();
		}
		
		private function onNavigationButtonClickHandler(e:Event):void 
		{
			trace(this, "currentItem: ", currentItem);
			trace(this, "selectedButtonIndex: ", navBar.selectedButtonIndex);
			if (currentItem != navBar.selectedButtonIndex)
			{
				currentItem = navBar.selectedButtonIndex;
				if (navBar.selectedButtonIndex == 0)
				{
					TweenLite.to(itemsContainer, 1, { x:54, ease:Expo.easeInOut } );
				}
				else
				{
					TweenLite.to(itemsContainer, 1, { x:-(navBar.selectedButtonIndex * ITEM_WIDTH) + 54, ease:Expo.easeInOut } );
				}
				timer.reset();
				timer.start();
			}
		}
		
		private function onItemClickHandler(e:Event):void 
		{
			navigateToURL( new URLRequest ( e.target.itemLink ), "_blank" );
		}
	}
}