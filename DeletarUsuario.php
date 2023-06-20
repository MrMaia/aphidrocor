<?php
include('conexao.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM usuario WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $nome = $row['nome'];
}

if (isset($_POST['excluir'])) {
    $sql = "DELETE FROM usuario WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: ListarUsuario.php");
    } else {
        echo "Erro ao excluir usuário: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hidrocor - Exclusão de Usuário</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:wght@300&display=swap');

    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: 'Bebas Neue', sans-serif;
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
        width: 350px;
        height: 500px;
        display: flex;
        align-items: center;
        border-radius: 10px;
        background-color: #FFFFFF;
        margin-right: 0px;
        margin-left: 0px;
        margin-top: 0px;
        margin-bottom: 0px;
        box-shadow: 5px 5px 5px 5px rgba(0, 0, 0, 0.1);

    }

    .formulario_left {
        padding: 0px;
        width: 350px;
        background-color: #FFFFFF;
        margin-right: 0px;
        margin-left: 0px;
        margin-top: 0px;
        margin-bottom: 0px;
        border-radius: 10px;
    }

    .formulario_titulo {
        color: #585858;
        text-align: center;
        letter-spacing: 2px;
        font-size: 16pt;
        margin-top: 5px;
        margin-bottom: 10px;
        font-family: 'Bebas Neue', sans-serif;
    }

    .mensagem_exclusao {
        color: #585858;
        text-align: center;
        letter-spacing: 2px;
        font-size: 14pt;
        margin-top: 10px;
        margin-bottom: 10px;
        margin-right: 20px;
        margin-left: 20px;
        font-family: 'Open Sans', sans-serif;
    }

    .form_label {
        color: #585858;
        font-size: 12pt;
        text-align: left;
        letter-spacing: 2px;
        margin-left: 10%;
        margin-right: 0%
    }

    .form_input {
        width: 80%;
        height: 40px;
        background: #e0dedf;
        color: #585858;
        letter-spacing: 2px;
        border: none;
        border-radius: 10px;
        outline: none;
        margin-left: 10%;
        margin-bottom: 10px;
        margin-right: 10%;
        padding: 10px;
        font-family: 'Bebas Neue', sans-serif;
    }

    .permissao_label {
        color: #585858;
        font-size: 12pt;
        text-align: left;
        letter-spacing: 2px;
        margin-left: 10%;
        margin-right: 0%;
        font-family: 'Bebas Neue', sans-serif;
    }

    .form-select {
        width: 80%;
        height: 40px;
        background: #fbc900;
        color: #585858;
        letter-spacing: 2px;
        border: none;
        border-radius: 10px;
        outline: none;
        margin-left: 10%;
        margin-bottom: 10px;
        margin-right: 10%;
        padding: 10px;
    }

    .acesso_label {
        color: #585858;
        font-size: 12pt;
        text-align: left;
        letter-spacing: 2px;
        margin-left: 10%;
        margin-right: 0%;
        font-family: 'Bebas Neue', sans-serif;
    }


    .button {
        color: #ffffff;
        font-size: 16pt;
        text-align: center;
        letter-spacing: 3px;
        width: 80%;
        height: 40px;
        margin-top: 10px;
        margin-left: 10%;
        margin-bottom: 10px;
        justify-content: center;
        border: none;
        border-radius: 10px;
        background-color: #5990ca;
        cursor: pointer;
    }

    .button:hover {
        background-color: #CADDF4;
        color: #5990ca;
    }

    .button_voltar {
        color: #5990ca;
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
        background-color: #CADDF4;
        cursor: pointer;
    }

    .button_voltar:hover {
        background-color: #5990ca;
        color: #ffffff;
    }
</style>

<body>
    <main>
        <div class="formulario">
            <form method="POST" class="formulario_left" action="DeletarUsuario.php?id=<?php echo $id; ?>">
                <h1 class="formulario_titulo">EXCLUIR USUÁRIO</h1>
                <p class="mensagem_exclusao">Tem certeza que deseja excluir: <?php echo $nome; ?>?</p>
                <button type="submit" class="button" name="excluir">Excluir usuário</button>
                <button type="submit" class="button_voltar" id="voltar"><a href="ListarUsuario.php">Voltar</a></button>
            </form>
        </div>
    </main>
</body>
</html>