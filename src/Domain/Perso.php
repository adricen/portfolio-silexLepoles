<?php

namespace MicroCMS\Domain;

class Perso
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

    // Adresse
    private $adresse;

    // Prenom
    private $prenom;

    // Telephone
    private $tel;

    public function setTel( $tel ){
      $this->tel = $tel;
      return $this;
    }
    public function getTel(){
      return $this->tel;
    }
    public function getAdresse(){
      return $this->adresse;
    }
    public function setAdresse( $adresse ){
      $this->adresse = $adresse;
      return $this;
    }
    public function getPrenom(){
      return $this->prenom;
    }
    public function setPrenom( $prenom ){
      $this->prenom = $prenom;
      return $this;
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
}
