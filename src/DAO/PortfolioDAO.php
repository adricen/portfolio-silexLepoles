<?php

namespace MicroCMS\DAO;

use Doctrine\DBAL\Connection;
use MicroCMS\Domain\Portfolio;

class PortfolioDAO extends DAO
{
    /**
     * Return a list of all articles, sorted by date (most recent first).
     *
     * @return array A list of all articles.
     */
    public function findAll() {
        $sql = "select * from t_portfolio order by port_id asc";
        $result = $this->getDb()->fetchAll($sql);

        // Convert query result to an array of domain objects
        $portfolios = array();
        foreach ($result as $row) {
            $portfolioId = $row['port_id'];
            $portfolios[$portfolioId] = $this->buildDomainObject($row);
        }
        return $portfolios;
    }
    /**
     * Returns an article matching the supplied id.
     *
     * @param integer $id The article id.
     *
     * @return \MicroCMS\Domain\Article|throws an exception if no matching article is found
     */
    public function find($id) {
        $sql = "select * from t_portfolio where port_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No perso matching id " . $id);
    }

    /**
     * Saves an perso into the database.
     *
     * @param \MicroCMS\Domain\Article $perso The perso to save
     */
    public function save( Portfolio $portfolio ) {
        $portfolioData = array(
            'port_name' => $portfolio->getName(),
            'port_lieu' => $portfolio->getLieu(),
            'port_date' => $portfolio->getDate(),
            'port_descriptif' => $portfolio->getDescriptif(),
            'port_img' => $portfolio->getImg()
            );

        if ($portfolio->getId()) {
            // The perso has already been saved : update it
            $this->getDb()->update('t_portfolio', $portfolioData, array('port_id' => $portfolio->getId()));
        } else {
            // The portfolio has never been saved : insert it
            $this->getDb()->insert('t_portfolio', $portfolioData);
            // Get the id of the newly created perso and set it on the entity.
            $id = $this->getDb()->lastInsertId();
            $portfolio->setId($id);
        }
    }

    /**
     * Removes an article from the database.
     *
     * @param integer $id The article id.
     */
    public function delete($id) {
        // Delete the article
        $this->getDb()->delete('t_portfolio', array('port_id' => $id));
    }
    /**
     * Creates an Experience object based on a DB row.
     *
     * @param array $row The DB row containing Article data.
     * @return \MicroCMS\Domain\Article
     */
    protected function buildDomainObject(array $row) {
        $portfolio = new Portfolio();
        $portfolio->setId($row['port_id']);
        $portfolio->setName($row['port_name']);
        $portfolio->setLieu($row['port_lieu']);
        $portfolio->setDate($row['port_date']);
        $portfolio->setDescriptif($row['port_descriptif']);
        $portfolio->setImg($row['port_img']);
        return $portfolio;
    }
}
