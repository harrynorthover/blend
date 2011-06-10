package com.harrynorthover.site.slideshow
{
	import com.greensock.TweenLite;
	import com.greensock.plugins.*;
	import flash.events.Event;
	
	import flash.display.MovieClip;
	import flash.display.Sprite;
	import flash.events.MouseEvent;
	
	public class NavigationBar extends MovieClip
	{
		/* Events */
		public static const NAV_BUTTON_ROLLOVER	:String = "navButton.roll_over";
		public static const NAV_BUTTON_ROLLOUT	:String = "navButton.roll_out";
		public static const NAV_BUTTON_CLICK	:String = "navButton.click";
		
		private var _numberOfItems				:Number;
		private var _buttons					:Array;
		
		/* Graphics */
		private var background					:Sprite;
		private var prevX						:Number;
		
		public 	var selectedButtonIndex				:Number;
		
		public function NavigationBar()
		{
			super();
			TweenPlugin.activate([TintPlugin]);
			_buttons 	= 	[];
		}
		
		public function set numberOfItems(v:Number):void
		{
			_numberOfItems 	=	v;
			draw();
		}
		
		private function draw():void
		{
			background 		=	new Sprite();
			background.graphics.beginFill(0x000000, 0.4);
			background.graphics.drawRect(1, 240, 794, 30);
			background.graphics.endFill();
			addChild(background);
			
			for (var i:int = 0; i < _numberOfItems; ++i)
			{
				var button:Sprite = new Sprite();
				
				button.addEventListener(MouseEvent.ROLL_OVER, onButtonRollOverHandler);
				button.addEventListener(MouseEvent.ROLL_OUT, onButtonRollOutHandler);
				button.addEventListener(MouseEvent.CLICK, onButtonClickHandler);
				
				button.graphics.beginFill(0xFFFFFF, 0.1);
				
				if (i == 0)
				{
					button.graphics.drawRect(21, 248, 15, 15);
				}
				else
				{
					var x:Number = prevX + 10;
					button.graphics.drawRect(x, 248, 15, 15);
				}
				
				prevX = (21 * (i+1)) + 10;
				
				trace(this, "button.x", prevX);
				
				button.graphics.endFill();
				button.buttonMode = true;
				
				_buttons.push(button);
				addChild(button);
			}
		}
		
		private function onButtonRollOverHandler(e:MouseEvent):void
		{
			TweenLite.to(e.target, 0.3, { tint:0x000000 } );
		}
		
		private function onButtonRollOutHandler(e:MouseEvent):void
		{
			TweenLite.to(e.target, 0.3, { tint:null } );
		}
		
		private function onButtonClickHandler(e:MouseEvent):void
		{
			trace(this, "buttonState: click");
			var currentItem:Object = e.target;
			for (var i:int = 0; i < _numberOfItems; i++) 
			{
				if (currentItem == _buttons[i])
				{
					selectedButtonIndex = i;
					dispatchEvent( new Event ( NavigationBar.NAV_BUTTON_CLICK) );
				}
			}
		}
	}
}