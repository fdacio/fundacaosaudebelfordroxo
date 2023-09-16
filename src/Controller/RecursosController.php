<?php

namespace App\Controller;

use App\Controller\AppController;
use App\FuncoesGerais;
use Cake\Chronos\Date;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Exception;

/**
 * Recursos Controller
 *
 * @property \App\Model\Table\RecursosTable $Recursos
 *
 * @method \App\Model\Entity\Recurso[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RecursosController extends AppController
{
    private $Candidatos;
    private $Cargos;

    public function initialize()
    {
        parent::initialize();
        $this->Candidatos = TableRegistry::getTableLocator()->get('Candidatos');
        $this->Cargos = TableRegistry::getTableLocator()->get('Cargos');
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow([
            'cadastrar',
            'consultar',
            'recursos',
            'abrir'
        ]);
    }
    
    public function abrir()
    {
         return $this->redirect(['controller' => 'Candidatos', 'action' => 'aviso']);
        $candidato = null;
        $encontrou = false;

        if ($this->request->is('post')) {

            $inscricao = $this->request->getData('inscricao');
            $cpf = $this->request->getData('cpf');
            $fg = new FuncoesGerais();

            try {

                if (empty($inscricao)) {
                    throw new Exception('Informe a Inscrição');
                }

                if (empty($cpf)) {
                    throw new Exception('Informe o CPF');
                }

                $where[] = ['id =' => $inscricao];
                $where[] = ['cpf = ' => $fg->desformataCpf($cpf)];

                $candidato = $this->Candidatos->find('all')->where($where)->first();

                if ($candidato) {
                    $recursos = $this->Recursos->find('all')->where(['candidatos_id = ' => $candidato->id])->count() == 0;
                    if ($recursos) {
                        return $this->redirect(['action' => 'cadastrar', $fg->codificar($candidato->id)]);
                    } else {
                        return $this->redirect(['action' => 'recursos', $fg->codificar($candidato->id)]);
                    }
                } else {
                    throw new Exception('Inscrição não encontrada.');
                }
            } catch (Exception $e) {
                $this->Flash->error($e->getMessage());
            }
        }

        $this->set(compact('candidato', 'encontrou'));
    }

    public function consultar()
    {
                 return $this->redirect(['controller' => 'Candidatos', 'action' => 'aviso']);
        $candidato = null;
        $encontrou = false;

        if ($this->request->is('post')) {

            $inscricao = $this->request->getData('inscricao');
            $cpf = $this->request->getData('cpf');
            $fg = new FuncoesGerais();

            try {

                if (empty($inscricao)) {
                    throw new Exception('Informe a Inscrição');
                }

                if (empty($cpf)) {
                    throw new Exception('Informe o CPF');
                }

                $where[] = ['id =' => $inscricao];
                $where[] = ['cpf = ' => $fg->desformataCpf($cpf)];

                $candidato = $this->Candidatos->find('all')->where($where)->first();

                if ($candidato) {
                    $recursos = $this->Recursos->find('all')->where(['candidatos_id = ' => $candidato->id])->count() == 0;
                    if ($recursos) {
                        return $this->redirect(['action' => 'cadastrar', $fg->codificar($candidato->id)]);
                    } else {
                        return $this->redirect(['action' => 'recursos', $fg->codificar($candidato->id)]);
                    }
                } else {
                    throw new Exception('Inscrição não encontrada.');
                }
            } catch (Exception $e) {
                $this->Flash->error($e->getMessage());
            }
        }

        $this->set(compact('candidato', 'encontrou'));
    }

    public function cadastrar($id = null)
    {
        return $this->redirect(['controller' => 'Candidatos', 'action' => 'aviso']);
        
        $fg = new FuncoesGerais();
        $id = $fg->decodificar($id);
        $candidato = $this->Candidatos->get($id);
        $recurso = $this->Recursos->newEntity();

        if ($this->request->is('post')) {
            try {
                $recurso = $this->Recursos->patchEntity($recurso, $this->request->getData());
                $this->Recursos->saveOrFail($recurso);
                $this->Flash->success('Recurso registrado com sucesso. <br>Protocolo nº: <strong>' . $recurso->id . '</strong>');
                return $this->redirect(['controller' => 'Candidatos', 'action' => 'home']);
            } catch (Exception $e) {
                $this->Flash->error('Não foi possível registrar o recurso');
            }
        }
        $this->set(compact('candidato', 'recurso'));
    }

    public function recursos($id = null)
    {
        $fg = new FuncoesGerais();
        $id = $fg->decodificar($id);
        $candidato = $this->Candidatos->get($id);
        $recursos = $this->Recursos->find('all')->where(['candidatos_id = ' => $candidato->id]);
        $this->set(compact('candidato', 'recursos'));
    }


    public function index()
    {
        if (isset($this->request->getQueryParams()['campo'])) {
            $dadosConsulta = (object) $this->request->getQueryParams();
        } else {
            $dadosConsulta = (object) array('campo' => '', 'condicao' => '', 'valor' => '', 'cargos_id' => '');
        }

        $where = array();
        if ($dadosConsulta->valor) {
            if ($dadosConsulta->campo == 'cpf') {
                $fg = new FuncoesGerais();
                $valor = $fg->desformataCpf($dadosConsulta->valor);
            } else {
                $valor = $dadosConsulta->valor;
            }

            if ($dadosConsulta->condicao === 'like') {
                $valor = '%' . $dadosConsulta->valor . '%';
            }
            $where[] = [
                "$dadosConsulta->campo $dadosConsulta->condicao" => $valor
            ];
        }

        if ($dadosConsulta->cargos_id) {
            $where[] = [
                "Candidatos.cargos_id = " => $dadosConsulta->cargos_id
            ];
        }

        $this->Recursos = $this->Recursos->find('all')
            ->join([
                [
                    'alias' => 'Candidatos',
                    'table' => 'candidatos',
                    'type' => 'INNER',
                    'conditions' => 'Candidatos.id = Recursos.candidatos_id'
                ]

            ])
            ->where($where);

        $recursos = $this->paginate($this->Recursos);
        $cargos = $this->Cargos->find('list');

        $this->set(compact('recursos', 'cargos', 'dadosConsulta'));
    }


    public function deferimento($id = null)
    {
        $recurso = $this->Recursos->get($id);

        if ($this->request->is([
            'patch',
            'post',
            'put'

        ])) {
            try {

                if(empty($this->request->getData('situacao'))) {
                    throw new Exception('Informe se é Recurso DEFERIDO ou INDEFERIDO');
                }

                $recurso = $this->Recursos->patchEntity($recurso, $this->request->getData());
                
                $recurso->data_analise = date('Y-m-d H:i:s');
                $recurso->usuarios_id = $this->Auth->user('id');
                $recurso->justificativa = $this->request->getData('justificativa');
                $recurso->situacao = $this->request->getData('situacao');
                $this->Recursos->saveOrFail($recurso);
                $this->Flash->success('Deferimento registrado com sucesso.');
                return $this->redirect(['action' => 'index']);

            } catch (Exception $e) {
                $this->Flash->error('Não foi possível registrar deferimento. <br>' . $e->getMessage());
            }
        }

        $this->set(compact('recurso'));
    }
}
