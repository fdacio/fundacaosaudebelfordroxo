<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
use App\FuncoesGerais;

/**
 * Usuario Entity
 *
 * @property int $id
 * @property string $nome
 * @property string $sobrenome
 * @property string $email
 * @property string $senha
 * @property int $status
 * @property \Cake\I18n\FrozenTime $criado
 * @property \Cake\I18n\FrozenTime $modificado
 */
class Usuario extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'nome' => true,
        'sobrenome' => true,
        'email' => true,
        'senha' => true,
        'status' => true,
        'role' => true,
        'criado' => true,
        'modificado' => true
    ];

    const ADMINISTRADOR = 1;

    const GERENTE = 2;

    const OPERADOR = 3;

    const TIPOS_USUARIOS = [
        self::ADMINISTRADOR => 'Administrador',
        self::GERENTE => 'Gerente',
        self::OPERADOR => 'Operador'
    ];

    const PERMISSOES_NEGADAS_OPERADOR = [
        'Usuarios' => [
            'index',
            'altera',
            'add',
            'ativaDesativa'
        ]
    ];

    const PERMISSOES_NEGADAS_GERENTE = [
        'Usuarios' => [
            'altera',
            'ativaDesativa',
            'add'
        ]
    ];

    const PERMISSOES_NEGADAS_ADMINISTRADOR = [];

    const PERMISSOES_ROLES = [
        self::ADMINISTRADOR => self::PERMISSOES_NEGADAS_ADMINISTRADOR,
        self::GERENTE => self::PERMISSOES_NEGADAS_GERENTE,
        self::OPERADOR => self::PERMISSOES_NEGADAS_OPERADOR
    ];

    protected function _setSenha($password)
    {
        if (strlen($password) > 0) {
            return (new \Cake\Auth\DefaultPasswordHasher())->hash($password);
        }
    }

    public function _getNomeSobrenome()
    {
        return $this->nome . ' ' . $this->sobrenome;
    }

    public function _getNomeTipoUsuario()
    {
        return self::TIPOS_USUARIOS[$this->role];
    }

    public function _getQtdeCadastrado($data1 = '', $data2 = '')
    {
        $where = array();
        $where[] = [
            'usuarios_id = ' => $this->id
        ];
        
        if(!empty($data1) && !empty($data2)) {
            $funcoesGerais = new FuncoesGerais();
            $where[] = ['criado >=' => $funcoesGerais->formataDataUsa($data1)];
            $where[] = ['criado <=' => $funcoesGerais->formataDataUsa($data2)];
        }
        
        return (TableRegistry::getTableLocator()->get('Cidadaos'))->find()
            ->where($where)
            ->count();
    }

    public function _getQtdeGeral($data1 = '', $data2 = '')
    {
        $where = array();
        $where[] = [
            'usuarios_id <> ' => 7
        ];
        
        if(!empty($data1) && !empty($data2)) {
            $funcoesGerais = new FuncoesGerais();
            $where[] = ['criado >=' => $funcoesGerais->formataDataUsa($data1)];
            $where[] = ['criado <=' => $funcoesGerais->formataDataUsa($data2)];
        }
        
        return (TableRegistry::getTableLocator()->get('Cidadaos'))->find()
            ->where($where)
            ->count();
    }

    public function _getPercCadastrado()
    {
        return (int) ($this->_getQtdeCadastrado() / $this->_getQtdeGeral() * 100);
    }
}
