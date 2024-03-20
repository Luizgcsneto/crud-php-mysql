<h1>Listar usuarios</h1>

<?php 
    $query = "SELECT * FROM usuarios where created_at is null";
    $stmt = $conn->prepare($query);

    $stmt->execute();

    $result = $stmt->get_result();

    $qtd = $result->num_rows;

    if($qtd > 0){
        print "<table class='table table-hover table-striped table-bordered'>";
        print "<tr>";
            print "<th>#</th>";
            print "<th>Nome</th>";
            print "<th>E-mail</th>";
            print "<th>Nascimento</th>";
            print "<th>Opções</th>";
        print "</tr>";
        while($row = $result->fetch_object()){
            print "<tr>";
                print "<td>".$row->id."</td>";
                print "<td>".$row->nome."</td>";
                print "<td>".$row->email."</td>";
                print "<td>".$row->data_nascimento."</td>";
                print "<td>
                            <button onclick=\"location.href='?page=editar&id=".$row->id."' \" 
                            class='btn btn-warning'>Editar</button>
                            <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){
                                location.href='?page=salvar&acao=deletar&id=".$row->id."' }
                                else{false;}\" class='btn btn-danger'>Excluir</button>
                        </td>";
            print "</tr>";
        }
        print "</table>";
    } else {
        print "<p class='alert alert-danger'>Não encontrou resultados</p>";
    }



?>
