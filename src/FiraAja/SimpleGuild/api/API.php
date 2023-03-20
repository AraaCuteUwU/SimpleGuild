<?php

namespace FiraAja\SimpleGuild\api;

use FiraAja\SimpleGuild\SimpleGuild;
use JsonException;

class API {

    /**
     * @param string $guild
     * @return bool
     */
    public function isGuildExists(string $guild): bool {
        if(SimpleGuild::getInstance()->guilds->exists($guild)){
            return true;
        }
        return false;
    }

    /**
     * @param ...$data
     * @return void
     * @throws JsonException
     */
    public function addGuild(...$data): void {
        $guildArray = SimpleGuild::getInstance()->guilds->getAll();
        foreach ($data as $datum){
            $guildArray[] = $datum;
        }
        SimpleGuild::getInstance()->guilds->setAll($guildArray);
        SimpleGuild::getInstance()->guilds->save();
    }
}