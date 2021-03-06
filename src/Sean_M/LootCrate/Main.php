<?php

namespace Sean_M\LootCrate;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\utils\TextFormat as TF;

class Main extends PluginBase implements Listener {

  public $config;

    public function onEnable() {
       $this->saveDefaultConfig();
       $this->getServer()->getPluginManager()->registerEvents($this, $this);
       $this->config = $this->getConfig()->getAll();
       $this->getLogger()->info(TF::GREEN . "LootCrate by Sean_M enabled!");
          $this->getServer()->getScheduler()->scheduleRepeatingTask(new LootCrate($this), $this->config["time"]);
    }

    public function onDisable() {
       $this->getLogger()->info(TF::RED . "LootCrate by Sean_M disabled!");
    }
}
