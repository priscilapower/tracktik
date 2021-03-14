<?php
namespace Service;

use Entity\ElectronicItem;

/**
 * Class ElectronicItems
 * @package Service
 */
class ElectronicItems
{
    /**
     * @var ElectronicItem[]
     */
    private $items;

    /**
     * ElectronicItems constructor.
     * @param ElectronicItem[] $items
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * Returns the items depending on the sorting type requested
     *
     * @param string $type
     * @return ElectronicItem[]
     */
    public function getSortedItems(string $type): array
    {
        $sorted = [];
        foreach ($this->items as $k => $item) {
            $getType = "get".ucfirst($type);
            $key = $item->$getType();

            if ($type == 'price') {
                $value = 0;
                Purchase::calculateTotalPrice([$item], $value);
                $key = $value * 100;
            }

            $sorted[$key.$k] = $item;
        }

        ksort($sorted, SORT_REGULAR);

        return $sorted;
    }

    /**
     * Returns the items that match the given type
     *
     * @param string $type
     * @return ElectronicItem[]
     */
    public function getItemsByType(string $type)
    {
        $items = [];
        if (in_array($type, ElectronicItem::$types)) {

            $callback = function($item) use ($type) {
                return $item->getType() == $type;
            };

            $items = array_filter($this->items, $callback);
        }

        return $items;
    }
}
