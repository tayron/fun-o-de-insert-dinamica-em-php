# Função de insert dinamica em PHP

<br />

Sempre que trabalho com sistema legado, vira e mexe praciso criar uma função genérica que 
gere sql de insert dinamico, baseado em uma lista de dados a serem inseridos. 
Todas as vezes que preciso acabo criando do zero e desta vez resolvi armazenar e 
também compartilhar com quem possa precisar.

<br />

Função mysql_real_escape_string foi usada para tratamento de string devido versão 
atual do PHP, pode ser substituida por outra conforme o ambiente.

<br /><br />

# Uso da função
```PHP
$listaDados = array(
	array('Pedro', '11111'),
	array('Maria', '22222'),
	array('Cristina', '33333'),
	array('Carlos', '44444')
);

try{
    echo montarSQLInsert('contato', array('nome', 'telefone'), $listaDados);
}catch(Exception $e){
    echo $e->getMessage();
}

```

<br />

Saida do método abaixo será: <br />
```INSERT INTO contato (nome, telefone) VALUES ('Pedro', '11111'), ('Maria', '22222'), ('Cristina', '33333'), ('Carlos', '44444')```