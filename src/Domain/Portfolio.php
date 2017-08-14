<?php

namespace MicroCMS\Domain;

class Portfolio
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
    private $name;
    /**
     * Experience title.
     *
     * @var string
     */
    private $lieu;

    /**
     * Experience descriptif.
     *
     * @var string
     */
    private $descriptif;
    /**
     * Experience date.
     *
     * @var string
     */
    private $date;
    /**
     * Experience date.
     *
     * @var string
     */
    private $img;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function getLieu() {
        return $this->lieu;
    }

    public function setLieu($lieu) {
        $this->lieu = $lieu;
        return $this;
    }

    public function getDescriptif() {
        return $this->descriptif;
    }

    public function setDescriptif($descriptif) {
        $this->descriptif = $descriptif;
        return $this;
    }
    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
        return $this;
    }
    public function getImg() {
        return $this->img;
    }

    public function setImg($img) {
        $this->img = $img;
        return $this;
    }
}
