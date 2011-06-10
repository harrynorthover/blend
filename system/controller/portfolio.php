<?php
	class Portfolio extends baseController {
		function index($args) {
			$this->registry->template->items = $this->registry->retrive->getData(Types::PORTFOLIO_ITEMS_TABLE, 'all');
			$this->registry->template->show('themes/default/portfolio_work_list');
		}
		
		public function view() {
			
		}
	}
?>