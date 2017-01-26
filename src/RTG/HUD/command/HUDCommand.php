<?php

namespace RTG\HUD\command;

use pocketmine\{Server, Player, command\Command, command\CommandSender};

/**
 * CustomHUD v 1.0.0
 *
 * @author RTG
 */

class HUDCommand implements CommandExecutor {
    
    public function __construct(Loader $plugin) {
        $this->plugin = $plugin;
    }
    
    public function onCommand(CommandSender $sender, Command $cmd, $label, array $param) {
        
        switch(strtolower($cmd->getName())) {
            
            case "hud":
                
                if(isset($param[0])) {
                    switch($param[0]) {
                        
                        case "toggle":
                
                            if(isset($this->plugin->enable[\strtolower($sender->getName())])) {
                                unset($this->plugin->enable[strtolower($sender->getName())]);
                                $sender->sendMessage("You have turned off CustomHUD");
                            }
                            else {
                                $this->plugin->enable[strtolower($sender->getName())] = $sender->getName();
                                $sender->sendMessage("You have turned on CustomHUD!");
                            }
                        
                            return true;
                        break;
                    }
                }
                else {
                    $sender->sendMessage("Usage: /hud <toggle>");
                }
                
                return true;
            break;
            
        }
         
    }
    
}