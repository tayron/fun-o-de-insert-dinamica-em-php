<?php

/**
 * Método que cria sql de insert de forma dinamica
 * 
 * @param string $tabela Nome da tabela
 * @param array $colunas Nome das colunas da tabela
 * @param array $dados Dados a serem armazenados
 * 
 * @return string SQL de insert criada com as informações fornecidas
 * 
 * @throws Exception Lança exceção caso alguns dos parametros não seja informado
 */
function montarSQLInsert($tabela, array $colunas, array $dados)
{
    if(!$tabela){
        throw new Exception('Deve-se informar nome da tabela para criar sql de insert');
    }
    
    if(!$colunas){
        throw new Exception('As colunas da tabela deve ser informado para criar sql de insert');
    }
    
    if(!$dados){
        throw new Exception('Os dados devem ser informado para criar sql de insert');
    }    
    
	$listaColunas = implode(", " , $colunas);
	
	$listaDados = null;
	foreach($dados as $dado){
        
		foreach($dado as &$item){
			$item = mysql_real_escape_string($item);
		}

		$dadoString = implode("', '" , $dado);        
        
		$listaDados .= ($listaDados) ? ', ' : null;
		$listaDados .= "('$dadoString')";
	}
	
	return "INSERT INTO $tabela ($listaColunas) VALUES $listaDados";
}