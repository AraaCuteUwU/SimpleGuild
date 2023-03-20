<?php

namespace FiraAja\SimpleGuild;

use FiraAja\SimpleGuild\api\API;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\utils\SingletonTrait;

class SimpleGuild extends PluginBase {
    use SingletonTrait;

    /** @var Config $guilds */
    public Config $guilds;

    public function onEnable(): void {
        self::setInstance($this);
        $this->saveResource("guilds.yml");
        $this->guilds = new Config($this->getDataFolder() . "guilds.yml", Config::YAML);
    }

    /**
     * @return API
     */
    public function getAPI(): API {
        return new API();
    }
}