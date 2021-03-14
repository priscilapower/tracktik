<?php
namespace Entity;

use Interfaces\ElectronicItem as ElectronicItemInterface;

/**
 * Class Television
 * @package Entity
 */
class Television extends ElectronicItem implements ElectronicItemInterface
{
    /**
     * Television constructor.
     * @param float $price
     */
    public function __construct(float $price)
    {
        $this->setType(self::ELECTRONIC_ITEM_TELEVISION);
        $this->setPrice($price);
        $this->setWired(true);
    }

    /**
     * Television has no maximum extra, so the max will be always false
     * @return bool
     */
    public function maxExtras(): bool
    {
        return false;
    }
}
