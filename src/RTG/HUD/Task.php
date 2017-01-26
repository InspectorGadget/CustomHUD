<?php

namespace RTG\HUD;

use RTG\HUD\Loader;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\scheduler\PluginTask;
use pocketmine\utils\Config;

class Task extends PluginTask {
    
    public function __construct(Loader $plugin) {
        $this->plugin = $plugin;
    }
    
    public function onRun($tick) {
        
        $online = $this->getServer()->getOnlinePlayers();
        $c = $this->plugin->getConfig();
        
            foreach($online as $p) {
                
                if(isset($this->plugin->enable[strtolower($p->getName())])) {
                    $p->sendPopup("->".$c->get("hud"));
                }
                
            }
            
    }
    
}
    
