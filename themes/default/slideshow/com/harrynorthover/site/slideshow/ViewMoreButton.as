package com.harrynorthover.site.slideshow 
{
	import com.greensock.plugins.TintPlugin;
	import com.greensock.plugins.TweenPlugin;
	import com.greensock.TweenLite;
	import flash.display.MovieClip;
	import flash.events.Event;
	import flash.events.MouseEvent;
	/**
	 * ...
	 * @author Harry Northover
	 */
	public class ViewMoreButton extends MovieClip
	{
		public static const BUTTON_CLICK:String = "button.click";
		
		private var _isVisible:Boolean = true;
		
		public function ViewMoreButton() 
		{
			super();
			
			TweenPlugin.activate([TintPlugin]);
			
			addEventListener(MouseEvent.CLICK, onButtonClickHandler);
			addEventListener(MouseEvent.ROLL_OVER, onButtonRollOverHandler);
			addEventListener(MouseEvent.ROLL_OUT, onButtonRollOutHandler);
			
			if (_isVisible) 
			{
				this.visible = true;
			}
			else
			{
				this.visible = false;
			}
		}
		
		private function onButtonRollOutHandler(e:MouseEvent):void 
		{
			TweenLite.to( this.bg, 0.3, { tint: null, alpha:0.5 } );
		}
		
		private function onButtonRollOverHandler(e:MouseEvent):void 
		{
			TweenLite.to( this.bg, 0.3, { tint: 0x000000, alpha:0.1 } );
		}
		
		private function onButtonClickHandler(e:MouseEvent):void 
		{
			dispatchEvent( new Event ( ViewMoreButton.BUTTON_CLICK ) );
		}
		
		public function set isVisible(value:Boolean):void 
		{
			if (value)
			{
				_isVisible = true;
			}
			else if (!value)
			{
				_isVisible = false;
			}
		}
		
	}

}