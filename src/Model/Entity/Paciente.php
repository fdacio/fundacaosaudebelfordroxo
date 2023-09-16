<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
use App\FuncoesGerais;

/**
 * Aluno Entity
 *
 * @property int $id
 * @property string $nome
 * @property \Cake\I18n\FrozenDate $nascimento
 * @property bool $menor
 * @property string|null $termo_responsabilidade
 * @property string $endereco
 * @property string $numero
 * @property string|null $complemento
 * @property string $bairro
 * @property string $cep
 * @property string $cidade
 * @property string $uf
 * @property string|null $telefone
 * @property string|null $celular
 * @property string|null $whatsapp
 * @property int $usuarios_1
 * @property int $usuarios_2
 * @property bool $status
 * @property \Cake\I18n\FrozenTime $criado
 * @property \Cake\I18n\FrozenTime $alterado
 */
class Paciente extends Entity
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
        'nascimento' => true,
        'cpf' => true,
        'sus' => true,
        'endereco' => true,
        'numero' => true,
        'complemento' => true,
        'bairro' => true,
        'cep' => true,
        'cidade' => true,
        'uf' => true,
        'telefone' => true,
        'whatsapp' => true,
        'email' => true,
        'usuarios_id' => true,
        'usuarios_id_2' => true,
        'status' => true,
        'criado' => true,
        'alterado' => true
    ];
    
    public function _getEnderecoCompleto()
    {
        $endereco = '';
        $funcoesGerais = new FuncoesGerais();
        if ($this->endereco) {
            $endereco .= $this->endereco . ' , ';
        }
        
        if ($this->numero) {
            $endereco .= $this->numero . ' - ';
        }
        
        if ($this->bairro) {
            $endereco .= $this->bairro . ' - ';
        }
        
        if ($this->cep) {
            $endereco .= $funcoesGerais->formataCep($this->cep) . ' - ';
        }
        
        if ($this->cidade) {
            $endereco .= $this->cidade;
        }
        
        return $endereco;
    }
    
    public function _getUsuario()
    {
        return (TableRegistry::getTableLocator()->get('Usuarios'))->get($this->usuarios_1);
    }
    
    public function _getUsuario2()
    {
        return (TableRegistry::getTableLocator()->get('Usuarios'))->get($this->usuarios_2);
    }
        
    public function _getIdade()
    {
        $data = $this->nascimento->format('Y-m-d');
        
        list($ano, $mes, $dia) = explode('-', $data);
        
        $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
        
        $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);
        
        $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
        
        return $idade;
        
    }
    
}
