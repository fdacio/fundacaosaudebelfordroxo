<?php
namespace App\Controller;

class TurnosController extends AppController
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
        
        $this->Turnos = $this->Turnos->find('all')->where($where);
        
        $turnos = $this->paginate($this->Turnos);
        
        $this->set(compact('turnos', 'dadosConsulta'));

    }

    public function view($id = null)
    {
        $turno = $this->Turnos->get($id, [
            'contain' => []
        ]);
        $this->set('turno', $turno);
    }

    public function add()
    {
        $turno = $this->Turnos->newEntity();
        if ($this->request->is('post')) {
            $turno = $this->Turnos->patchEntity($turno, $this->request->getData());
            
            if ($this->Turnos->save($turno)) {
                $this->Flash->success('Cadastro de turno realizado com sucesso.');
                return $this->redirect([
                    'action' => 'index'
                ]);
            } else {
                $this->GeradorMensagem->error(NULL, [
                    $turno->getErrors()
                ], 'Não foi possível realizar o cadastro de turno.');
            }
        }
        $this->set(compact('turno'));
    }

    public function edit($id = null)
    {
        $turno = $this->Turnos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is([
            'patch',
            'post',
            'put'
        ])) {
            $turno = $this->Turnos->patchEntity($turno, $this->request->getData());
            
            if ($this->checkID($id)) {
                if ($this->Turnos->save($turno)) {
                    $this->Flash->success('Cadastro de turno alterado com sucesso.');
                    return $this->redirect([
                        'action' => 'index'
                    ]);
                } else {
                    $this->GeradorMensagem->error($id, [
                        $turno->getErrors()
                    ], 'Não foi possível alterar o cadastro de turno.');
                }
            } else {
                $this->Flash->error("O turno " . $turno->nome . " não pode ser modificado.");
            }
        }
        $this->set(compact('turno'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod([
            'post',
            'delete'
        ]);
        $turno = $this->Turnos->get($id);
        
        if ($this->checkID($id)) {
            try {
                if ($turno = $this->Turnos->delete($turno)) {
                    $this->GeradorMensagem->success($id);
                }
            } catch (\Exception $e) {
                $this->GeradorMensagem->error($id, [
                    $turno->errors()
                ]);
            }
        } else {
            $this->Flash->error("O turno " . $turno->nome . " não pode ser excluído.");
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
