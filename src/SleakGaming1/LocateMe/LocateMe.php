<?php

namespace SleakGaming1\LocateMe;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\world\Position;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;

class LocateMe extends PluginBase {

public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
        if ($command->getName() === "coords") {
            if (!$sender instanceof Player) {
                $sender->sendMessage("This command can only be used in-game.");
                return true;
            }
            
            $target = $sender;
            if (!empty($args)) {
                $target = $this->getServer()->getPlayerExact($args[0]);
                if ($target === null) {
                    $sender->sendMessage("§cPlayer not found.");
                    return true;
                }
            }
            
            $x = $target->getPosition()->getX();
            $y = $target->getPosition()->getY();
            $z = $target->getPosition()->getz();
            
            $sender->sendMessage("§6" . $target->getName() . "'s Coordinates§8: §3X: §7$x §3Y: §7$y §3Z: §7$z");
            return true;
        }
        return false;
    }
}
