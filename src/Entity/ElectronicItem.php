<?php
namespace Entity;

use Exception;

/**
 * Class ElectronicItem
 * @package Entity
 */
class ElectronicItem
{
    /**
     * @var float
     */
    protected $price;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var bool
     */
    protected $wired;

    /**
     * @var ElectronicItem[]
     */
    protected $extras = [];

    const ELECTRONIC_ITEM_TELEVISION = 'television';
    const ELECTRONIC_ITEM_CONSOLE = 'console';
    const ELECTRONIC_ITEM_MICROWAVE = 'microwave';
    const ELECTRONIC_ITEM_CONTROLLER = 'controller';

    /**
     * @var string[]
     */
    public static $types = array(
        self::ELECTRONIC_ITEM_CONSOLE,
        self::ELECTRONIC_ITEM_MICROWAVE,
        self::ELECTRONIC_ITEM_TELEVISION,
        self::ELECTRONIC_ITEM_CONTROLLER
    );

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return bool
     */
    public function getWired(): bool
    {
        return $this->wired;
    }

    /**
     * @return ElectronicItem[]
     */
    public function getExtras(): array
    {
        return $this->extras;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price)
    {
        $this->price = $price;
    }

    /**
     * @param string $type
     */
    public function setType(string $type)
    {
        $this->type = $type;
    }

    /**
     * @param bool $wired
     */
    public function setWired(bool $wired)
    {
        $this->wired = $wired;
    }

    /**
     * @param ElectronicItem $extra
     */
    public function setExtras(ElectronicItem $extra)
    {
        $this->extras[] = $extra;
    }

    /**
     * Includes an extra item if allowed
     *
     * @param ElectronicItem $extra
     * @param int $amount
     * @throws Exception
     */
    public function setExtraItem(ElectronicItem $extra, int $amount = 1)
    {
        for ($i=1; $i<=$amount; $i++) {
            if (!$this->maxExtras()) {
                $this->setExtras($extra);
            } else {
                throw new Exception("This {$this->getType()} is not allowed to receive extra item");
            }
        }
    }
}
