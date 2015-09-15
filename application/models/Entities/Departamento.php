<?php

namespace Entities;

/**
 * Description of Departamento
 *
 * @author Rafael Rocha <rafaeltbt@gmail.com>
 * 
 * @Entity
 * @Table(name="tbl_departamento")
 */
class Departamento extends AbstractEntity {

    const name = "Entities\Departamento";

    public function __construct($id) {
        $this->id = $id;
    }

    /**
     *
     * 
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     * @Column(name="cod_departamento", type="integer", nullable=false)
     */
    private $id;

    /**
     *
     * @var string
     * 
     * @Column(type="string", length=50, nullable=true)
     */
    private $nomeDepartamento;

    /**
     *
     * @var string
     * 
     * @Column(type="string", length=80, nullable=true)
     */
    private $nomeCompleto;

    /**
     *
     * @var string
     * 
     * @Column(type="string", length=20, nullable=true)
     */
    private $apelido;

    /**
     * Getters and Setters
     */
    public function getId() {
        return $this->id;
    }

    public function getNomeDepartamento() {
        return $this->nomeDepartamento;
    }

    public function getNomeCompleto() {
        return $this->nomeCompleto;
    }

    public function getApelido() {
        return $this->apelido;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setNomeDepartamento($nomeDepartamento) {
        $this->nomeDepartamento = $nomeDepartamento;
        return $this;
    }

    public function setNomeCompleto($nomeCompleto) {
        $this->nomeCompleto = $nomeCompleto;
        return $this;
    }

    public function setApelido($apelido) {
        $this->apelido = $apelido;
        return $this;
    }

}
