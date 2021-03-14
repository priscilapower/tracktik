<?php
namespace Entity;

use Interfaces\ElectronicItem as ElectronicItemInterface;

/**
 * Class Controller
 * @package Entity
 */
class Controller extends ElectronicItem implements ElectronicItemInterface
{
    /**
     * Controller constructor.
     * @param float $price
     * @param bool $wired
     */
    public function __construct(float $price, bool $wired)
    {
        $this->setType(self::ELECTRONIC_ITEM_CONTROLLER);
        $this->setPrice($price);
        $this->setWired($wired);
    }

    /**
     * Controller has no extras
     * @return bool
     */
    public function maxExtras(): bool
    {
        return true;
    }
}
