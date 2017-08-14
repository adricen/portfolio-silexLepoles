<?php

namespace MicroCMS\DAO;

use Doctrine\DBAL\Connection;
use MicroCMS\Domain\Experience;

class ExperienceDAO extends DAO
{
    /**
     * Return a list of all articles, sorted by date (most recent first).
     *
     * @return array A list of all articles.
     */
    public function findAll() {
        $sql = "select * from t_experience order by xp_id asc";
        $result = $this->getDb()->fetchAll($sql);

        // Convert query result to an array of domain objects
        $experiences = array();
        foreach ($result as $row) {
            $experienceId = $row['xp_id'];
            $experiences[$experienceId] = $this->buildDomainObject($row);
        }
        return $experiences;
    }
    /**
     * Returns an article matching the supplied id.
     *
     * @param integer $id The article id.
     *
     * @return \MicroCMS\Domain\Article|throws an exception if no matching article is found
     */
    public function find($id) {
        $sql = "select * from t_experience where xp_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No article matching id " . $id);
    }
    /**
     * Saves an article into the database.
     *
     * @param \MicroCMS\Domain\Article $article The article to save
     */
    public function save(Experience $experience) {
        $experienceData = array(
            'xp_contrat' => $experience->getContrat(),
            'xp_debut' => $experience->getDebut(),
            'xp_fin' => $experience->getFin(),
            'xp_descriptif' => $experience->getContent(),
            'xp_poste' => $experience->getPoste(),
            'xp_img' => $experience->getImg(),
            );

        if ($experience->getId()) {
            // The article has already been saved : update it
            $this->getDb()->update('t_experience', $experienceData, array('xp_id' => $experience->getId()));
        } else {
            // The article has never been saved : insert it
            $this->getDb()->insert('t_experience', $experienceData);
            // Get the id of the newly created article and set it on the entity.
            $id = $this->getDb()->lastInsertId();
            $experience->setId($id);
        }
    }
    /**
     * Removes an article from the database.
     *
     * @param integer $id The article id.
     */
    public function delete($id) {
        // Delete the article
        $this->getDb()->delete('t_experience', array('xp_id' => $id));
    }
    /**
     * Creates an Experience object based on a DB row.
     *
     * @param array $row The DB row containing Article data.
     * @return \MicroCMS\Domain\Article
     */
    protected function buildDomainObject(array $row) {
        $experience = new Experience();
        $experience->setId($row['xp_id']);
        $experience->setContrat($row['xp_contrat']);
        $experience->setDebut($row['xp_debut']);
        $experience->setFin($row['xp_fin']);
        $experience->setImg($row['xp_img']);
        $experience->setPoste($row['xp_poste']);
        $experience->setContent($row['xp_descriptif']);
        return $experience;
    }


}
