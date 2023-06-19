<?php
session_start();
include('conexao.php');

$setor = $_SESSION['setor'];
$id = $_SESSION['id'];

$nivelRioDisabled = '';
$volumeChuvaDisabled = '';
$nivelReservatorioDisabled = '';

if($setor === 'nivel rio')
{
    $volumeChuvaDisabled = 'disabled';
    $nivelReservatorioDisabled = 'disabled';
}
else if($setor === 'Volume da Chuva')
{
    $nivelRioDisabled = 'disabled';
    $nivelReservatorioDisabled = 'disabled';
}
else if($setor === 'Nível do Reservatório')
{
    $nivelRioDisabled = 'disabled';
    $volumeChuvaDisabled = 'disabled';
}

if(isset($_POST['enviar']))
{
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {

        $nivelRio ='';
        if(isset($_POST["nivel_rio"]))
        {
            $nivelRio = $_POST["nivel_rio"];
        }

        $volumeChuva = '';

        if(isset($_POST["volume_chuva"]))
        {
            $volumeChuva = $_POST["volume_chuva"];
        }

        $nivelReservatorio = '';

        if(isset($_POST["nivelReservatorio"]))
        {
            $nivelReservatorio = $_POST["nivelReservatorio"];
        }

        $sql = "INSERT INTO dados(nivel_rio, nivel_chuva, nivel_reservatorio,id)
        VALUES ('$nivelRio', '$volumeChuva', '$nivelReservatorio', '$id')";

if (mysqli_query($conn, $sql)) {
    echo "Dados inseridos com sucesso";
} else {
    echo "Erro ao inserir dados: " . mysqli_error($conn);
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
    <meta name="description" content="Hidrocor - Coleta e organização de dados hidrometeorológicos da Agência Pernambucana de Águas e Clima">
    <title>Hidrocor - Preenchimento de Dados</title>
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
    background-image: url("assets/imgs/Hidrocor_Background.png");
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
    padding: 0px;
    max-width: 350px;
    background-color: #FFFFFF;
    margin-right: 0px;
    margin-left: 0px;
    margin-top: 0px;
    margin-bottom: 0px;	
    border-radius: 10px;
}

.mensagem_boasvindas {
    color:#585858;
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
    color:#585858;
    font-size: 16pt;
    text-align: center;
    letter-spacing: 2px;
    margin-top: 10%;
    margin-bottom: 10px;
    font-family: 'Bebas Neue', sans-serif;
         
}

.form_label {
    color: #585858;
    font-size: 14pt;
    text-align: left;
    letter-spacing: 2px;
    margin-left: 10%;
    margin-right: 0%;
    font-family: 'Bebas Neue', sans-serif;
    
}

.form_input {
    width: 80%;
    height: 50px;
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

.button {
    color: #ffffff;
    font-size: 16pt;
    text-align: center;
    letter-spacing: 3px;
    width: 80%;
    height: 50px;
    margin-top: 5px;
    margin-left: 10%;
    margin-bottom: 20px;
    padding: 10px;
    justify-content: center;
    border: none;
    border-radius: 10px;
    background-color: #5990ca;
    cursor: pointer;
    font-family: 'Bebas Neue', sans-serif;
}



.button:hover{
    background-color: #CADDF4;
    color:#5990ca;
}


.button_logout {
    color: #585858;
    font-size: 14pt;
    text-align: center;
    letter-spacing: 3px;
    width: 80%;
    height: 30px;
    margin-top: 0px;
    margin-left: 10%;
    margin-bottom: 20px;
    justify-content: center;
    border: none;
    border-radius: 10px;
    background-color: #fbc900;
    cursor: pointer;
    font-family: 'Bebas Neue', sans-serif;
}

.button_logout:hover{
    background-color: #F9EC9B;
    color:#585858;
}
</style>
<body>
     <form class="formulario">
        <div class="formulario_left">
            <h1 class="mensagem_boasvindas">Bem vindo ao sistema, <br><?php echo isset($_SESSION['nome']) ? $_SESSION['nome'] : '';?></h1>
            <h2 class="formulario_titulo">PREENCHA OS DADOS<h2>
            <label class="form_label <?php echo $nivelRioDisabled ?>" for="nivel_rio">NÍVEL DO RIO</label>
            <input class="form_input" type="text" placeholder="DIGITE O NÍVEL DO RIO" id="user_id" name="nivel_rio" <?php echo $nivelRioDisabled ?>>
            <label class="form_label <?php echo $volumeChuvaDisabled ?>" for="volume_chuva">VOLUME DA CHUVA</label>
            <input class="form_input" type="text" placeholder="DIGITE O VOLUME DA CHUVA" id="user_pass" name = "volume_chuva" <?php echo $volumeChuvaDisabled ?>>
            <label class="form_label <?php echo $nivelReservatorioDisabled ?>" for="nivel_reservatorio">NÍVEL DO RESERVATÓRIO</label>
            <input class="form_input" type="text" placeholder="DIGITE O NÍVEL DO RESERVATÓRIO" id="user_pass" name="nivelReservatorio" <?php echo $nivelReservatorioDisabled ?>>
            <button type="submit" class="button" id="enviar">ENVIAR</button>
            <button type="submit" name="logout" class="button_logout"><a href="logout.php">SAIR</a></button>
         </div>
     </form>
</body>
</html>
