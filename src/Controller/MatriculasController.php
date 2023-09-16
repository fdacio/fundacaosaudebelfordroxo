<?php
namespace App\Controller;

/**
 * Matriculas Controller
 *
 * @property \App\Model\Table\MatriculasTable $Matriculas
 *
 * @method \App\Model\Entity\Matricula[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MatriculasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        if (isset($this->request->getQueryParams()['nome'])) {
            $dadosConsulta = (object) $this->request->getQueryParams();
        } else {
            $dadosConsulta = (object) array(
                'nome' => ''
            );
        }
        
        $where = [];        
       
        if ($dadosConsulta->nome) {
            $where[] = [
                "nome like " => '%' . $dadosConsulta->nome . '%'
            ];
        }       

        $matriculas = $this->Matriculas->find()->where($where);
        $matriculas = $this->paginate($matriculas);
        $this->set(compact('matriculas', 'dadosConsulta'));
    }

    /**
     * View method
     *
     * @param string|null $id Matricula id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $matricula = $this->Matriculas->get($id);

        $this->set('matricula', $matricula);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $matricula = $this->Matriculas->newEntity();
        
        if ($this->request->is('post')) {
        
            $matricula = $this->Matriculas->patchEntity($matricula, $this->request->getData());
            
            $matricula->data = date("Y-m-d");
            $matricula->usuarios_1 = $this->Auth->user('id');
            $matricula->usuarios_2 = $this->Auth->user('id');
            
            try {
                if ($this->request->getData('termo')['size'] > 0) {
                    $matricula->termo = $this->Upload->enviarDocumento($this->request->getData('termo'));
                }
            } catch (\Exception $e) {
                $this->Flash->error($e->getMessage());
            }
            
            if ($this->Matriculas->save($matricula)) {
                $this->Flash->success('Matrícula realizada com sucesso.');

                return $this->redirect(['action' => 'index']);
            }
            
            $this->GeradorMensagem->error(null, [$matricula->getErrors()],'Não foi possível realizar Matrícula');
        }

        $cursos = $this->Matriculas->Cursos->find('list', ['limit' => 200]);
        $turnos = $this->Matriculas->Turnos->find('list', ['limit' => 200]);
        $turmas = $this->Matriculas->Turmas->find('list', ['limit' => 200]);
        
        $this->set(compact('matricula', 'cursos', 'turnos', 'turmas'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Matricula id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $matricula = $this->Matriculas->get($id);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            $matricula->usuarios_2 = $this->Auth->user('id');
            
            try {
                if ($this->request->getData('termo')['size'] > 0) {
                    $matricula->termo = $this->Upload->enviarDocumento($this->request->getData('termo'));
                }
            } catch (\Exception $e) {
                $this->Flash->error($e->getMessage());
            }
            
            if ($this->Matriculas->save($matricula)) {
                $this->Flash->success('Matrícula alterada com sucesso.');
                
                return $this->redirect(['action' => 'index']);
            }
            
            $this->GeradorMensagem->error(null, [$matricula->getErrors()],'Não foi possível alterar Matrícula');
        }

        $cursos = $this->Matriculas->Cursos->find('list', ['limit' => 200]);
        $turnos = $this->Matriculas->Turnos->find('list', ['limit' => 200]);
        $turmas = $this->Matriculas->Turmas->find('list', ['limit' => 200]);
        
        $this->set(compact('matricula', 'cursos', 'turnos', 'turmas'));
    }

    public function cancelaMatricula($id = null)
    {
        
    }
    
    public function fichaMatricula($id = null)
    {
        
    }
    
    public function fichasMatriculas($id = null)
    {
        
    }
}
