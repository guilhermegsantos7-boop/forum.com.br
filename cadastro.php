<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$usuarios = simplexml_load_file("usuarios.xml");
$novo = $usuarios->addChild("usuario");
$novo->addChild("nome", $_POST['nome']);
$novo->addChild("celular", $_POST['celular']);
$novo->addChild("email", $_POST['email']);
$novo->addChild("senha", md5($_POST['senha']));
$usuarios->asXML("usuarios.xml");
echo "Usuário cadastrado com sucesso! <a href='loguin.php'>Fazer loguin</a>";
} else {
?>
   <form method="post">
    Nome: <input type="text" nome="nome" required><br>
    Celular: <input type="text" name="celular" required><br>
    Email: <input type="email" name="email" required><br>
    Senha: <input type="password" name="senha" required><br>
    <button type="submit">Cadastrar</button>
</form>
<?php } ?>