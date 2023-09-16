<?php

namespace App\View\Helper;

use App\FuncoesGerais;
use Cake\View\Helper;

class FormatadorHelper extends Helper
{
    public function formatarCPF($cpf)
    {
        $cpf = substr($cpf, 0,3).'.'.substr($cpf, 3,3).'.'.substr($cpf, 6,3).'-'.substr($cpf, 9,2);
        return $cpf;
    }

    public function formatarCNPJ($cnpj)
    {
        $cnpj = substr($cnpj, 0,2).'.'.substr($cnpj, 2,3).'.'.substr($cnpj, 5,3).'/'.substr($cnpj, 8,4).'-'.substr($cnpj, 12,2);
        return $cnpj;
    }

    public function formatarCPFCNPJ($cpf_cnpj)
    {
        if(strlen($cpf_cnpj) == 14){
            return $this->formatarCNPJ($cpf_cnpj);     
        }else{
            return $this->formatarCPF($cpf_cnpj);    
        }
    }
    
    public function formatarCEP($cep)
    {
        if($cep){
            $cep = substr($cep, 0, 2) . '.' . substr($cep, 2, 3) . '-' . substr($cep, 5, 3);
        }
        return $cep; 
    }

    public function formatarTelefone($tel)
    {
        if($tel){
            $tel = '(' . substr($tel, 0, 2) . ')' . substr($tel, 2, 4) . '-' . substr($tel, 6, 4);
        }
        return $tel;
    }

    public function formatarCelular($cel)
    {
        if($cel)
        {
            $cel = '(' . substr($cel, 0, 2) . ')' . substr($cel, 2, 1) . ' ' . substr($cel, 3, 4) . '-' . substr($cel, 7, 4);
        }
        return $cel;
    }

    public function formatarInscricaoMunicipal($insc)
    {
        $insc = substr($insc, 0, 6) .'-'.substr($insc, 6, 1);
        return $insc;
    }

    public function formatarNumeroNotaFiscal($numero)
    {
        $numero = str_pad($numero, 8, '0', STR_PAD_LEFT);
        return $numero;
    }
    
    public function formatarNumeroAlvara($numero)
    {
        $numero = str_pad($numero, 8, '0', STR_PAD_LEFT);
        return $numero;
    }
    
    public function formataCompetencia($competencia)
    {
       $competencia = (new FuncoesGerais())->formataDataUSA($competencia);
       return date('m/Y', strtotime($competencia));
    }

    public function formataDinheiroBr($valor)
	{
		$valor = number_format($valor, 2, ',', '.');
		return 'R$ ' . $valor;
    }
    
    public function formataDecimal($valor)
    {
        $valor = number_format($valor, 2, ',', '.');
        return $valor;
    }
    
    public function formataValorCambio($valor)
    {
        $valor = number_format($valor,3,',','.');
        return $valor;
    }
    
	public function formataDataBr($data)
	{
		if($data != '')
		{
			$ano = substr($data, 0,4);
			$mes = substr($data, 5,2);
			$dia = substr($data, 8,2);
			$data = $dia.'/'.$mes.'/'.$ano;
				
		}
		return $data;
	}

    public function formataDataHoraBr($data)
	{
		if($data != '')
		{
			$ano = substr($data, 0,4);
			$mes = substr($data, 5,2);
			$dia = substr($data, 8,2);
			$time = substr($data, 11,8);

			$data = $dia.'/'.$mes.'/'.$ano ." " .$time;
				
		}
		return $data;
	}

}