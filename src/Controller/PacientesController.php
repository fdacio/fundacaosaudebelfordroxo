<?php
namespace App\Controller;

class PacientesController extends AppController
{
    
    private $pacientes;
    
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Upload');
        $this->loadComponent('Planilha');
    }

    public function index()
    {
        if (isset($this->request->getQueryParams()['nome'])) {
            $dadosConsulta = (object) $this->request->getQueryParams();
        } else {
            $dadosConsulta = (object) array(
                'nome' => '',
                'endereco' => '', 
                'bairro' => ''
            );
        }

        $where = [];

        if ($dadosConsulta->nome) {
            $where[] = [
                "nome like " => '%' . $dadosConsulta->nome . '%'
            ];
        }

        if ($dadosConsulta->endereco) {
            $where[] = [
                "endereco like " => '%' . $dadosConsulta->endereco . '%'
            ];
        }
        if ($dadosConsulta->endereco) {
            $where[] = [
                "bairro like " => '%' . $dadosConsulta->bairro . '%'
            ];
        }

        $this->Pacientes = $this->Pacientes->find()->where($where);
        $pacientes = $this->paginate($this->Pacientes);
        $this->set(compact('pacientes', 'dadosConsulta'));
    }

    public function view($id = null)
    {
        $paciente = $this->Pacientes->get($id);

        $this->set('paciente', $paciente);
    }


    public function add()
    {
        $paciente = $this->Pacientes->newEntity();
        if ($this->request->is('post')) {

            $paciente = $this->Pacientes->patchEntity($paciente, $this->request->getData());            
            
            $paciente->usuarios_id = $this->Auth->user('id');
            $paciente->usuarios_id_2 = $this->Auth->user('id');
            
            if ($this->Pacientes->save($paciente)) {
                $this->Flash->success('Paciente cadastrado com sucesso.');

                return $this->redirect([
                    'action' => 'index'
                ]);
            }
            
            $this->Flash->error('Erro ao cadastrar Paciente.');
        }
        $this->set(compact('paciente'));
    }


    public function edit($id = null)
    {
        $paciente = $this->Pacientes->get($id);
       
        if ($this->request->is([
            'patch',
            'post',
            'put'
        ])) {

            $paciente = $this->Pacientes->patchEntity($paciente, $this->request->getData());

            $paciente->usuarios_2 = $this->Auth->user('id');            

            if ($this->Pacientes->save($paciente)) {
                $this->Flash->success('Registro alterado com sucesso.');

                return $this->redirect([
                    'action' => 'index'
                ]);
            }
            
            $this->Flash->error('Erro ao alterar Paciente.');

        }

        $this->set(compact('paciente'));       
    }

    public function delete($id = null)
    {
        try {
            $this->request->allowMethod([
                'post',
                'delete'
            ]);
            $paciente = $this->Pacientes->get($id);
            if ($this->Pacientes->delete($paciente)) {
                $this->Flash->success('paciente Excluído com Sucesso');
            } else {
                $this->Flash->error('Não foi possível excluir paciente');
            }
        } catch (\Exception $e) {
            $this->Flash->error('Não foi possível excluir paciente. Existe Matrícula');
        }

        return $this->redirect([
            'action' => 'index'
        ]);
    }

    public function importaArquivo()
    {}
    
    public function geraPlanilha()
    {
        $this->render(false);
        $this->Planilha->planilha('pacientes', $this->Pacientes);
    }
    
    public function exportapacientes()
    {
        if ($this->request->is([
            'patch',
            'post',
            'put'
        ])) {
        
            $registroInicial = (int) $this->request->getData('registro-inicial');
            $registroFinal = (int) $this->request->getData('registro-final');            
                   
            if (is_int($registroInicial) &&  is_int($registroFinal)) {
                
                if ($registroFinal > $registroInicial) {

                    $countRecods = ($registroFinal - $registroInicial) + 1;
                    $recordInitial = $registroInicial - 1;
                    $pacientes = $this->pacientes->find('all', ['limit' => $countRecods, 'offset' => $recordInitial])->order(['id' => 'ASC']);
                    
                    $this->Planilha->planilha('pacientes', $pacientes);
                }
            }
            
        }
    }}
