<?php

declare(strict_types = 1);

namespace TPE\Bless;

use pocketmine\block\Planks;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\utils\TextFormat;
use pocketmine\command\utils\InvalidCommandSyntaxException;

class Bless extends PluginBase {


    public function onEnable()
    {
        $this->saveDefaultConfig();
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
    {
        if($command->getName() === "bless") {
            if($sender->hasPermission("bless.self.command")) {
                if($sender instanceof Player) {
                    foreach($sender->getEffects() as $effect) {
                        if($effect->getType()->isBad()) {
                            $sender->removeEffect($effect->getId());
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