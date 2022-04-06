<?php
class EmpregadoDao{
    public function create(Empregado $empregado){
        try{
            $sql = "insert into funcionario(nome,telefone,rg,cpf,endereco)values(:nome,:telefone,:rg,:cpf,:endereco)";
            $p_sql = Conexao::getConexao()->prepare($sql);
                $p_sql->bindValue(":nome",$empregado->getNome());
                $p_sql->bindValue(":telefone",$empregado->getTelefone());
                $p_sql->bindValue(":rg",$empregado->getRg());
                $p_sql->bindValue(":cpf",$empregado->getCpf());
                $p_sql->bindValue(":endereco",$empregado->getEndereco());


                

                return $p_sql->execute();

        }catch(exception $e){

            print "erro ao inserir usuario <br>".$e."<br>";

        }


    }
    //fazer a leitura
    public function read(){
        try{
            $sql = "select * from funcionario order by nome";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach($lista as $l){
                $f_lista[]=$this->listaEmpregado($l);

            }
            return $f_lista;

        }catch(exception $e){

                print "erro ao tentar buscar <br>".$e."<br>";

            }
    }
    //listar
    public function listaEmpregado($lista){
        $empregado = new Empregado();
        $empregado->setMatricula($lista['matricula']);
        $empregado->setNome($lista['nome']);
        $empregado->setTelefone($lista['telefone']);
        $empregado->setRg($lista['rg']);
        $empregado->setCpf($lista['cpf']);
        $empregado->setEndereco($lista['endereco']);
        $empregado->setImagem($lista['imagem']);
        return $empregado;
    }

    public function update(Empregado $empregado){

        try{
            $sql = "update funcionario set 
            nome=:nome,
            telefone=:telefone,
            rg=:rg,
            cpf=:cpf,
            endereco=:endereco
            
            where matricula=:matricula";

                $p_sql = Conexao::getConexao()->prepare($sql);
                $p_sql->bindValue(":nome",$empregado->getNome());
                $p_sql->bindValue(":telefone",$empregado->getTelefone());
                $p_sql->bindValue(":rg",$empregado->getRg());
                $p_sql->bindValue(":cpf",$empregado->getCpf());
                $p_sql->bindValue(":endereco",$empregado->getEndereco());
                $p_sql->bindValue(":matricula",$empregado->getMatricula());
                return $p_sql->execute();



        }catch(exception $e){

            print "erro ao tentar atualizar <br>".$e."<br>";

        }
    }

    public function delete(Empregado $empregado){
        try{
            $sql = "delete from funcionario where matricula=:matricula";
            $p_sql=Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":matricula",$empregado->getMatricula());
            return $p_sql->execute();

        }catch(exception $e){

            print "erro ao tentar deletar <br>".$e."<br>";

        }
    }


    
}


?>
