<?php
include('conexao.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM usuario WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $nome = $row['nome'];
    $senha = $row['senha'];
    $telefone = $row['telefone'];
    $setor = $row['setor'];
    $permissao = $row['permissao'];
    $mensagem = '';
}

if (isset($_POST['enviar'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"];
        $senha = $_POST["senha"];
        $telefone = $_POST["telefone"];
        $setor = $_POST["setor"];
        $permissao = $_POST["permissao"];

        $sql = "UPDATE usuario SET nome='$nome', senha='$senha', telefone='$telefone', setor='$setor', permissao='$permissao' WHERE id='$id'";

        if (mysqli_query($conn, $sql)) {
            echo "Dados atualizados com sucesso!!!";
        } else {
            $mensagem =  "Erro ao atualizar dados: " . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hidrocor - Cadastro de Usuário</title>
    <link rel="stylesheet" href="css/usuario.css">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');

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
        max-width: 350px;
        max-height: 500px;
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
        max-width: 350px;
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
        margin-top: 5%;
        margin-bottom: 10px;
        font-family: 'Bebas Neue', sans-serif;
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
            <form method="POST" class="formulario_left" action="EditarUsuario.php?id=<?php echo $id; ?>">
                <h1 class="formulario_titulo">EDITAR USUÁRIO</h1>
                <p><?php $mensagem 
                ?></p>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <label class="form_label" for="nome">NOME</label>
                <input class="form_input" type="text" placeholder="Nome Completo" name="nome" id="nome" value="<?php echo $nome; ?>">
                <label class="form_label" for="telefone">TELEFONE</label>
                <input class="form_input" type="number" placeholder="Número de Telefone" name="telefone" id="telefone" value="<?php echo $telefone; ?>">
                <label class="form_label" for="senha">SENHA</label>
                <input class="form_input" type="password" placeholder="Crie uma Senha" name="senha" id="senha" value="<?php echo $senha; ?>">
                <label class="permissao_label" for="setor">ESCOLHA O SETOR</label>
                <select class="form-select" name="setor" id="setor">
                    <option selected></option>
                    <option value="nivel rio" <?php if ($setor == 'nivel rio') echo 'selected'; ?>>Nível do Rio</option>
                    <option value="Volume da Chuva" <?php if ($setor == 'Volume da Chuva') echo 'selected'; ?>>Volume da Chuva</option>
                    <option value="Nível do Reservatório" <?php if ($setor == 'Nível do Reservatório') echo 'selected'; ?>>Nível do Reservatório</option>
                    <option value="Todos os campos" <?php if ($setor == 'Todos os campos') echo 'selected'; ?>>Todos os campos</option>
                </select>
                <label class="acesso_label" for="permissao">ESCOLHA O ACESSO</label>
                <select class="form-select" name="permissao" id="permissao">
                    <option selected></option>
                    <option value="0" <?php if ($permissao == '0') echo 'selected'; ?>>Usuário</option>
                    <option value="1" <?php if ($permissao == '1') echo 'selected'; ?>>Administrador</option>
                </select>
                <button type="submit" class="button" name="enviar">Salvar</button>
                <button class="button_voltar"><a href="paineladmin.php">Voltar</a></button>
            </form>
        </div>
    </main>
</body>
</html>