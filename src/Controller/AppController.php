<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Controller\Controller;
use App\Model\Entity\Usuario;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
        $this->loadComponent('GeradorMensagem');
        $this->loadComponent('Auth', [
            'authorize' => [
                'Controller'
            ],
            'loginRedirect' => [
                'controller' => 'Index',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Usuarios',
                'action' => 'login'
            ],
            'loginAction' => [
                'controller' => 'Usuarios',
                'action' => 'login'
            ],
            'authenticate' => [
                'Form' => [
                    'userModel' => 'Usuarios',
                    'fields' => [
                        'username' => 'email',
                        'password' => 'senha'
                    ]
                ]
            ],
            'authError' => 'Ação não autorizada.',
            'storage' => 'Session'
        ]);

        $this->viewBuilder()->setTheme('TwitterBootstrap');
        if ($this->Auth->user()) {
            $this->viewBuilder()->setLayout('adminlte');
        } else {
            $this->viewBuilder()->setLayout('content');
        }

        $this->set('nome_controller', $this->request->getParam('controller'));

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }

    public function isAuthorized($user)
    {
        $controller = $this->request->getParam('controller');
        $action = $this->request->getParam('action');
        $role = $this->Auth->user('role');
        $permissoes = Usuario::PERMISSOES_ROLES[$role];


        if ($controller == 'ajax') {
            return true;
        }
        $condicao1 = array_key_exists($controller, $permissoes);

        if ($condicao1) {
            $condicao2 = in_array($action, $permissoes[$controller]);
            $condicao3 = in_array('*', $permissoes[$controller]);

            if ($condicao2 || $condicao3) {
                return false;
            }
        }
        return true;
    }
}
