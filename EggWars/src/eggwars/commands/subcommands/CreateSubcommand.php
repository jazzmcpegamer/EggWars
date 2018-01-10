<?php

declare(strict_types=1);

namespace eggwars\commands\subcommands;

use eggwars\commands\EggWarsCommand;
use eggwars\EggWars;
use pocketmine\command\CommandSender;

/**
 * Class CreateSubcommand
 * @package eggwars\commands\subcommands
 */
class CreateSubcommand extends EggWarsCommand {

    public function __construct()
    {
    }

    /**
     * @param CommandSender $sender
     * @param array $args
     */
    public function executeSub(CommandSender $sender, array $args, string $name) {
        if($name != "create") return;
        if(!$this->checkPermission($sender, $name)) return;
        if(empty($args[0])) {
            $sender->sendMessage("§cUsage: §7/ew create <arenaName>");
            return;
        }
        if($this->getPlugin()->getArenaManager()->arenaExists($args[0])) {
            $sender->sendMessage(EggWars::getPrefix()."§cArena $args[0] already exists!");
            return;
        }
        $this->getPlugin()->getArenaManager()->createArena($args[0]);
        $sender->sendMessage(EggWars::getPrefix()."§aArena $args[0] sucessfully created!");
    }
}