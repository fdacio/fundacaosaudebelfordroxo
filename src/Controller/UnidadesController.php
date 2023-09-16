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
class UnidadesController extends AppController
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
        $processos = $this->paginate($this->Processos);

        $this->set(compact('processos'));
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
        $processo = $this->Processos->get($id, [
            'contain' => []
        ]);

        $this->set('processo', $processo);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $processo = $this->Processos->newEntity();
        if ($this->request->is('post')) {
            $cargo = $this->Processos->patchEntity($processo, $this->request->getData());
            if ($this->Processos->save($processo)) {
                $this->Flash->success('Unidade cadastrada com sucesso.');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Não foi possível cadastrar unidade.');
        }
        $this->set(compact('processo'));
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
        $processo = $this->Processos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cargo = $this->Processos->patchEntity($processo, $this->request->getData());
            if ($this->Processos->save($processo)) {
                $this->Flash->success('Cadastro de unidade alterado com sucesso');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Não foi possível alterar cadastro de unidade');
        }
        $this->set(compact('processo'));
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
            $processo = $this->Processos->get($id);
            $this->Processos->delete($processo);
            $this->Flash->success('Unidade excluído com sucesso.');
        } catch (Exception $e) {
            $this->Flash->error('Não foi possível excluir unidade. Há vínculo.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
