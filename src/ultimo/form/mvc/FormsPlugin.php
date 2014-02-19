<?php

namespace ultimo\form\mvc;

class FormsPlugin implements \ultimo\mvc\plugins\ApplicationPlugin {
  
  /**
   * The theme for the forms.
   * @var string
   */
  protected $theme;
  
  /**
   * Constructor.
   * @param string $theme The theme for forms.
   */
  public function __construct($theme) {
    $this->theme = $theme;
  }
  
  public function onPluginAdded(\ultimo\mvc\Application $application) { }
  
  /**
   * Appends a form broker plugin to created modules.
   */
  public function onModuleCreated(\ultimo\mvc\Module $module) {
    $formBroker = new FormBroker($module, $this->theme);
    $module->addPlugin($formBroker, 'formBroker');
  }
  
  public function onRoute(\ultimo\mvc\Application $application, \ultimo\mvc\Request $request) { }
  
  public function onRouted(\ultimo\mvc\Application $application, \ultimo\mvc\Request $request=null) { }
  
  public function onDispatch(\ultimo\mvc\Application $application) { }
  
  public function onDispatched(\ultimo\mvc\Application $application) { }
}