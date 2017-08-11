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
        $sql = "select * from t_experience order by xp_id desc";
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
     * Creates an Experience object based on a DB row.
     *
     * @param array $row The DB row containing Article data.
     * @return \MicroCMS\Domain\Article
     */
    protected function buildDomainObject(array $row) {
        $experience = new Experience();
        $experience->setId($row['xp_id']);
        $experience->setTitle($row['xp_poste']);
        $experience->setContent($row['xp_descriptif']);
        return $experience;
    }
}
