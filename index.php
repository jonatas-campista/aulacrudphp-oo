
<?php

include_once "./arquivos/conexao/Conexao.php";
include_once "./arquivos/dao/EmpregadoDao.php";
include_once "./arquivos/entidade/Empregado.php";

//instancia as classes
$empregado = new Empregado();
$empregadodao = new EmpregadoDao();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>CRUD Simples PHP</title>
    <style>
        .menu,
        thead {
            background-color: #bbb !important;
        }

        .row {
            padding: 10px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-light bg-light menu">
        <div class="container">
            <a class="navbar-brand" href="#">
                Aula CRUD PDO - PHP Com Banco de Dados
            </a>
        </div>
    </nav>
    <div class="container">
        <form action="arquivos/controller/Empregadocontroller.php" method="POST">
        <div class="row">

                <div class="col-md-3">
                    <label>Nome</label>
                    <input type="text" name="nome" value="" autofocus class="form-control" require />
                </div>
                <div class="col-md-5">
                    <label>telefone</label>
                    <input type="text" name="telefone" value="" class="form-control" require />
                </div>
                <div class="col-md-2">
                    <label>rg</label>
                    <input type="number" name="rg" value="" class="form-control" require />
                </div>
                <div class="col-md-2">
                    <label>cpf</label>
                    <input type="number" name="cpf" value="" class="form-control" require />
                </div>
                <div class="col-md-2">
                    <label>endereço</label>
                    <input type="number" name="endereco" value="" class="form-control" require />
                </div>

                <div class="form-group">
		<label class="col-sm-2">Imagem:</label>
		<input type="file" name="imagem" class="btn btn-primary" id="imagem">
		</div>

                
                <div class="col-md-2">
                    <br>
                    <button class="btn btn-primary" type="submit" name="cadastrar">Cadastrar</button>
                </div>
            </div>
            
        </form>
        <!-- tabela-->
        <hr>
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-hover">
                <thead>
                    <tr>
                        <th>matricula</th>
                        <th>Nome</th>
                        <th>telefone</th>
                        <th>rg</th>
                        <th>cpf</th>
                        <th>endereco</th>
                        <th>acoes</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($empregadodao->read() as $empregado) : ?>
                        <tr>
                            <td><?= $empregado->getMatricula() ?></td>
                            <td><?= $empregado->getNome() ?></td>
                            <td><?= $empregado->getTelefone() ?></td>
                            <td><?= $empregado->getRg() ?></td>
                            <td><?= $empregado->getCpf() ?></td>
                            <td><?= $empregado->getEndereco() ?></td>
                            
                            <td class="text-center">
                                <button class="btn  btn-warning btn-sm" data-toggle="modal" data-target="#editar><?= $empregado->getMatricula() ?>">
                                    Editar
                                </button>
                                <a href="arquivos/controller/Empregadocontroller.php?del=<?=$empregado->getMatricula()?>">
                                <button class="btn  btn-danger btn-sm" type="button">Excluir</button>
                                </a>
                            </td>
                        </tr>

                        <!--modal-->

                        <div class="modal fade" id="editar><?= $empregado->getMatricula() ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="arquivos/controller/EmpregadoController.php" method="POST">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <label>Nome</label>
                                                    <input type="text" name="nome" value="<?= $empregado->getNome() ?>" class="form-control" require />
                                                </div>
                                                <div class="col-md-7">
                                                    <label>telefone</label>
                                                    <input type="text" name="telefone" value="<?= $empregado->getTelefone() ?>" class="form-control" require />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label>Rg</label>
                                                    <input type="number" name="rg" value="<?= $empregado->getRg() ?>" class="form-control" require />
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Cpf</label>
                                                    <input type="number" name="cpf" value="<?= $empregado->getCpf() ?>" class="form-control" require />
                                                </div>
                                                <div class="col-md-3">
                                                    <label>endereço</label>
                                                    <input type="number" name="endereco" value="<?= $empregado->getEndereco() ?>" class="form-control" require />
                                                </div>
                                                
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <br>
                                                    <input type="hidden" name="matricula" value="<?= $empregado->getMatricula() ?>" />
                                                    <button class="btn btn-primary" type="submit" name="editar">Editar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        
                    <?php endforeach ?>
                </tbody>
            </table>
                  
        </div>
       
                  
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>