<?php

declare(strict_types=1);

namespace Shapecode\Bundle\CronBundle\Repository;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Persistence\ObjectRepository;
use Shapecode\Bundle\CronBundle\Entity\CronJobInterface;

/**
 * Interface CronJobRepositoryInterface
 */
interface CronJobRepositoryInterface extends ObjectRepository
{
    public function findOneByCommand(string $command, int $number = 1) : ?CronJobInterface;

    /**
     * @return CronJobInterface[]
     */
    public function findByCommand(string $command) : array;

    /**
     * @return Collection
     */
    public function getKnownJobs() : Collection;
}
