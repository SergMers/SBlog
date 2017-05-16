<?php

namespace MSServicesBundle\Service;

class ASideService
{
    private $em;
    public function __construct(\Doctrine\ORM\EntityManager $em) {
        $this->em = $em;
    }
    
    public function Hello() {
        $qb = $this->em->createQueryBuilder();
        $qb ->select('post')
            ->from('MSBlogBundle\Entity\Post', 'post')
            ->orderBy('post.dateCreated', 'DESC')
            ->setMaxResults(3);
        $query = $qb->getQuery();
        $posts = $query->getResult();
        
        
        return $posts;
        
        
        
    }
}
