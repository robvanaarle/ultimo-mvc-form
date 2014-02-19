<?php

namespace ultimo\form\mvc;

class Form extends \ultimo\form\Form {
  /**
   * Module the Form is part of.
   * @var \ultimo\mvc\Module
   */
  protected $module;
  
  /**
   * Constructor.
   * @param array $fields The initial fieldnames with values.
   * @param array $config The configuration.
   */
  public function __construct($fields = array(), $config = array()) {
    if (isset($config['_module'])) {
      $this->module = $config['_module'];
    }
    
    parent::__construct($fields, $config);
  }
  
}