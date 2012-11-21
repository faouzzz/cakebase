<?php
class SettingsComponent extends Component {

    function initialize(Controller $controller) {
        if(!file_exists(APP_DIR . DS . 'Config' . DS . 'settings.php')){
            return;
        }
        //debug(Configure::read());
        debug(Configure::load('settings'));
        //debug(Configure::read());
    }

    function foo() {

    }
}