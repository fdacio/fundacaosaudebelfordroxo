<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;
use App\FuncoesGerais;
use App\Model\Entity\Candidato;
use Cake\Event\Event;
use Cake\ORM\Exception\PersistenceFailedException;
use Cake\Utility\Text;
use Exception;


/**
 * Candidatos Controller
 *
 * @property \App\Model\Table\CandidatosTable $Candidatos
 *
 * @method \App\Model\Entity\Candidato[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CandidatosController extends AppController
{
    private $CandidatosAnexos;
    private $Cargos;
    private $Processos;

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Planilha');
        $this->CandidatosAnexos = TableRegistry::getTableLocator()->get('CandidatosAnexos');
        $this->Cargos = TableRegistry::getTableLocator()->get('Cargos');
        $this->Processos = TableRegistry::getTableLocator()->get('Processos');
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow([
            'inscricao',
            'consultar',
            'home',
            'aviso',
            'downloads',
            'updateNumeroInscricao',
            'importaCargos',
            'geraPdf'
        ]);
    }

    public function aviso()
    {
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
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

        $this->Candidatos = $this->Candidatos->find('all')->where($where);

        $candidatos = $this->paginate($this->Candidatos);
        $cargos = $this->Cargos->find('list')->where(['ativo' => 1]);

        $this->set(compact('candidatos', 'cargos', 'dadosConsulta'));
    }

    /**
     * View method
     *
     * @param string|null $id Candidato id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $candidato = $this->Candidatos->get($id, [
            'contain' => [],
        ]);

        $this->set('candidato', $candidato);
    }

    public function home()
    {
        //return $this->redirect(['action' => 'aviso']); 
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $candidato = $this->Candidatos->newEntity();

        if ($this->request->is('post')) {

            $candidato = $this->Candidatos->patchEntity($candidato, $this->request->getData());

            try {

                $this->Candidatos->getConnection()->begin();

                $candidato->processos_id = $this->request->getData('processos_id');
                $this->Candidatos->saveOrFail($candidato);

                $files = $this->request->getUploadedFiles();
                $allowMineType = ['application/pdf', 'application/zip'];
                $maxSize = (1024 * 1024 * 2);
                $i = 1;

                foreach ($files as $file) {

                    if ($file->getSize() > 0) {

                        if (!in_array($file->getClientMediaType(), $allowMineType)) {
                            throw new \Exception('Tipo de anexo não permitido: ' . $file->getClientFilename());
                        }

                        if ($file->getSize() > $maxSize) {
                            throw new \Exception('Tamanho de anexo não permitido: ' . $file->getClientFilename());
                        }

                        $arquivo = Text::uuid() . '-' . $file->getClientFilename();
                        $upload = WWW_ROOT . DS . 'docs' . DS . $arquivo;
                        $file->moveTo($upload);

                        switch ($i) {
                            case 1:
                                $nome = 'Diploma';
                                break;
                            case 2:
                                $nome = 'Documentos Experiência Profissional';
                                break;
                            case 3:
                                $nome = 'Cursos Complementares';
                                break;
                        }

                        $candidatoAnexo = $this->CandidatosAnexos->newEntity();
                        $candidatoAnexo->nome = $nome;
                        $candidatoAnexo->arquivo = 'docs' . DS . $arquivo;
                        $candidatoAnexo->candidatos_id = $candidato->id;
                        $this->CandidatosAnexos->saveOrFail($candidatoAnexo);
                    }

                    $i++;
                }

                $this->Candidatos->getConnection()->commit();

                $this->Flash->success('Inscrição realizada com sucesso<br>Inscrição nº: <strong>' . $candidato->id . '</strong>');

                return $this->redirect(['action' => 'home']);
            } catch (Exception $e) {
                $this->Candidatos->getConnection()->rollback();
                if ($e instanceof PersistenceFailedException) {
                    $this->Flash->error('Não foi possível enviar inscrição.');
                } else {
                    $this->Flash->error('Error: ' . $e->getMessage());
                }
            }
        }

        $cargos = (TableRegistry::getTableLocator()->get('Cargos'))->find('list')->where(['id' => 0]);
        $processos = (TableRegistry::getTableLocator()->get('Processos'))->find('list')->where(['ativo' => 1]);
        $etnias = Candidato::ETINIAS;
        $this->set(compact('candidato', 'cargos', 'etnias', 'processos'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function inscricao()
    {

        return $this->redirect(['action' => 'aviso']);

        $candidato = $this->Candidatos->newEntity();

        if ($this->request->is('post')) {

            $candidato = $this->Candidatos->patchEntity($candidato, $this->request->getData());

            try {

                $this->Candidatos->getConnection()->begin();

                $candidato->processos_id = $this->request->getData('processos_id');

                $this->Candidatos->saveOrFail($candidato);

                $files = $this->request->getUploadedFiles();
                $allowMineType = ['application/pdf', 'application/zip'];
                $maxSize = (1024 * 1024 * 2);
                $i = 1;

                foreach ($files as $file) {

                    if ($file->getSize() > 0) {

                        if (!in_array($file->getClientMediaType(), $allowMineType)) {
                            throw new \Exception('Tipo de anexo não permitido: ' . $file->getClientFilename());
                        }

                        if ($file->getSize() > $maxSize) {
                            throw new \Exception('Tamanho de anexo não permitido: ' . $file->getClientFilename());
                        }

                        $arquivo = Text::uuid() . '-' . $file->getClientFilename();
                        $upload = WWW_ROOT . DS . 'docs' . DS . $arquivo;
                        $file->moveTo($upload);

                        switch ($i) {
                            case 1:
                                $nome = 'Diploma';
                                break;
                            case 2:
                                $nome = 'Documentos Experiência Profissional';
                                break;
                            case 3:
                                $nome = 'Cursos Complementares';
                                break;
                        }

                        $candidatoAnexo = $this->CandidatosAnexos->newEntity();
                        $candidatoAnexo->nome = $nome;
                        $candidatoAnexo->arquivo = 'docs' . DS . $arquivo;
                        $candidatoAnexo->candidatos_id = $candidato->id;
                        $this->CandidatosAnexos->saveOrFail($candidatoAnexo);
                    }

                    $i++;
                }

                $this->Candidatos->getConnection()->commit();

                $this->Flash->success('Inscrição realizada com sucesso<br>Inscrição nº: <strong>' . $candidato->id . '</strong>');

                return $this->redirect(['action' => 'home']);
            } catch (Exception $e) {

                $this->Candidatos->getConnection()->rollback();
                if ($e instanceof PersistenceFailedException) {
                    $this->Flash->error('Não foi possível enviar inscrição.');
                } else {
                    $this->Flash->error('Error: ' . $e->getMessage());
                }
            }
        }

        $cargos = (TableRegistry::getTableLocator()->get('Cargos'))->find('list')->where(['id' => 0]);
        $processos = (TableRegistry::getTableLocator()->get('Processos'))->find('list')->where(['ativo' => 1]);
        $etnias = Candidato::ETINIAS;
        $this->set(compact('candidato', 'cargos', 'etnias', 'processos'));
    }

    public function consultar()
    {
        //return $this->redirect(['action' => 'aviso']);

        $candidato = null;
        $encontrou = false;

        if ($this->request->is('post')) {

            $inscricao = $this->request->getData('inscricao');
            $cpf = $this->request->getData('cpf');

            $where = ['id = ' => 0];
            if (!empty($inscricao)) {
                $where = ['id = ' => $inscricao];
            }
            if (!empty($cpf)) {
                $fg = new FuncoesGerais();
                $where = ['cpf = ' => $fg->desformataCpf($cpf)];
            }

            $candidato = $this->Candidatos->find('all')->where($where)->last();
            $encontrou = true;
        }

        $this->set(compact('candidato', 'encontrou'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Candidato id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $candidato = $this->Candidatos->get($id, [
            'contain' => [],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $candidato = $this->Candidatos->patchEntity($candidato, $this->request->getData());
            $candidato->id = $this->request->getData('novo_id');
            $candidato->processos_id = $this->request->getData('processos_id');

            if ($this->Candidatos->save($candidato)) {
                $this->Flash->success('Cadastro alterado com sucesso.');

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error('Não foi possível alterar cadastro.');
        }

        $cargos = (TableRegistry::getTableLocator()->get('Cargos'))->find('list');
        $etnias = Candidato::ETINIAS;
        $processos = (TableRegistry::getTableLocator()->get('Processos'))->find('list');
        $this->set(compact('candidato', 'cargos', 'etnias', 'processos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Candidato id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        try {
            $this->request->allowMethod(['post', 'delete', 'get']);
            $candidato = $this->Candidatos->get($id);
            $this->Candidatos->delete($candidato);
            $this->Flash->success('Cadastro excluído com sucesso.');
        } catch (\Exception $e) {
            $this->Flash->error('Não foi possível excluir cadastraro. Existe vínculos');
        }

        return $this->redirect(['action' => 'index']);
    }


    public function exportaInscricoes()
    {
        if ($this->request->is([
            'get'

        ])) {

            $dadosConsulta = (object) $this->request->getQueryParams();
            $where = [];
            if (!empty($dadosConsulta->cargos_id)) {
                $where[] = [
                    "Candidatos.cargos_id = " => $dadosConsulta->cargos_id
                ];
            }

            $candidatos = $this->Candidatos->find('all', ['contain' => ['Cargos']])->where($where)->order(['Candidatos.id' => 'ASC']);
            $records[] = [
                ('Inscrição'),
                ('Candidato'),
                ('CPF'),
                ('RG'),
                ('Nascimento'),
                ('Cargo'),
                ('Profissão'),
                ('Endereço'),
                ('Celular'),
                ('Email'),
                ('Deficiente'),
                ('Curso Superior'),
                ('Etinia'),
                ('Anexos')
            ];
            foreach ($candidatos as $candidato) {
                $deficiente = ($candidato->deficiencia) ? 'SIM' : 'NAO';
                $cursoSuperior = ($candidato->curso_superior) ? 'SIM' : 'NAO';
                $etinia = Candidato::ETINIAS[$candidato->etnia];
                $anexos = $this->CandidatosAnexos->find()->where(['candidatos_id = ' => $candidato->id]);
                $anexoCandidato = '';
                foreach ($anexos as $anexo) {
                    $anexoCandidato = $anexo->nome . ' ';
                }
                $records[] = [
                    $candidato->id,
                    ($candidato->nome),
                    $candidato->cpf,
                    $candidato->rg,
                    $candidato->nascimento->format('d/m/Y'),
                    $candidato->cargo->nome,
                    $candidato->profissao,
                    $candidato->endereco_completo,
                    $candidato->celular,
                    $candidato->email,
                    $deficiente,
                    $cursoSuperior,
                    $etinia,
                    $anexoCandidato
                ];
            }
            $this->Planilha->planilha('Candidatos', $records);
        }
    }

    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        if (($action == 'index') || ($action == 'view')) {
            return true;
        }
        if ($user['role'] < 3) {
            return true;
        } else {
            return false;
        }
    }

    public function downloads($arquivoNome)
    {
        $this->render(false);
        try {
            $filePath = WWW_ROOT . DS . ($arquivoNome);
            return
                $this->response
                ->withHeader('Content-Type', 'application/pdf;application/zip')
                ->withHeader('Content-Disposition', 'attachment;')
                ->withHeader('Cache-Control', 'max-age=0')
                ->withHeader('Cache-Control', 'max-age=1')
                ->withHeader('Expires', 'Mon, 26 Jul 1997 05:00:00 GMT')
                ->withHeader('Last-Modified', gmdate('D, d M Y H:i:s') . ' PDT')
                ->withHeader('Cache-Control', 'cache, must-revalidate')
                ->withHeader('Pragma', 'public')
                ->withFile($filePath, ['download' => true]);
        } catch (\Exception $e) {
            $this->Flash->error("Não foi possível baixar arquivo. Arquivo inexistente ou corrompido.");
        }
    }

    public function updateNumeroInscricao()
    {
        if ($this->request->is(['patch', 'post', 'put'])) {

            $antigoId = $this->request->getData('antigo_id');
            $novoId   = $this->request->getData('novo_id');

            $query = $this->Candidatos->query();
            $query->update()
                ->set(['id' => $novoId])
                ->where(['id' => $antigoId])
                ->execute();
            $result = ['success' => true];
            return $this->response->withType('application/json')->withStringBody(json_encode($result));
        }
    }

    public function informaProcessoSeletivo()
    {
        if ($this->request->is(['patch', 'post', 'put'])) {

            $id1 = $this->request->getData('id1');
            $id2 = $this->request->getData('id2');
            $processoId = $this->request->getData('processos_id');

            if (!empty($id1) && !empty($id2) && !empty($processId)) {

                $query = $this->Candidatos->query();
                $query->update()
                    ->set(['processos_id' => $processoId])
                    ->where(['id >=' => $id1, 'id <= ' => $id2])
                    ->execute();
            }

            return $this->redirect(['action' => 'informaProcessoSeletivo']);
        }

        $processos = (TableRegistry::getTableLocator()->get('Processos'))->find('list');
        $this->set(compact('processos'));
    }


    public function importaCargos()
    {
        try {

            $handle = fopen("../tmp/saude-local-trabalho.csv", "r");
            $row = 0;
            $itens = [];
            while ($line = fgetcsv($handle, 1000, ";")) {
                if ($row++ == 0) {
                    continue;
                }

                $itens[] = [
                    'nome' => $line[0]
                ];
            }
            fclose($handle);
           

            foreach ($itens as $key => $nome) {
                $nome = $nome['nome'];
                $nome = str_replace("(", "", $nome);
                $nome = str_replace(")", "", $nome);
                $where = ['nome =' => $nome];
                $processos = $this->Processos->find('all')->where($where)->count();
                if ($processos == 0) {
                    $processo = $this->Processos->newEntity();
                    $processo->nome = $nome;
                    $this->Processos->save($processo);
                }
            }

            $handle = fopen("../tmp/cargos-saude.csv", "r");
            $row = 0;
            $itens = [];
            while ($line = fgetcsv($handle, 1000, ";")) {
                if ($row++ == 0) {
                    continue;
                }

                $itens[] = [
                    'nome' => $line[0],
                    'processo' => $line[1]
                ];
            }
            fclose($handle);
           

            foreach ($itens as $key => $item) {
                $processo = $item['processo'];
                $processo = str_replace("(", "", $processo);
                $processo = str_replace(")", "", $processo);
                $where = ['nome =' => $processo];
                $processo = $this->Processos->find('all')->where($where)->first();
                $nome = $item['nome'];
                
                $cargo = $this->Cargos->newEntity();
                $cargo->nome = $nome;
                $cargo->processos_id = $processo->id;
                $this->Cargos->save($cargo);
                
            }

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function geraPdf($id)
    {
        $candidato = $this->Candidatos->get($id);
        $pdf = new \App\Report\InscricaoPdf('Inscrição Nº ' . $candidato->id);
        $pdf->setContent($candidato);
        $pdf->download('Inscricao_' . $candidato->id . '.pdf');
    }
}
