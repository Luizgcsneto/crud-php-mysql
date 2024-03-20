<?php

switch($_REQUEST['acao']){
    case 'cadastrar':
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha =  password_hash($_POST['senha'], PASSWORD_DEFAULT);
        $data_nascimento = $_POST['data_nascimento'];

        $sql = "INSERT INTO usuarios (nome,email,senha,data_nascimento) VALUES (?,?,?,?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $nome,$email,$senha,$data_nascimento);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($stmt == true){
            print "<script>alert('Usuário cadastrado com sucesso');</script>";
            print "<script>location.href='?page=listar';</script>";
        }else{
            print "<script>alert('Não foi possível cadastrar');</script>";
            print "<script>location.href='?page=listar';</script>";
        }

    break;
    case 'editar':
        $id = $_REQUEST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha =  password_hash($_POST['senha'], PASSWORD_DEFAULT);
        $data_nascimento = $_POST['data_nascimento'];

        $sql = "UPDATE usuarios 
                set nome = ?,
                    email = ?,
                    senha = ?,
                    data_nascimento = ? 
                where id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $nome,$email,$senha,$data_nascimento,$id);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($stmt == true){
            print "<script>alert('Usuário atualizado com sucesso');</script>";
            print "<script>location.href='?page=listar';</script>";
        }else{
            print "<script>alert('Não foi possível atualizar');</script>";
            print "<script>location.href='?page=listar';</script>";
        }

    break;
    case 'deletar':
        $id = $_REQUEST['id'];

        $sql = "UPDATE usuarios 
        set created_at = NOW()
        where id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($stmt == true){
            print "<script>alert('Usuário deletado com sucesso');</script>";
            print "<script>location.href='?page=listar';</script>";
        }else{
            print "<script>alert('Não foi possível deletar');</script>";
            print "<script>location.href='?page=listar';</script>";
        }

        
        break;
}
