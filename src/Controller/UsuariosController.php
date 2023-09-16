<?php
namespace App\Controller;

use Cake\Event\Event;

class UsuariosController extends AppController
{

    public function initialize()
    {
        parent::initialize();
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        $this->Auth->allow([
            'login',
            'logout',
            'add'
        ]);
    }

    public function login()
    {
        if ($this->Auth->user()) {
            $this->logout();
        }

        // reCaptacha v2
        $captchaChaveSite = '6Lc0DcEZAAAAAMfO0fxFAtQe036b6eMG6QUUlt5U';
        $captchaChaveSecreta = '6Lc0DcEZAAAAAFz1dY8TEF72iLQ19fk2K-q9FzHv';
        
        if ($this->request->is('post')) {
            
            //$captcha = $this->request->getData('g-recaptcha-response');
            $captcha = true;
            if ($captcha) {
                
                //$resposta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $captchaChaveSecreta . "&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
                //$resposta = json_decode($resposta);
                $resposta = true;
                if ($resposta ) {
                    
                    $user = $this->Auth->identify();
        
                    if ($user) {                              
                            
                            if ($user['status'] == 1) {
        
                                $this->Auth->setUser($user);
                                return $this->redirect($this->Auth->redirectUrl());
        
                            } else {
                                
                                $this->Flash->error('Usuário está bloqueado.');
                            }
                            

                        
                    } else {
                
                        $this->Flash->error('Usuário ou senha incorreta.');
                    }
                
                } else {
                    
                    $this->Flash->error('Erro de Autênticação');
                }
                
            } else {
                
                $this->Flash->error('Por favor, confirme o captcha.');
            }
        }
        
        $this->set(compact('captchaChaveSite'));
        
    }

    public function logout()
    {
        $session = $this->getRequest()->getSession();
        $session->destroy();
        $this->Flash->success('Sessão encerrada.');
        return $this->redirect($this->Auth->logout());
    }

    public function index()
    {
        if (isset($this->request->getQueryParams()['campo'])) {
            $dadosConsulta = (object) $this->request->getQueryParams();
        } else {
            $dadosConsulta = (object) array(
                'campo' => '',
                'condicao' => 'like',
                'valor' => ''
            );
        }

        $where = array();
        if ($dadosConsulta->valor) {
            $valor = $dadosConsulta->valor;

            if ($dadosConsulta->condicao === 'like') {
                $valor = '%' . $dadosConsulta->valor . '%';
            }
            $where[] = [
                "$dadosConsulta->campo $dadosConsulta->condicao" => $valor
            ];
        }

        $this->Usuarios = $this->Usuarios->find('all')->where($where);

        $usuarios = $this->paginate($this->Usuarios);
       
        $this->set(compact('usuarios', 'dadosConsulta'));
    }

    public function add()
    {
        $usuarioEntity = $this->Usuarios->newEntity();

        if ($this->request->is([
            'patch',
            'post',
            'put'
        ])) {

            $usuarioEntity = $this->Usuarios->patchEntity($usuarioEntity, $this->request->getData());

            try {

                $this->Usuarios->getConnection()->begin();
                
                $this->Usuarios->saveOrFail($usuarioEntity, [
                    'atomic' => false
                ]);

                $this->Usuarios->getConnection()->commit();

                $this->Flash->success("Cadastrado de Usuário realizado com sucesso.");

                return $this->redirect([
                    'action' => 'index'
                ]);

            } catch (\Exception $e) {

                $this->Usuarios->getConnection()->rollback();
                $this->GeradorMensagem->error(NULL, [
                    $usuarioEntity->getErrors()
                ], 'Não foi possível realilzar cadastro de Usuário. :');
            }
        }

        $this->set(compact('usuarioEntity'));
    }

    public function edit($id = null)
    {
        $usuarioEntity = $this->Usuarios->get($id);

        if ($this->request->is([
            'patch',
            'post',
            'put'
        ])) {

            $usuarioEntity = $this->Usuarios->patchEntity($usuarioEntity, $this->request->getData());

            if ($this->Usuarios->save($usuarioEntity)) {
                $this->Flash->success("Dados de Usuário alterada com sucesso.");
                return $this->redirect([
                    'controller' => 'Usuarios',
                    'action' => 'index'
                ]);
            }

            $this->GeradorMensagem->error(NULL, [
                $usuarioEntity->getErrors()
            ], "Não foi possível alterar Dados do Usuário.");
        }

        $this->set(compact('usuarioEntity'));
    }

    public function alteraPerfil($id = null)
    {
        $usuarioEntity = $this->Usuarios->get($this->Auth->user('id'));

        if ($this->request->is([
            'patch',
            'post',
            'put'
        ])) {

            $usuarioEntity = $this->Usuarios->patchEntity($usuarioEntity, $this->request->getData());

            if ($this->Usuarios->save($usuarioEntity)) {
                $this->Flash->success("Dados de Usuário alterada com sucesso.");
                return $this->redirect([
                    'controller' => 'Usuarios',
                    'action' => 'viewPerfil'
                ]);
            }

            $this->GeradorMensagem->error(NULL, [
                $usuarioEntity->getErrors()
            ], "Não foi possível alterar Dados do Usuário.");
        }

        $this->set(compact('usuarioEntity'));
    }

    public function ativaDesativa($id = null)
    {
        $usuario = $this->Usuarios->get($id);
        $usuario->status = ! ($usuario->status);
        $action = ($usuario->status == '1') ? 'Ativado' : 'Desativado';
        $this->Usuarios->save($usuario);
        return $this->redirect([
            'action' => 'index'
        ]);
        $this->Flash->success('Usuário ' . $action . ' com sucesso.');
    }
    
     public function alteraSenha()
    {
        $usuario = $this->Usuarios->get($this->Auth->user('id'));

        if ($this->request->is([
            'patch',
            'post',
            'put'
        ])) {

            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());

            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success("Dados de Usuário alterada com sucesso.");
                return $this->redirect([
                    'controller' => 'Index',
                    'action' => 'index'
                ]);
            }

            $this->GeradorMensagem->error(NULL, [
                $usuario->getErrors()
            ], "Não foi possível alterar Dados do Usuário.");
        }

        $this->set(compact('usuario'));
    }
    
    public function viewPerfil(){
        $usuario = $this->Usuarios->get($this->Auth->user('id'));
        $this->set(compact('usuario'));
    }

    
}
