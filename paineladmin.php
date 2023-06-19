<?php 
session_start();
include("conexao.php");

?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Hidrocor - Coleta e organização de dados hidrometeorológicos da Agência Pernambucana de Águas e Clima">
    <title>Hidrocor - Painel de Administração</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:wght@300&display=swap');

    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: 'Bebas Neue', sans-serif;
        font-family: 'Open Sans', sans-serif;
    }

    body {
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-image: url('assets/imgs/Hidrocor_Background.png');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }

    .formulario {
        max-width: 350px;
        display: flex;
        align-items: center;
        flex-direction: column;
        border-radius: 10px;
        background-color: #FFFFFF;
        margin-right: 0px;
        margin-left: 0px;
        margin-top: 0px;
        margin-bottom: 0px;
        box-shadow: 5px 5px 5px 5px rgba(0, 0, 0, 0.1);
    }

    .formulario_left {
        max-width: 350px;
        padding: 0px;
        background-color: #FFFFFF;
        border-radius: 10px;
        margin-right: 0px;
        margin-left: 0px;
        margin-top: 0px;
        margin-bottom: 0px;

    }

    .mensagem_boasvindas {
        color: #585858;
        text-align: center;
        letter-spacing: 2px;
        margin-top: 20px;
        margin-left: 10%;
        margin-bottom: 10px;
        margin-right: 10%;
        font-size: 14pt;
        text-align: center;
        font-family: 'Open Sans', sans-serif;
    }

    .formulario_titulo {
        color: #585858;
        font-size: 16pt;
        letter-spacing: 2px;
        text-align: center;
        letter-spacing: 3px;
        margin-top: 5%;
        margin-bottom: 5px;
        font-family: 'Bebas Neue', sans-serif;
    }


    .button {
        color: #ffffff;
        font-size: 16pt;
        text-align: center;
        letter-spacing: 3px;
        width: 80%;
        height: 50px;
        margin-top: 10px;
        margin-left: 10%;
        margin-left: 10%;
        margin-bottom: 20px;
        justify-content: center;
        border: none;
        border-radius: 10px;
        background-color: #5990ca;
        cursor: pointer;
        font-family: 'Bebas Neue', sans-serif;
    }

    .button:hover {
        background-color: #CADDF4;
        color: #5990ca;
    }

    .button_logout {
        color: #585858;
        font-size: 14pt;
        text-align: center;
        letter-spacing: 3px;
        width: 80%;
        height: 30px;
        margin-top: 10px;
        margin-left: 10%;
        margin-bottom: 20px;
        justify-content: center;
        border: none;
        border-radius: 10px;
        background-color: #fbc900;
        cursor: pointer;
        font-family: 'Bebas Neue', sans-serif;
    }

    .button_logout:hover {
        background-color: #F9EC9B;
        color: #585858;
    }
</style>

<body>
    <div class="formulario">
        <div class="formulario_left">
            <h1 class="mensagem_boasvindas">Bem vindo ao sistema, <br><?php echo isset($_SESSION['nome']) ? $_SESSION['nome'] : '';?></h1>
            <h2 class="formulario_titulo">CONFIGURAÇÕES DE USUÁRIO</h2>
            <a href="CadastrarUsuario.php"><button class="button">Criar Usuário</button></a>
            <a href="ListarUsuario.php"><button class="button">Listar Usuários</button></a>
            <h2 class="formulario_titulo">CONFIGURAÇÕES DE DADOS</h2>
            <a href="ListarDados.php"><button class="button">Listar Dados</button></a>
            <a href="exportarDados.php"><button class="button">Exportar Dados(.csv)</button></a>
            <form method="post" action="logout.php">
                <button type="submit" name="logout" class="button_logout">Sair</button>
            </form>
        </div>
    </div>
</body>

</html>