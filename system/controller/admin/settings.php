<?php
class Settings extends baseController {
	function index($args)
	{
		$settings = $this->registry->retrive->getData(Types::SETTINGS_TABLE, 1);
		$this->registry->template->settings = $settings[0];

		$this->registry->template->show('system/themes/default/settings');
	}

	public function update($args)
	{
		//echo $args[0];
		//echo '        -      ' . $_POST['uploadsPath'];
		$vo = new SettingsVO(0);
		$updatedData = array($_POST['siteName'], $_POST['siteDescription'], $_POST['maintenanceMode'], $_POST['uploadsPath'], $_POST['enableUploads'], $_POST['twitterUsername'], $_POST['twitterPassword'], $_POST['enableTwitter'], $_POST['autoTweet']);

		$this->registry->update->updateData(Types::SETTINGS_TABLE, $args[0], $vo->getTableRowNames(), $updatedData);
	}

	public function info($args)
	{
		$this->registry->template->show('system/themes/default/settingsInfo');
	}
}
?>