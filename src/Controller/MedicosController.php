<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Medicos Controller
 *
 *
 * @method \App\Model\Entity\Medico[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MedicosController extends AppController
{
    
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Planilha');
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow([
            'cadastro',
            'consulta',
            'home',
            'aviso',
            'downloads'
        ]);
    }
    

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $medicos = $this->paginate($this->Medicos);

        $this->set(compact('medicos'));
    }

    /**
     * View method
     *
     * @param string|null $id Medico id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $medico = $this->Medicos->get($id, [
            'contain' => []
        ]);

        $this->set('medico', $medico);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $medico = $this->Medicos->newEntity();
        if ($this->request->is('post')) {
            $medico = $this->Medicos->patchEntity($medico, $this->request->getData());
            if ($this->Medicos->save($medico)) {
                $this->Flash->success(__('The medico has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The medico could not be saved. Please, try again.'));
        }
        $this->set(compact('medico'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Medico id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $medico = $this->Medicos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $medico = $this->Medicos->patchEntity($medico, $this->request->getData());
            if ($this->Medicos->save($medico)) {
                $this->Flash->success(__('The medico has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The medico could not be saved. Please, try again.'));
        }
        $this->set(compact('medico'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Medico id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $medico = $this->Medicos->get($id);
        if ($this->Medicos->delete($medico)) {
            $this->Flash->success(__('The medico has been deleted.'));
        } else {
            $this->Flash->error(__('The medico could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }



    public function cadastro()
    {

    }

    public function consulta()
    {

    }

    public function home()
    {

    }

    public function aviso()
    {

    }

}
