<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuarios = simplexml_load_file("usuarios.xml");
    foreach ($usuarios->usuario as $u) {
        if ($u->email == $POST['email'] && $u->senha == md5($_POST['senha'])) {
            $_SESSION['usuario'] = (string) $u->email;
            echo "Loguin realizado com sucesso! <a href='criar_topico.php'>Criar tópico</a>";
            exit;
        }
    } echo "Login inválido!";
} else {
?>

    <form method="post">
        Email: <input type="email" nome="email" required><br>
        Senha: <input type="password" nome="senha" required><br>
        <button type="submit">Entrar</button>
    </form>
<?php } 