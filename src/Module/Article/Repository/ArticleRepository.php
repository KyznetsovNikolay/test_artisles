<?php

namespace App\Module\Article\Repository;

use App\Module\Article\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    public function getArticlesByCategoryName($categoryName)
    {
        $sql = sprintf(
            'SELECT a.title, a.description, a.image FROM articles AS a 
                        JOIN categories AS c ON a.category_id = c.id 
                        WHERE c.name = "%s" ORDER BY a.id DESC LIMIT 5',
            $categoryName
        );
        $conn = $this->getEntityManager()->getConnection();
        return $conn->query($sql)->fetchAll();
    }
}
