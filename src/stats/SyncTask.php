<?php

namespace stats;

use pocketmine\scheduler\AsyncTask;
use pocketmine\scheduler\Task;
use pocketmine\utils\Internet;

class SyncTask extends Task {
    public function __construct(private Main $plugin) {}

    public function onRun(): void {
        $data = [];
        foreach ($this->plugin->getStats() as $name => $stats) {
            $data[] = $stats;
        }

        if (empty($data)) return;

        $url = $this->plugin->getConfig()->get("api_url");
        $key = $this->plugin->getConfig()->get("api_key");
        $this->plugin->getServer()->getAsyncPool()->submitTask(new class($url, $key, $data) extends AsyncTask {
            public function __construct(
                private string $url,
                private string $key,
                private array $data
            ) {}

            public function onRun(): void {
                Internet::postURL($this->url, json_encode($this->data), 10, [
                    "Content-Type: application/json",
                    "x-api-key: " . $this->key
                ]);
            }
        });
    }
}
