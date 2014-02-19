<?php

namespace ultimo\form\mvc;

class FormBroker implements \ultimo\mvc\plugins\ModulePlugin {
  
  /**
   * The module the form broker is for.
   * @var \ultimo\mvc\Module
   */
  protected $module;
  
  /**
   * The theme for forms.
   * @var string
   */
  protected $theme;
  
  /**
   * Constructor.
   * @param \ultimo\mvc\Module $module The module the form broker is for.
   * @param string $theme The theme for forms.
   */
  public function __construct(\ultimo\mvc\Module $module, $theme) {
    $this->module = $module;
    $this->theme = $theme;
  }
  
  /**
   * Returns the form within this module with the specified qualified name. It
   * first checks if a form exists in the directory with the set theme name.
   * Else it checks whether a form exists without a theme.
   * @param string $qName The qualified name of the form.
   * @param array $fields The initial form field names and values.
   * @param array $config The configuration of the form.
   * @return /ultimo/form/Form the created form, or null if no form with the
   * specified qualified name exists in the module.
   */
  public function createForm($qName, array $fields=array(), array $config=array()) {
    $formName = $this->module->getFQName('forms\\' . $this->theme . '\\' . $qName);
    if ($formName === null) {
      $formName = $this->module->getFQName('forms\\' . $qName);
    }
    
    if ($formName === null) {
      return null;
    }
    
    $config['_module'] = $this->module;
    
    $form = new $formName($fields, $config);
    
    return $form;
  }
  
  public function onControllerCreated(\ultimo\mvc\Controller $controller) { }
}