<?php

namespace MicroCMS\DAO;

use MicroCMS\Domain\Experience;

class ExperienceDAO extends DAO
{
    /**
     * Return a list of all Experiences, sorted by date (most recent first).
     *
     * @return array A list of all experiences.
     */
    public function findAll() {
        $sql = "select * from t_experience order by xp_id desc";
        $result = $this->getDb()->fetchAll($sql);

        // Convert query result to an array of domain objects
        $experiences = array();
        foreach ($result as $row) {
            $experiencesId = $row['xp_id'];
          $experiences[$experiencesId] = $this->buildDomainObject($row);
        }
        return $experiences;
        // print_r($experiences);
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
            throw new \Exception("Il n'y a pas d'expèrience correspondant à cet id :" . $id);
    }

    /**
     * Saves an experience into the database.
     *
     * @param \MicroCMS\Domain\Experience $experience The experience to save
     */
    public function save(Experience $experience) {
        $experienceData = array(
            'xp_title' => $experience->getTitle(),
            'xp_descriptif' => $experience->getContent(),
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
        $experience->setTitle($row['xp_title']);
        $experience->setContent($row['xp_descriptif']);
        return $experience;
    }
}
