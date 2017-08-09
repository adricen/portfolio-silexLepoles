<?php

namespace MicroCMS\DAO;

use MicroCMS\Domain\Article;

class ExperiencesDAO extends DAO
{
    /**
     * Return a list of all articles, sorted by date (most recent first).
     *
     * @return array A list of all articles.
     */
    public function findAll() {
        $sql = "select * from t_experience order by art_id desc";
        $result = $this->getDb()->fetchAll($sql);

        // Convert query result to an array of domain objects
        $experiences = array();
        foreach ($result as $row) {
            $experiencesId = $row['xp_id'];
          $experiences[$experiencesId] = $this->buildDomainObject($row);
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
            throw new \Exception("Il n'y a pas d'expèrience correspondant à cet id :" . $id);
    }

    /**
     * Saves an article into the database.
     *
     * @param \MicroCMS\Domain\Article $article The article to save
     */
    public function save(Article $experiences) {
        $experiencesData = array(
            'xp_title' => $experiences->getTitle(),
            'xp_descriptif' => $experiences->getContent(),
            );

        if ($experiences->getId()) {
            // The article has already been saved : update it
            $this->getDb()->update('t_experience', $experiencesData, array('xp_id' => $experiences->getId()));
        } else {
            // The article has never been saved : insert it
            $this->getDb()->insert('t_experience', $experiencesData);
            // Get the id of the newly created article and set it on the entity.
            $id = $this->getDb()->lastInsertId();
            $experiences->setId($id);
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
     * Creates an Article object based on a DB row.
     *
     * @param array $row The DB row containing Article data.
     * @return \MicroCMS\Domain\Article
     */

    protected function buildDomainObject(array $row) {
        $experiences = new Experience();
        $experiences->setId($row['xp_id']);
        $experiences->setTitle($row['xp_title']);
        $experiences->setContent($row['xp_descriptif']);
        return $experiences;
    }
}
