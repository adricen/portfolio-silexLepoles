<?php

namespace MicroCMS\DAO;

use Doctrine\DBAL\Connection;
use MicroCMS\Domain\Loisir;

class LoisirDAO extends DAO
{
    /**
     * Return a list of all articles, sorted by date (most recent first).
     *
     * @return array A list of all articles.
     */
    public function findAll() {
        $sql = "select * from t_loisirs order by loisir_id desc";
        $result = $this->getDb()->fetchAll($sql);

        // Convert query result to an array of domain objects
        $loisirs = array();
        foreach ($result as $row) {
            $loisirId = $row['loisir_id'];
            $loisirs[$loisirId] = $this->buildDomainObject($row);
        }
        return $loisirs;
    }
    /**
     * Returns an article matching the supplied id.
     *
     * @param integer $id The article id.
     *
     * @return \MicroCMS\Domain\Article|throws an exception if no matching article is found
     */
    public function find($id) {
        $sql = "select * from t_loisirs where loisir_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No loisir matching id " . $id);
    }
    /**
     * Saves an article into the database.
     *
     * @param \MicroCMS\Domain\Article $article The article to save
     */
    public function save( Loisir $loisir ) {
        $loisirData = array(
            'loisir_nom' => $loisir->getTitle(),
            'loisir_descriptif' => $loisir->getContent(),
            );

        if ($loisir->getId()) {
            // The article has already been saved : update it
            $this->getDb()->update('t_loisirs', $loisirData, array( 'loisir_id' => $loisir->getId() ));
        } else {
            // The article has never been saved : insert it
            $this->getDb()->insert('t_loisirs', $loisirData);
            // Get the id of the newly created article and set it on the entity.
            $id = $this->getDb()->lastInsertId();
            $loisir->setId($id);
        }
    }
    /**
     * Removes an article from the database.
     *
     * @param integer $id The article id.
     */
    public function delete($id) {
        // Delete the article
        $this->getDb()->delete('t_loisirs', array('loisir_id' => $id));
    }
    /**
     * Creates an Experience object based on a DB row.
     *
     * @param array $row The DB row containing Article data.
     * @return \MicroCMS\Domain\Article
     */
    protected function buildDomainObject(array $row) {
        $loisir = new Loisir();
        $loisir->setId($row['loisir_id']);
        $loisir->setTitle($row['loisir_nom']);
        $loisir->setContent($row['loisir_descriptif']);
        return $loisir;
    }
}
