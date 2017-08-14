<?php

namespace MicroCMS\DAO;

use Doctrine\DBAL\Connection;
use MicroCMS\Domain\Perso;

class PersoDAO extends DAO
{
    /**
     * Return a list of all articles, sorted by date (most recent first).
     *
     * @return array A list of all articles.
     */
    public function findAll() {
        $sql = "select * from t_perso order by perso_id asc";
        $result = $this->getDb()->fetchAll($sql);

        // Convert query result to an array of domain objects
        $persos = array();
        foreach ($result as $row) {
            $persoId = $row['perso_id'];
            $persos[$persoId] = $this->buildDomainObject($row);
        }
        return $persos;
    }

    /**
     * Creates an Experience object based on a DB row.
     *
     * @param array $row The DB row containing Article data.
     * @return \MicroCMS\Domain\Article
     */
    protected function buildDomainObject(array $row) {
        $perso = new Perso();
        $perso->setId($row['perso_id']);
        $perso->setTitle($row['perso_nom']);
        $perso->setPrenom($row['perso_prenom']);
        $perso->setPoste($row['perso_poste']);
        $perso->setFacebook($row['perso_facebook']);
        $perso->setGithub($row['perso_github']);
        $perso->setCodepen($row['perso_codepen']);
        $perso->setImg($row['perso_img']);
        $perso->setTel($row['perso_tel']);
        $perso->setAdresse($row['perso_adresse']);
        return $perso;
    }
}
