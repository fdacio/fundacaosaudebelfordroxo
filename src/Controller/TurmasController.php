<?php
namespace App\Controller;

class TurmasController extends AppController
{

    public function index()
    {
        if (isset($this->request->getQueryParams()['campo'])) {
            $dadosConsulta = (object) $this->request->getQueryParams();
        }else{
            $dadosConsulta = (object) array('campo' => '', 'condicao' => '', 'valor' => '');
        }
        
        $where = array();
        if($dadosConsulta->valor){
            $valor = $dadosConsulta->valor;
            
            if ($dadosConsulta->condicao === 'like') {
                $valor = '%' . $dadosConsulta->valor . '%';
            }
            $where[] = [
                "$dadosConsulta->campo $dadosConsulta->condicao" => $valor
            ];
        }
        
        $this->Turmas = $this->Turmas->find('all')->where($where);
        
        $turmas = $this->paginate($this->Turmas);
        
        $this->set(compact('turmas', 'dadosConsulta'));

    }

    public function view($id = null)
    {
        $turma = $this->Turmas->get($id, [
            'contain' => []
        ]);
        $this->set('turma', $turma);
    }

    public function add()
    {
        $turma = $this->Turmas->newEntity();
        if ($this->request->is('post')) {
            $turma = $this->Turmas->patchEntity($turma, $this->request->getData());
            
            if ($this->Turmas->save($turma)) {
                $this->Flash->success('Cadastro realizado com sucesso.');
                return $this->redirect([
                    'action' => 'index'
                ]);
            } else {
                $this->Flash->error('Não foi possível realizar o cadastro.');
            }
        }
        $this->set(compact('turma'));
    }

    public function edit($id = null)
    {
        $turma = $this->Turmas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is([
            'patch',
            'post',
            'put'
        ])) {
            $turma = $this->Turmas->patchEntity($turma, $this->request->getData());
            
            if ($this->checkID($id)) {
                if ($this->Turmas->save($turma)) {
                    $this->Flash->success('Cadastro alterado com sucesso.');
                    return $this->redirect([
                        'action' => 'index'
                    ]);
                } else {
                    $this->Flash->error('Não foi possível alterar o cadastro.');
                }
            } else {
                $this->Flash->error("A turma " . $turma->nome . " não pode ser modificado.");
            }
        }
        $this->set(compact('turma'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod([
            'post',
            'delete'
        ]);
        $turma = $this->Turmas->get($id);
        
        if ($this->checkID($id)) {
            try {
                if ($turma = $this->Turmas->delete($turma)) {
                    $this->GeradorMensagem->success($id);
                }
            } catch (\Exception $e) {
                $this->GeradorMensagem->error($id, [
                    $turma->errors()
                ]);
            }
        } else {
            $this->Flash->error("O turma " . $turma->nome . " não pode ser excluído.");
        }
        
        return $this->redirect([
            'action' => 'index'
        ]);
    }

    private function checkID($id)
    {
        return ($id > 3);
    }
}
