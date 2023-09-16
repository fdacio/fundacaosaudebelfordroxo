<?php

namespace App;

class FuncoesGerais
{

    public function mesPorNumero($numero)
    {
        $nomeMes = '';
        if ($numero == 1) {
            $nomeMes = 'Janeiro';
        } else if ($numero == 2) {
            $nomeMes = 'Fevereiro';
        } else if ($numero == 3) {
            $nomeMes = 'Março';
        } else if ($numero == 4) {
            $nomeMes = 'Abril';
        } else if ($numero == 5) {
            $nomeMes = 'Maio';
        } else if ($numero == 6) {
            $nomeMes = 'Junho';
        } else if ($numero == 7) {
            $nomeMes = 'Julho';
        } else if ($numero == 8) {
            $nomeMes = 'Agosto';
        } else if ($numero == 9) {
            $nomeMes = 'Setembro';
        } else if ($numero == 10) {
            $nomeMes = 'Outubro';
        } else if ($numero == 11) {
            $nomeMes = 'Novembro';
        } else if ($numero == 12) {
            $nomeMes = 'Dezembro';
        }
        return $nomeMes;
    }

    public function formataCpf($cpf)
    {
        $formatado = substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);
        return $formatado;
    }
    public function formataCep($cep)
    {
        $formatado = substr($cep, 0, 2) . '.' . substr($cep, 2, 3) . '-' . substr($cep, 5, 3);
        return $formatado;
    }

    public function formataTelefone($telefone)
    {
        $formatado = '(' . substr($telefone, 0, 2) . ')' . substr($telefone, 2, 4) . '-' . substr($telefone, 6, 4);
        return $formatado;
    }

    function validaCPF($cpf = null)
    {

        // Verifica se um número foi informado
        if (empty($cpf)) {
            return false;
        }

        // Elimina possivel mascara
        $cpf = preg_replace("/[^0-9]/", "", $cpf);
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

        // Verifica se o numero de digitos informados é igual a 11 
        if (strlen($cpf) != 11) {
            return false;
        }
        // Verifica se nenhuma das sequências invalidas abaixo 
        // foi digitada. Caso afirmativo, retorna falso
        else if (
            $cpf == '00000000000' ||
            $cpf == '11111111111' ||
            $cpf == '22222222222' ||
            $cpf == '33333333333' ||
            $cpf == '44444444444' ||
            $cpf == '55555555555' ||
            $cpf == '66666666666' ||
            $cpf == '77777777777' ||
            $cpf == '88888888888' ||
            $cpf == '99999999999'
        ) {
            return false;
            // Calcula os digitos verificadores para verificar se o
            // CPF é válido
        } else {

            for ($t = 9; $t < 11; $t++) {

                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{
                        $c} * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf{
                    $c} != $d) {
                    return false;
                }
            }

            return true;
        }
    }

    public function desformataCep($cep)
    {
        $cep = str_replace('-', '', $cep);
        return $cep;
    }

    public function desformataCpf($cpf)
    {
        $cpf = str_replace(array('-', '.'), '', $cpf);
        return $cpf;
    }

    public function desformataTelefone($telefone)
    {
        $telefone = str_replace(array('(', ')', '-', ' '), '', $telefone);
        return $telefone;
    }

    /*
     * Método para converter data em formato USA
     * Recebe uma data no formato dd/mm/yyyy
     * Retorna uma data no formato yyyy-mm-dd
     */

    public function formataDataUsa($data)
    {
        $dia = substr($data, 0, 2);
        $mes = substr($data, 3, 2);
        $ano = substr($data, 6, 4);
        return $ano . '-' . $mes . '-' . $dia;
    }

    /*
     * Recebe no formato yyyy-mm-dd
     * Retorna uma data no formato dd/mm/yyyy
     */
    public function formataDataBr($data)
    {
        $ano = substr($data, 0, 4);
        $mes = substr($data, 5, 2);
        $dia = substr($data, 0, 2);
        return $dia . '/' . $mes . '/' . $ano;
    }

    public function codificar($str)
    {
        $prfx = array(
            'AFVxaIF', 'Vzc2ddS', 'ZEca3d1', 'aOdhlVq', 'QhdFmVJ', 'VTUaU5U',
            'QRVMuiZ', 'lRZnhnU', 'Hi10dX1', 'GbT9nUV', 'TPnZGZz', 'ZGiZnZG',
            'dodHJe5', 'dGcl0NT', 'Y0NeTZy', 'dGhnlNj', 'azc5lOD', 'BqbWedo',
            'bFmR0Mz', 'Q1MFjNy', 'ZmFMkdm', 'dkaDIF1', 'hrMaTk3', 'aGVFsbG'
        );
        for ($i = 0; $i < 3; $i++) {
            $str = $prfx[array_rand($prfx)] . strrev(base64_encode($str));
        }
        $str = strtr(
            $str,
            "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789",
            "a8rqxPtfiNOlYFGdonMweLCAm0TXERcugBbj79yDVIWsh3Z5vHS46pQzKJ1Uk2"
        );
        return $str;
    }

    public function decodificar($str)
    {
        $str = strtr(
            $str,
            "a8rqxPtfiNOlYFGdonMweLCAm0TXERcugBbj79yDVIWsh3Z5vHS46pQzKJ1Uk2",
            "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789"
        );
        for ($i = 0; $i < 3; $i++) {
            $str = base64_decode(strrev(substr($str, 7)));
        }
        return $str;
    }
}
