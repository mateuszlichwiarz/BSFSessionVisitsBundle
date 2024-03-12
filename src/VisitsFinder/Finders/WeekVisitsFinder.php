<?php

declare(strict_types=1);

namespace MLD\SessionVisitsBundle\VisitsFinder\Finders;

use MLD\SessionVisitsBundle\VisitsFinder\Finders\Interface\OneResultVisitsFinderInterface as VisitsFinderInterface;
use MLD\SessionVisitsBundle\Entity\Date;
use MLD\SessionVisitsBundle\Entity\Visits;

final class WeekVisitsFinder implements VisitsFinderInterface
{
    private ?Visits $foundedVisits = null;

    public function __construct(
        private Date $date,
        private array $visitsCollection,
    ){
        $this->collectionOperation();
    }

    public function find(): Visits
    {   
        if(!is_null($this->foundedVisits)) {
            return $this->foundedVisits;
        }else {
            throw new \Exception('no found');
        }
    }

    private function collectionOperation(): void
    {
        foreach($this->visitsCollection as $visit) {
            if($this->date->getYear()  === $visit->getYear() &&
               $this->date->getMonth() === $visit->getMonth() &&
               $this->date->getWeek()  === $visit->getWeek()
             ) {
                $this->foundedVisits = $visit;
            }
        }
    }
}