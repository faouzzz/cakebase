<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 */
class AppController extends Controller {

    public $components = array(
        'Acl',
        'Auth' => array(
            'authorize' => array(
                'Actions' => array('actionPath' => 'controllers/')
            ),
            'flash' => array('element' => 'Flash/error', 'key' => 'flash', 'params' => array()),
            'loginAction' => array('admin' => true, 'controller' => 'users', 'action' => 'login'),
            'loginRedirect' => array('admin' => true, 'controller' => 'users', 'action' => 'index'),
            'logoutRedirect' => array('admin' => true, 'controller' => 'users', 'action' => 'login'),
            'authenticate' => array(
                'Form' => array(
                    'fields' => array('username' => 'email')
                )
            ),
        ),
        'Session',
        'RequestHandler',
    );

/*
 * Override the default helpers with bootstrap ones. The bootstrap helper set
 * some defaults and provider some helper methods for bootstrap components.
 * 
 * See individual Helpers for methods available
 * 
 */
    public $helpers = array(
        'Html' => array('className' => 'BootstrapHtml'),
		'Js' => array('Jquery'),
        'Session',
        'Form' => array('className' => 'BootstrapForm'),
        'Time' => array('className' => 'BootstrapTime'),
        'Menu',
    );

    public function beforeFilter() {
        //enable / disable auth
        //$this->Auth->allow(array('*'));
    }

    public function beforeRender(){

        //handle the pjax stuff
        //add a request detector to match pjax
        $this->request->addDetector('pjax', array('callback' => function(){
            return CakeRequest::header('X-PJAX');
        }));

        //use pjax layout if request was made with pjax
        if($this->request->is('pjax')){
            $this->response->type('json');
            $this->layout = 'pjax';
            //check if the pjax get param is sent, if so we want it
            //removing to stop it showing in the links loaded
            if(isset($this->request->query['_pjax'])){
                unset($this->request->query['_pjax']);
            }
        }
    }

}
