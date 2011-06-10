package com.harrynorthover.site.slideshow 
{
	import flash.display.Loader;
	import flash.display.MovieClip;
	import flash.display.Sprite;
	import flash.events.Event;
	import flash.events.MouseEvent;
	import flash.events.ProgressEvent;
	import flash.net.URLLoader;
	import flash.net.URLRequest;
	import flash.text.TextField;
	import flash.text.TextFieldAutoSize;
	import flash.text.TextFormat;
	import com.harrynorthover.site.slideshow.LoaderAsset;
	
	/**
	 * ...
	 * @author Harry Northover
	 */
	public class Item extends MovieClip
	{
		public static const ITEM_CLICKED			:String 	= 	"slideshowItem.click";
		public static const ITEM_ROLL_OVER			:String 	= 	"slideshowItem.roll_over";
		public static const ITEM_ROLL_OUT			:String		= 	"slideshowItem.roll_out";
		
		private var 		_itemName				:String;
		private var 		_itemPictureURL			:String; 
		private var			_itemLink				:String;
		private var 		_itemDescription		:String;
		
		private var 		itemPicture				:MovieClip;
		private var 		infomationBG			:Sprite;
		private var			titleTextField			:TextField;
		private var 		descriptionTextField	:TextField;
		private var			textFormat				:TextFormat;
		private var 		descriptionTextFormat	:TextFormat;
		private var 		viewMoreButton			:ViewMoreButton;
		private var 		LoaderAssetIcon			:LoaderAsset;
		
		private var 		imageLoader				:Loader;
		
		public function Item() 
		{
			
		}
		
		public function init():void
		{
			addEventListener(MouseEvent.CLICK, onItemClickHandler);
			addEventListener(MouseEvent.ROLL_OVER, onItemRolloverHandler);
			addEventListener(MouseEvent.ROLL_OUT, onItemRolloutHandler);
			
			load();
		}
		
		/* GETTERS/SETTERS                                                     */
		/*---------------------------------------------------------------------*/
		
		public function get itemName():String
		{
			return _itemName;
		}
		
		public function set itemName(value:String):void 
		{
			_itemName = value;
		}
		
		/*---------------------------------------------------------------------*/
		
		public function get itemPictureURL():String
		{ 
			return _itemPictureURL; 
		}
		
		public function set itemPictureURL(value:String):void 
		{
			_itemPictureURL = value;
		}
		
		/*---------------------------------------------------------------------*/
		
		public function get itemLink():String
		{
			return _itemLink;
		}
		
		public function set itemLink(value:String):void 
		{
			_itemLink = value;
		}
		
		/*---------------------------------------------------------------------*/
		
		public function get itemDescription():String
		{
			return _itemDescription;
		}
		
		public function set itemDescription(value:String):void 
		{
			_itemDescription = value;
		}
		
		/*---------------------------------------------------------------------*/
		
		public function get itemWidth():Number
		{
			return imageLoader.width;
		}
		
		/*---------------------------------------------------------------------*/
		
		private function load():void
		{
			imageLoader = new Loader();
			imageLoader.contentLoaderInfo.addEventListener(ProgressEvent.PROGRESS, onLoadProgressHandler);
			imageLoader.contentLoaderInfo.addEventListener(Event.COMPLETE, draw);
			imageLoader.load( new URLRequest( _itemPictureURL ) );
		}
		
		private function onLoadProgressHandler(e:ProgressEvent):void 
		{
			LoaderAssetIcon = new LoaderAsset();
			LoaderAssetIcon.x = 380;//(this.width / 2) - (LoaderAssetIcon.width / 2);
			LoaderAssetIcon.y = 140;//(this.height / 2) - (LoaderAssetIcon.height / 2);
			addChild(LoaderAssetIcon);
			LoaderAssetIcon.gotoAndPlay(1);
		}
		
		private function draw(e:Event):void
		{
			/*
			 * Remove the preloader asset from the stage. */
			removeChild(LoaderAssetIcon);
			
			itemPicture 							= new MovieClip();
			itemPicture.addChild(imageLoader);
			addChild(itemPicture);
			
			/* 
			 * Create the grey background for the information to go. */
			infomationBG 							= new Sprite();
			infomationBG.graphics.beginFill(0x000000, 0.5);
			infomationBG.graphics.drawRect(0, 270, 796, 53);
			infomationBG.graphics.endFill();
			addChild(infomationBG);
			
			textFormat 								= new TextFormat();
			textFormat.color 						= 0xFFFFFF;
			textFormat.size 						= 14;
			textFormat.font 						= "Calibri";
			
			descriptionTextFormat 					= new TextFormat();
			descriptionTextFormat.color 			= 0xFFFFFF;
			descriptionTextFormat.size 				= 12;
			descriptionTextFormat.font 				= "Calibri";
			descriptionTextFormat.kerning			= true;
			
			titleTextField 							= new TextField();
			titleTextField.defaultTextFormat 		= textFormat;
			titleTextField.text 					= _itemName;
			titleTextField.autoSize 				= TextFieldAutoSize.LEFT;
			titleTextField.x 						= 20;
			titleTextField.y 						= 280;
			titleTextField.selectable				= false;
			addChild(titleTextField);
			
			descriptionTextField 					= new TextField();
			descriptionTextField.defaultTextFormat 	= descriptionTextFormat;
			descriptionTextField.text 				= _itemDescription;
			descriptionTextField.autoSize 			= TextFieldAutoSize.LEFT;
			descriptionTextField.x 					= 20;
			descriptionTextField.y 					= (titleTextField.textHeight + titleTextField.y) + 1;
			descriptionTextField.selectable			= false;
			descriptionTextField.alpha				= 0.7;
			addChild(descriptionTextField);
			
			viewMoreButton							= new ViewMoreButton();
			viewMoreButton.x 						= 705;
			viewMoreButton.y 						= 285;
			addChild(viewMoreButton);
		}
		
		private function onItemRolloutHandler(e:MouseEvent):void 
		{
			dispatchEvent(new Event(ITEM_ROLL_OUT));
		}
		
		private function onItemRolloverHandler(e:MouseEvent):void 
		{
			dispatchEvent(new Event(ITEM_ROLL_OVER));
		}
		
		private function onItemClickHandler(e:MouseEvent):void 
		{
			dispatchEvent(new Event(ITEM_CLICKED));
		}
	}
}