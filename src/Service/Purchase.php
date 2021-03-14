<?php
namespace Service;

use Entity\Console;
use Entity\Television;
use Entity\Microwave;
use Entity\Controller;
use Exception;

/**
 * Class Purchase
 * @package Controller
 */
class Purchase
{
    /**
     * Creates the purchase
     *
     * @return ElectronicItems
     * @throws Exception
     */
    public static function makePurchase(): ElectronicItems
    {
        $console = new Console(88.9);
        $televisionA = new Television(150);
        $televisionB = new Television(239.5);
        $microwave = new Microwave(77.45);
        $remoteController = new Controller(19.99, false);
        $wiredController = new Controller(9.99, true);

        $console->setExtraItem($remoteController, 2);
        $console->setExtraItem($wiredController, 2);

        $televisionA->setExtraItem($remoteController, 2);
        $televisionB->setExtraItem($remoteController);

        return new ElectronicItems([
            $console,
            $televisionA,
            $televisionB,
            $microwave
        ]);
    }

    /**
     * Calculate the total price of the items and its extras
     *
     * @param array $items
     * @param float $total
     */
    public static function calculateTotalPrice(array $items, float &$total)
    {
        foreach ($items as $item) {
            $total += $item->getPrice();
            if (count($item->getExtras()) > 0) {
                Purchase::calculateTotalPrice($item->getExtras(), $total);
            }
        }
    }
}
