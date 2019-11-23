<?php

declare(strict_types=1);

namespace Shapecode\Bundle\CronBundle\Repository;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\EntityRepository;
use Shapecode\Bundle\CronBundle\Entity\CronJobInterface;

class CronJobRepository extends EntityRepository implements CronJobRepositoryInterface
{
    public function findOneByCommand(string $command, int $number = 1) : ?CronJobInterface
    {
        /** @var CronJobInterface|null $object */
        $object = $this->findOneBy([
            'command' => $command,
            'number'  => $number,
        ]);

        return $object;
    }

    /**
     * @inheritdoc
     */
    public function findByCommand(string $command) : array
    {
        return $this->findBy([
            'command' => $command,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function getKnownJobs() : Collection
    {
        $data = new ArrayCollection($this->findAll());

        return $data->map(static function (CronJobInterface $o) {
            return $o->getCommand();
        });
    }
}
