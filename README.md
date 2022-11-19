### Para iniciar o servidor:
<code>\php -S localhost:(porta desejada) -t public</code>

## Criação do banco de dados:
É somente copiar o conteúdo de alunos.sql e rodar no workbench ou shell do MySQL,
para que possa realizar a criação da tabela.

Para rodar no seu proprio banco de dados altere as variaveis no arquivo conexao.php que está dentro da pasta connection no seu host em "$servidor", nome de usuario em "$usuario", sua senha pessoal em "$senha" e o nome do seu banco/schema em "$banco".

# Adicionando dados:
Na pagina inicial clique em "novo" e você será redirecionado a página "novo", onde é só inserir os dados de nome, matricula e cidade no formulario e clicar em enviar e automaticamente redirecionará você para a página de listar. Porém existem validações, caso nome tenha menos de 3 caracteres, matricula com menos de 6 digitos, ou cidade com menos de 3 caracteres, será exibido um pop-up de erro e não será adicionado quaisquer dados.

Caso aconteça o erro "PDO not found" renomeie dentro da pasta de instalação do seu PHP procure o arquivo php.ini-development para php.ini e entre no arquivo utilizando o seu Visual Studio Code. Nas linhas 928 onde tem <code>;extension=mysqli</code> retire o ";" e na linha 934 onde tem <code>;extension=pdo_mysql</code> retire o ";", salve e rode o servidor novamente.
