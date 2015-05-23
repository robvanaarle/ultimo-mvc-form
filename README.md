# Ultimo MVC Form
Form handling for Ultimo MVC

Makes Ultimo Form easy to use in a controller. Support for different form objects per theme.

## Requirements
* PHP 5.3
* Ultimo Form
* Ultimo MVC


## Usage
### Register plugin
  $application->addPlugin(new \ultimo\form\mvc\FormsPlugin($theme));

### Use in Controller
  $form = $this->module->getPlugin('formBroker')->createForm(
    'message\CreateForm',
    $this->request->getParam('form', array())
    );
    
  if ($this->request->isPost()){
      if ($form->validate()) {
      // store data
    }
  }