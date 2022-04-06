<?php
    include_once "../conexao/Conexao.php";
    include_once "../entidade/Empregado.php";
    include_once "../dao/EmpregadoDao.php";

    //instanciar as classes
    $empregado = new Empregado();
    $empregadodao = new EmpregadoDao();

    //pegar todos dados pelo metodo post
    $d = filter_input_array(INPUT_POST);

    if(isset($_POST['cadastrar'])){
        $empregado->setNome($d['nome']);
        $empregado->setTelefone($d['telefone']);
        $empregado->setRg($d['rg']);
        $empregado->setCpf($d['cpf']);
        $empregado->setEndereco($d['endereco']);

        $empregadodao->create($empregado);

        header("Location:../../");

    }elseif (isset($_POST['editar'])) {

        $empregado->setNome($d['nome']);
        $empregado->setTelefone($d['telefone']);
        $empregado->setRg($d['rg']);
        $empregado->setCpf($d['cpf']);
        $empregado->setEndereco($d['endereco']);
        $empregado->setMatricula($d['matricula']);

        $empregadodao->update($empregado);

        header("Location:../../");

    }elseif (isset($_GET['del'])) {
        $empregado->setMatricula($_GET['del']);
        $empregadodao->delete($empregado);
        header("Location:../../");

    }else{
        
        header("Location:../../");
    }
    ?>