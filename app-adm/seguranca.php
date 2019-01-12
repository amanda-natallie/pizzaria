<?php 
$_SG['conectaServidor'] = true;    // Abre uma conexão com o servidor MySQL?
$_SG['abreSessao'] = true;         // Inicia a sessão com um session_start()?
$_SG['caseSensitive'] = false;     // Usar case-sensitive? Onde 'thiago' é diferente de 'THIAGO'
$_SG['validaSempre'] = true;       // Deseja validar o usuário e a senha a cada carregamento de página?
$_SG['paginaLogin'] = 'login.php'; // Página de login



// Verifica se precisa fazer a conexão com o MySQL

if ($_SG['conectaServidor'] == true) {
 require("config.php"); 
 
}

// Verifica se precisa iniciar a sessão

if ($_SG['abreSessao'] == true) {
session_start();
ini_set('default_charset','UTF-8');

}


function validaUsuario($usuario, $senha) {

global $_SG;
$cS = ($_SG['caseSensitive']) ? 'BINARY' : '';
// Usa a função addslashes para escapar as aspas
$nusuario = addslashes($usuario);
$nsenha = md5(addslashes($senha));

// Monta uma consulta SQL (query) para procurar um usuário

    require("config.php"); 
    $sql = 'SELECT * FROM tbl_usuario WHERE usuario = "'. $nusuario.'" AND senha = "'. $nsenha . '" LIMIT 1';  

    try{
        
        $read = $db->prepare($sql);
        $read->execute();

    } catch (PDOException $ex) {
        echo 'Erro ao Buscar Login! - ' . $ex->getMessage();
    }
    
    $rs = $read->fetch(PDO::FETCH_OBJ);
    

if (empty($rs)) {
    
}else
{
    $tipo = 1;
}

// Verifica se encontrou algum registro
if (empty($rs)) {
// Nenhum registro foi encontrado => o usuário é inválido
return false;
} else {
// O registro foi encontrado => o usuário é valido
// Definimos dois valores na sessão com os dados do usuário
$_SESSION['usuarioTipo'] = $tipo; 
$_SESSION['usuarioID'] = $rs->id;// Pega o valor da coluna 'id do registro encontrado no MySQL
$_SESSION['usuarioNome'] = $rs->nome; // Pega o valor da coluna 'nome' do registro encontrado no MySQL

// Verifica a opção se sempre validar o login
if ($_SG['validaSempre'] == true) {

// Definimos dois valores na sessão com os dados do login
$_SESSION['usuarioLogin'] = $usuario;
$_SESSION['usuarioSenha'] = $senha;
}
return true;
}

}


/**
094
* Função que protege uma página
095
*/

function protegePagina() {

global $_SG;


if (!isset($_SESSION['usuarioID']) OR !isset($_SESSION['usuarioNome'])) {
// Não há usuário logado, manda pra página de login
expulsaVisitante();
} else if (!isset($_SESSION['usuarioID']) OR !isset($_SESSION['usuarioNome'])) {
// Há usuário logado, verifica se precisa validar o login novamente
if ($_SG['validaSempre'] == true) {
// Verifica se os dados salvos na sessão batem com os dados do banco de dados
if (!validaUsuario($_SESSION['usuarioLogin'], $_SESSION['usuarioSenha'])) {
// Os dados não batem, manda pra tela de login
expulsaVisitante();
}
}
}
}
 
/**
115
* Função para expulsar um visitante
116
*/
function expulsaVisitante() {
global $_SG;
 
// Remove as variáveis da sessão (caso elas existam)
unset($_SESSION['usuarioID'], $_SESSION['usuarioNome'], $_SESSION['usuarioLogin'], $_SESSION['usuarioSenha']);
 
// Manda pra tela de login
echo" <script>document.location.href='login.php'</script>";
}