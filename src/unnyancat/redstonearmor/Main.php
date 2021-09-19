<?php

namespace unnyancat\redstonearmor;

use pocketmine\item\ArmorTypeInfo;
use pocketmine\item\ItemIdentifier;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use Refaltor\Natof\CustomItem\CustomItem;

class Main extends PluginBase {
    public static Main $instance;

    protected function onEnable(): void
    {
        $this->getServer()->getLogger()->info("§cRedstone Armor §fget §aInjected");
    }

    public function loadItems() {
        if (Server::getInstance()->getPluginManager()->getPlugin("CustomItem") != null) {

            $helmet = CustomItem::createHelmetItem(new ItemIdentifier(2000, 0), new ArmorTypeInfo(10, 500, 0), "redstone helmet");
            $helmet->setTexture('redstone_helmet');

            $chestplate = CustomItem::createChesPlateItem(new ItemIdentifier(2001, 0), new ArmorTypeInfo(10, 500, 1), "redstone chestplate");
            $chestplate->setTexture('redstone_chestplate');

            $leggings = CustomItem::createLeggingsItem(new ItemIdentifier(2002, 0), new ArmorTypeInfo(10, 500, 2), "redstone leggings");
            $leggings->setTexture('redstone_leggings');

            $boots = CustomItem::createBootsItem(new ItemIdentifier(2003, 0), new ArmorTypeInfo(10, 500, 3), "redstone boots");
            $boots->setTexture('redstone_boots');

            $items = [$chestplate, $helmet, $leggings, $boots];
            foreach ($items as $item) {
                CustomItem::registerItem($item);
            }
        }
    }

    protected function onDisable(): void
    {
        $this->getServer()->getLogger()->info("§cLe test de unnyancat s'arrête");
    }

    protected function onLoad(): void {
        $this->loadItems();
    }
}