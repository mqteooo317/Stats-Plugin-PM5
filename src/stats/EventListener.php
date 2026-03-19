<?php

namespace stats;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\player\Player;

class EventListener implements Listener {
    public function __construct(private Main $plugin) {}

    public function onDeath(PlayerDeathEvent $event): void {
        $player = $event->getPlayer();
        $this->plugin->addDeath($player->getName());

        $cause = $player->getLastDamageCause();
        if ($cause instanceof EntityDamageByEntityEvent) {
            $damager = $cause->getDamager();
            if ($damager instanceof Player) {
                $this->plugin->addKill($damager->getName());
            }
        }
    }
}
