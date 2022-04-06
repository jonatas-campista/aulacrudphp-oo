<?php
class Empregado{
    private $matricula;
    private $nome;
    private $telefone;
    private $rg;
    private $cpf;
    private $endereco;
    private $imagem;

    function setMatricula($matricula){
        $this->matricula = $matricula;
    }

    function setNome($nome){
        $this->nome = $nome;
    }

    function setTelefone($telefone){
        $this->telefone = $telefone;
    }

    function setRg($rg){
        $this->rg = $rg;
    }

    function setCpf($cpf){
        $this->cpf = $cpf;
    }

    function setEndereco($endereco){
        $this->endereco = $endereco;
    }

    function setImagem($imagem){
        $this->imagem = $imagem;
    }

    function getMatricula(){
        return $this->matricula;
    }
    function getNome(){
        return $this->nome;
    }
    function getTelefone(){
        return $this->telefone;
    }
    function getRg(){
        return $this->rg;
    }
    function getCpf(){
        return $this->cpf;
    }
    function getEndereco(){
        return $this->endereco;
    }
    function getImagem(){
        return $this->imagem;
    }
}

?>