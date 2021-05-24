<?php
namespace sarassoroberto\usm\entity;

class Interessi{
    private $interessiId;
    private $nome;

    public function __construct($nome) {
        $this->nome = $nome;
    }

    /**
     * Get the value of interessiId
     */ 
    public function getInteressiId()
    {
        return $this->interessiId;
    }

    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }
}