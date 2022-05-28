<?php 
    include "config.php";
    include DIR_PATH."./template/header.php";
    include DIR_PATH."./template/nav.php";
    require_once 'mail.php';
    if(isset($_POST['nome']) && !empty($_POST['nome']) &&
        isset($_POST['assunto']) && !empty($_POST['assunto']) &&
        isset($_POST['mensagem']) && !empty($_POST['mensagem'])){
        $assunto = $_POST['nome']." -- ".$_POST['assunto'];
        $mensagem = $_POST['mensagem'];
?>
<style>
    <?php include ".\\template\css\style.css";?>
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
<main>
        <section id="contato">
        <fieldset>
            <legend>Entre em contato pelo email</legend>
            <form action="envia.php" method="post">
                <div id="nomeRemetente">
                <label>Digite seu nome</label><br>
                <input type="text" name="nome" placeholder="Ex: Joaquim Pratos" required><br>
                </div>
                <div id="assuntoEmail">
                <label>Digite o assunto</label><br>
                <input type="text" name="assunto" placeholder="Ex: Currículo Vitae" required><br>
                </div>
                <div id="conteudoMensagem">
                <label>Digite sua mensagem</label><br>
                <textarea name="mensagem" id="textarea" cols="25" rows="3" placeholder="Insira sua mensagem" required></textarea><br><br>
                <input type="submit" value="Enviar" id="enviarEmail">
                <?php
                    if(send($assunto, $mensagem)){
                        echo "Mensagem enviada com sucesso";
                        }else{
                        echo "Erro, tente novamente";
                        }
                    }
                ?>
                </div>
            </form>
        </fieldset>
        </section>
</main>
<?php 
    require DIR_PATH."/template/footer.php";
?>
</body>
</html>
