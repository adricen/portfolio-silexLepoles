<?php

namespace MicroCMS\Domain;

class Experience
{
    /**
     * Experience id.
     *
     * @var integer
     */
    private $id;

    /**
     * Experience title.
     *
     * @var string
     */
    private $title;

    /**
     * Experience content.
     *
     * @var string
     */
    private $content;

    // Contrat
    private $contrat;

    // debut
    private $debut;

    // private
    private $fin;

    // Poste
    private $poste;

    // Image
    private $img;

    public function setContrat( $contrat ){
      $this->contrat = $contrat;
      return $this;
    }

    public function getContrat(){
      return $this->contrat;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    public function getContent() {
        return $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
        return $this;
    }

    public function setDebut( $debut ){
      $this->debut = $debut;
      return $this;
    }
    public function getDebut(){
      return $this->debut;
    }
    public function setFin( $fin ){
      $this->fin = $fin;
      return $this;
    }
    public function getFin(){
      return $this->fin;
    }
    public function setPoste( $poste ){
      $this->poste = $poste;
      return $this;
    }
    public function getPoste(){
      return $this->poste;
    }
    public function setImg( $img ){
      $this->img = $img;
      return $this;
    }
    public function getImg(){
      return $this->img;
    }
}
