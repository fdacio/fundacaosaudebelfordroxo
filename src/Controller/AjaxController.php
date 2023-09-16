<?php
namespace App\Controller;

use Cake\Event\Event;
use Cake\ORM\TableRegistry;

class AjaxController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow([
            'alunosPorNome', 
            'alunoPorNome',
            'cargos'
        ]);
    }

    private function respostaJson($data)
    {
        $responses = array();
        $i = 0;
        foreach ($data as $key => $value) {
            $responses[$i]['id'] = $key;
            $responses[$i]['label'] = $value;
            $i ++;
        }
        return $this->response->withType('application/json')->withStringBody(json_encode($responses));
    }

    private function respostaJsonArray($data)
    {
        $responses = array();
        $i = 0;
        foreach ($data as $response) {
            $responses[$i]['id'] = $response['action']['id'];
            $responses[$i]['controle'] = $response['action']['controller']['alias'];
            $responses[$i]['action'] = $response['action']['name'];
            
            $i ++;
        }
        return $this->response->withType('application/json')->withStringBody(json_encode($responses));
    }

    public function pacientePorNome()
    {
        
        if ($this->request->is(array(
            'ajax'
        ))) {
          
            $nome = strtoupper($this->request->getParam('param'));
            $where = array();
            $where = [
                "Pacientes.nome = " => $nome
            ];
            
            $pacientes = (TableRegistry::getTableLocator()->get('Pacientes'))->find('list', [
                'fields' => array(
                    'Pacientes.id',
                    'Pacientes.nome'
                )
            ])->where($where);
            
            return $this->respostaJson($pacientes);
        }
    }

    public function pacientesPorNome()
    {
        
        if ($this->request->is(array(
            'ajax'
        ))) {
            
            $nome = strtoupper($this->request->getParam('param'));
            $where = array();
            $where = [
                "Pacientes.nome like " => '%'.$nome.'%'
            ];
            
            $pacientes = (TableRegistry::getTableLocator()->get('Pacientes'))->find('list', [
                'fields' => array(
                    'Pacientes.id',
                    'Pacientes.nome'
                )
            ])->where($where);
            
            return $this->respostaJson($pacientes);
        }
    }
    
    public function cargos()
    {
        if ($this->request->is(array(
            'ajax','get'
        ))) {
            
            $processo = $this->request->getParam('param');
            $where = [
                'processos_id =' => $processo
            ];
            $cargos = (TableRegistry::getTableLocator()->get('Cargos'))->find('list', [
                'fields' => array(
                    'Cargos.id',
                    'Cargos.nome'
                )
            ])
            ->where($where)
            ->order(['Cargos.id' => 'ASC']);
            
            return $this->respostaJson($cargos);
        }
    }
}
