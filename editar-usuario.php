<h1>Editar usuarios</h1>
<?php
    $query = "SELECT * FROM usuarios where id = ? limit 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $_REQUEST["id"]);
    $stmt->execute();

    $result = $stmt->get_result();

    $row = $result->fetch_object();
?>
<form action="?page=salvar" method="POST">
<input type="hidden" name="acao" value="editar">
<input type="hidden" name="id" value="<?php print $row->id; ?>">
    <div class="mb-3">
        <label for="">Nome</label>
        <input type="text" name="nome" class="form-control" value="<?php print $row->nome; ?>">
    </div>
    <div class="mb-3">
        <label for="">E-mail</label>
        <input type="email" name="email" class="form-control" value="<?php print $row->email; ?>">
    </div>
    <div class="mb-3">
        <label for="">Senha</label>
        <input type="password" name="senha" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="">Data nascimento</label>
        <input type="date" name="data_nascimento" class="form-control" value="<?php print $row->data_nascimento; ?>">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">
            Enviar
        </button>
    </div>
</form>



