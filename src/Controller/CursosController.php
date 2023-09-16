<?php
namespace App\Controller;

class CursosController extends AppController
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
        
        $this->Cursos = $this->Cursos->find('all')->where($where);
        
        $cursos = $this->paginate($this->Cursos);
        
        $this->set(compact('cursos', 'dadosConsulta'));

    }

    public function view($id = null)
    {
        $curso = $this->Cursos->get($id, [
            'contain' => []
        ]);
        $this->set('curso', $curso);
    }

    public function add()
    {
        $curso = $this->Cursos->newEntity();
        if ($this->request->is('post')) {
            $curso = $this->Cursos->patchEntity($curso, $this->request->getData());
            
            if ($this->Cursos->save($curso)) {
                $this->Flash->success('Cadastro realizado com sucesso.');
                return $this->redirect([
                    'action' => 'index'
                ]);
            } else {
                $this->Flash->error('Não foi possível realizar o cadastro.');
            }
        }
        $this->set(compact('curso'));
    }

    public function edit($id = null)
    {
        $curso = $this->Cursos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is([
            'patch',
            'post',
            'put'
        ])) {
            $curso = $this->Cursos->patchEntity($curso, $this->request->getData());
            
            if ($this->checkID($id)) {
                if ($this->Cursos->save($curso)) {
                    $this->Flash->success('Cadastro alterado com sucesso.');
                    return $this->redirect([
                        'action' => 'index'
                    ]);
                } else {
                    $this->Flash->error('Não foi possível alterar o cadastro.');
                }
            } else {
                $this->Flash->error("O curso " . $curso->nome . " não pode ser modificado.");
            }
        }
        $this->set(compact('curso'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod([
            'post',
            'delete'
        ]);
        $curso = $this->Cursos->get($id);
        
        if ($this->checkID($id)) {
            try {
                if ($curso = $this->Cursos->delete($curso)) {
                    $this->GeradorMensagem->success($id);
                }
            } catch (\Exception $e) {
                $this->GeradorMensagem->error($id, [
                    $curso->errors()
                ]);
            }
        } else {
            $this->Flash->error("O curso " . $curso->nome . " não pode ser excluído.");
        }
        
        return $this->redirect([
            'action' => 'index'
        ]);
    }

    private function checkID($id)
    {
        return ($id > 20);
    }
}
