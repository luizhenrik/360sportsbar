<?php

/*
 * ***********************************************
 * Objetivo:     Classe com os metodos p/ a tela de
 *               Bebidas
 *               
 * Created on :  20/02/2014
 * Author     :  Naelson Matheus Jr
 * 
 * ***********************************************
 * Updates
 * 
 * Created on :  DD/MM/YYYY
 * Author     :  
 * Description:     
 * 
 */

class Fotos extends Functions {

    private static $_tbName = 'FOTOS';
    private static $_pkName = 'ID_FOTO';
    private static $_GaleriatbName = 'GALERIAS';

    /* LISTAGEM COMPLETA DE USUÁRIOS */

    public static function listar($columns = null, $joins = null) {
        return Functions::all(self::$_tbName, $columns, $joins);
    }

    public static function inserir($dados) {
        return Functions::Insert(self::$_tbName, $dados);
    }

    public static function atualizar($dados, $condicoes) {
        return Functions::Update(self::$_tbName, $dados, $condicoes);
    }

    public static function remover($condicoes) {
        return Functions::Delete(self::$_tbName, $condicoes);
    }

    public static function carregaArquivo($condicoes) {
        return Functions::uploadFile(self::$_tbName, $condicoes);
    }

    public static function selectOptionGalerias() {
        $sql = "    SELECT  ID_GALERIA,TITULO "
                . " FROM    " . self::$_GaleriatbName . " "
                . " WHERE   1 = 1 "
                . " AND     ATIVO = 1 "
                . " ORDER BY TITULO ASC ";

        $exec = Functions::querySQL($sql);

        $options = "";

        foreach ($exec as $key => $value)
            $options .= "<option value='{$value['ID_GALERIA']}'>{$value['TITULO']}</option>";

        return $options;
    }

}
