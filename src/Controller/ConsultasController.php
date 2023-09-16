<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Consultas Controller
 *
 * @property \App\Model\Table\ConsultasTable $Consultas
 *
 * @method \App\Model\Entity\Consulta[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ConsultasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Pacientes']
        ];
        $consultas = $this->paginate($this->Consultas);

        $this->set(compact('consultas'));
    }

    /**
     * View method
     *
     * @param string|null $id Consulta id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $consulta = $this->Consultas->get($id, [
            'contain' => ['Pacientes']
        ]);

        $this->set('consulta', $consulta);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $consulta = $this->Consultas->newEntity();
        if ($this->request->is('post')) {
            $consulta = $this->Consultas->patchEntity($consulta, $this->request->getData());
            if ($this->Consultas->save($consulta)) {
                $this->Flash->success(__('The consulta has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The consulta could not be saved. Please, try again.'));
        }
        $pacientes = $this->Consultas->Pacientes->find('list', ['limit' => 200]);
        $this->set(compact('consulta', 'pacientes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Consulta id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $consulta = $this->Consultas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $consulta = $this->Consultas->patchEntity($consulta, $this->request->getData());
            if ($this->Consultas->save($consulta)) {
                $this->Flash->success(__('The consulta has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The consulta could not be saved. Please, try again.'));
        }
        $pacientes = $this->Consultas->Pacientes->find('list', ['limit' => 200]);
        $this->set(compact('consulta', 'pacientes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Consulta id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $consulta = $this->Consultas->get($id);
        if ($this->Consultas->delete($consulta)) {
            $this->Flash->success(__('The consulta has been deleted.'));
        } else {
            $this->Flash->error(__('The consulta could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function fichasConsultas() 
    {
        $this->render(false);
    }
}
