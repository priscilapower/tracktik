<?php
namespace Entity;

use Interfaces\ElectronicItem as ElectronicItemInterface;

/**
 * Class Console
 * @package Entity
 */
class Console extends ElectronicItem implements ElectronicItemInterface
{
    /**
     * @var int
     */
    private $maxExtras = 4;

    /**
     * Console constructor.
     * @param float $price
     */
    public function __construct(float $price)
    {
        $this->setType(self::ELECTRONIC_ITEM_CONSOLE);
        $this->setPrice($price);
        $this->setWired(true);
    }

    /**
     * Console has a limit of $maxExtras
     * @return bool
     */
    public function maxExtras(): bool
    {
        if (count($this->getExtras()) < $this->maxExtras) {
            return false;
        }

        return true;
    }
}
