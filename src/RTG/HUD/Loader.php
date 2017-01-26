<?php

namespace RTG\HUD;

/* Essentials */
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Server;
use pocketmine\scheduler\PluginTask;
use pocketmine\command\CommandExecutor;
use pocketmine\Player;

use RTG\HUD\Task;
use RTG\HUD\command\HUDCommand;

class Loader extends PluginBase implements Listener {
    
    public $enable;
    
    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->warning("Starting...");
        $this->getServer()->getScheduler()->scheduleRepeatingTask(new Task($this), 20);
        $this->enable = array();
        
        $this->getCommand("hud")->setExecutor(new HUDCommand($this));
    }
    
    public function onDisable() {
    }
    
}