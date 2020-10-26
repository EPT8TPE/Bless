<?php

declare(strict_types = 1);

namespace TPE\Bless;

use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\plugin\PluginBase;
use pocketmine\Player;

class Bless extends PluginBase {

public $cooldownList = [];

    public function onEnable() {
        $this->saveDefaultConfig();
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
        if($command->getName() === "bless") {
            if($sender->hasPermission("bless.command")) {
                if($sender instanceof Player) {
                    if(!isset($this->cooldownList[$sender->getName()])) {
                        $this->cooldownList[$sender->getName()] = time() + $this->getConfig()->get("bless-cooldown-time");
                        foreach($sender->getEffects() as $effect) {
                            if($effect->getType()->isBad()) {
                                $sender->removeEffect($effect->getId());
                            }                     
                        }
                    } else {
                        if(time() > $this->cooldownList[$sender->getName()]) {
                            $remaining = $this->cooldownList[$sender->getName()] - time();
                            $sender->sendMessage(str_replace("%REMAINING%", $remaining, $this->getConfig()->get("cooldown-message")));
                        } else {
                            unset($this->cooldownList[$sender->getName()]);
                        }
                    }
                    $sender->sendMessage($this->getConfig()->get("blessed-self-message"));
                } else {
                    $sender->sendMessage("You can not run this command via console!");
                }
            } else {
                $sender->sendMessage($this->getConfig()->get("no-perms-self-bless"));
            }
        }
        return true;
    }
}
