<?php

namespace App\Repository;

/**
 * VideoRepository
 *
 */
class VideoRepository extends \Doctrine\ORM\EntityRepository
{
    public function findLastVideo()
    {
        $qb = $this->createQueryBuilder('v');
        $qb->orderBy('v.updatedAt','DESC')
        ->setMaxResults(1);
        $result = $qb->getQuery()->getResult();
        if($result){
            $lastVideo = $result[0];
        }else{
            $lastVideo = null;
        }
        ;
        return $lastVideo;
    }
}