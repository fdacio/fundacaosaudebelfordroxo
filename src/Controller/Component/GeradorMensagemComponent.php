<?php
namespace App\Controller\Component;

use Cake\Controller\Component\FlashComponent;
use Cake\ORM\TableRegistry;

/**
 * GeradorMensagem component
 */
class GeradorMensagemComponent extends FlashComponent
{

    public function success()
    {
        $controllers = (TableRegistry::getTableLocator()->get('Controllers'))->find('all')
            ->where([
            'Controllers.name = ' => $this->getController()->getName()
        ])
            ->toArray();
        if (count($controllers) > 0) {
            $entityAlias = $controllers[0]['alias'];
        } else {
            $entityAlias = $this->getController()->getName();
        }
        parent::success("O cadastro de $entityAlias foi " . $this->getActionSuccess(debug_backtrace()[1]['function']) . " com sucesso.");
    }

    public function getEntityAlias()
    {
        $controllers = (TableRegistry::getTableLocator()->get('Controllers'))->find('all')
            ->where([
                'Controllers.name = ' => $this->getController()->getName()
        ])
            ->toArray();
        if (count($controllers) > 0) {
            $entityAlias = $controllers[0]['alias'];
        } else {
            $entityAlias = $this->getController()->getName();
        }
        
        return $entityAlias;
    }

    public function getFunctionName()
    {
        return debug_backtrace()[1]['function'];
    }

    public function error($id = NULL, $errors = NULL, $mensagem = NULL)
    {
        $mensagem = ($mensagem == NULL) ? "Não foi possível " . $this->getActionError($this->getFunctionName()) . " cadastro  " . (($id != NULL) ? $id : "") . " de " . $this->getEntityAlias() . "<br >" : $mensagem . "<br >";
        
        if ($errors != NULL) {
            foreach ($errors as $arrayErros) {
                foreach ($arrayErros as $field => $arrayMsg) {
                    if (array_key_exists('_empty', $arrayMsg)) {
                        if (isset($arrayMsg['_empty']['message'])) {
                            $mensagem .= $arrayMsg['_empty']['message'] . "<br >";
                        } else {
                            $mensagem .= strtoupper($field) . " é obrigatório.<br >";
                        }
                    }
                    
                    if (array_key_exists('date', $arrayMsg)) {
                        $mensagem .= strtoupper($field) . " data inválida.<br >";
                    }
                    
                    if (array_key_exists('_isUnique', $arrayMsg)) {
                         $mensagem .= strtoupper($field) . " já cadastrado.<br >";
                    }
                    
                    if (array_key_exists('_existsIn', $arrayMsg)) {
                        $mensagem .= strtoupper($field) . " informado(a) não existe.<br >";
                    }
                    
                    if (array_key_exists('_required', $arrayMsg)) {
                        $mensagem .= strtoupper($field) . " é obrigatório.<br >";
                    }
                    
                    if (array_key_exists('custom', $arrayMsg)) {
                        if (isset($arrayMsg['custom'])) {
                            $mensagem .= $arrayMsg['custom'] . "<br >";
                        } else {
                            $mensagem .= strtoupper($field) . " está incorreto.<br >";
                        }
                    }
                    
                    if (array_key_exists('custom2', $arrayMsg)) {
                        if (isset($arrayMsg['custom2'])) {
                            $mensagem .= $arrayMsg['custom2'] . "<br >";
                        } else {
                            $mensagem .= strtoupper($field) . " está incorreto.<br >";
                        }
                    }
                    
                    if (array_key_exists('custom3', $arrayMsg)) {
                        if (isset($arrayMsg['custom3'])) {
                            $mensagem .= $arrayMsg['custom3'] . "<br >";
                        } else {
                            $mensagem .= strtoupper($field) . " está incorreto.<br >";
                        }
                    }
                    
                    if (array_key_exists('custom4', $arrayMsg)) {
                        if (isset($arrayMsg['custom4'])) {
                            $mensagem .= $arrayMsg['custom4'] . "<br >";
                        } else {
                            $mensagem .= strtoupper($field) . " está incorreto.<br >";
                        }
                    }
                }
            }
        }
        
        parent::error($mensagem);
    }

    public function notAllow($method, $entityAlias, $id = NULL)
    {
        parent::error("Não é permitido " . $this->getActionError($method) . " cadastro $id de $entityAlias.");
    }

    private function getActionSuccess($method)
    {
        switch ($method) {
            case 'add':
                return "realizado";
            case 'edit':
                return "alterado";
            case 'delete':
                return "excluído";
            default:
                return NULL;
        }
    }

    private function getActionError($method)
    {
        switch ($method) {
            case 'add':
                return "realizar";
            case 'edit':
                return "alterar";
            case 'delete':
                return "excluir";
            default:
                return NULL;
        }
    }
}
