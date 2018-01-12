# Funcao de insert dinamica em PHP

<br /><br />

Sempre que trabalho com sistema legado, vira e mexe praciso criar uma fun��o gen�rica que 
gere sql de insert dinamico, baseado em uma lista de dados a serem inseridos. 
Todas as vezes que preciso acabo criando do zero e desta vez resolvi armazenar e 
tamb�m compartilhar com quem possa precisar.

<br /><br />

Fun��o mysql_real_escape_string foi usada para tratamento de string devido vers�o 
atual do PHP, pode ser substituida por outra conforme o ambiente.

<br /><br />

# Uso da fun��o
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

<br /><br />

Saida do m�todo abaixo ser�: <br />
```INSERT INTO contato (nome, telefone) SET ('nome', 'telefone'), ('nome', 'telefone'), ('nome', 'telefone'), ('nome', 'telefone')```