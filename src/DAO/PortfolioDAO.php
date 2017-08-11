<?php

namespace MicroCMS\DAO;

use Doctrine\DBAL\Connection;
use MicroCMS\Domain\Portfolio;

class PorfolioDAO extends DAO
{
    /**
     * Return a list of all articles, sorted by date (most recent first).
     *
     * @return array A list of all articles.
     */
    public function findAll() {
        $sql = "select * from t_portfolio order by port_id desc";
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
     * Creates an Experience object based on a DB row.
     *
     * @param array $row The DB row containing Article data.
     * @return \MicroCMS\Domain\Article
     */
    protected function buildDomainObject(array $row) {
        $portfolio = new Portfolio();
        $portfolio->setId($row['port_id']);
        $portfolio->setTitle($row['port_name']);
        $portfolio->setContent($row['port_descriptif']);
        return $portfolio;
    }
}
