<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Exception;

/**
 * Cargos Controller
 *
 * @property \App\Model\Table\CargosTable $Cargos
 *
 * @method \App\Model\Entity\Cargo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CargosController extends AppController
{
    private $Processos;
    
    public function initialize()
    {
        parent::initialize();
        $this->Processos = TableRegistry::getTableLocator()->get('Processos');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $cargos = $this->paginate($this->Cargos);

        $this->set(compact('cargos'));
    }

    /**
     * View method
     *
     * @param string|null $id Cargo id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cargo = $this->Cargos->get($id, [
            'contain' => []
        ]);

        $this->set('cargo', $cargo);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cargo = $this->Cargos->newEntity();
        if ($this->request->is('post')) {
            $cargo = $this->Cargos->patchEntity($cargo, $this->request->getData());
            if ($this->Cargos->save($cargo)) {
                $this->Flash->success('Cargo cadastrado com sucesso.');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Não foi possível cadastrar cargo.');
        }
        $processos = $this->Processos->find('list');
        $this->set(compact('cargo', 'processos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cargo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cargo = $this->Cargos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cargo = $this->Cargos->patchEntity($cargo, $this->request->getData());
            if ($this->Cargos->save($cargo)) {
                $this->Flash->success('Cadastro de cargo alterado com sucesso');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Não foi possível alterar cadastro de cargo');
        }
        $processos = $this->Processos->find('list');
        $this->set(compact('cargo', 'processos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cargo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        try {
            $this->request->allowMethod(['post', 'delete']);
            $cargo = $this->Cargos->get($id);
            $this->Cargos->delete($cargo);
            $this->Flash->success('Cargo excluído com sucesso.');
        } catch (Exception $e) {
            $this->Flash->error('Não foi possível excluir cargo. Há vínculo.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
