<?php

namespace stats;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use stats\SyncTask;

class Main extends PluginBase {
    private array $stats = [];
    private Config $statsFile;

    protected function onEnable(): void {
        $this->saveDefaultConfig();
        $this->statsFile = new Config($this->getDataFolder() . "players.json", Config::JSON);
        $this->stats = $this->statsFile->getAll();

        $this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);

        $interval = $this->getConfig()->get("sync_interval", 300) * 20;
        $this->getScheduler()->scheduleRepeatingTask(new SyncTask($this), $interval);
    }

    public function addKill(string $name): void {
    	$this->initPlayer($name);
    	$this->stats[$name]["kills"]++;
    }

    public function addDeath(string $name): void {
    	$this->initPlayer($name);
    	$this->stats[$name]["deaths"]++;
    }

    private function initPlayer(string $name): void {
        if (!isset($this->stats[$name])) {
            $this->stats[$name] = ["name" => $name, "kills" => 0, "deaths" => 0];
        }
    }

    public function getStats(): array {
        return $this->stats;
    }

    protected function onDisable(): void {
        $this->statsFile->setAll($this->stats);
        $this->statsFile->save();
    }
}
