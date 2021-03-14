<?php
namespace Entity;

use Interfaces\ElectronicItem as ElectronicItemInterface;

/**
 * Class Microwave
 * @package Entity
 */
class Microwave extends ElectronicItem implements ElectronicItemInterface
{
    /**
     * Microwave constructor.
     * @param float $price
     */
    public function __construct(float $price)
    {
        $this->setType(self::ELECTRONIC_ITEM_MICROWAVE);
        $this->setPrice($price);
        $this->setWired(true);
    }

    /**
     * Microwave has no extras
     * @return bool
     */
    public function maxExtras(): bool
    {
        return true;
    }
}
