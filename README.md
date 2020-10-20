# Bless
A pocketmine plugin that allows players to bless themselves.

# How to install
1. Download the phar from poggit.
2. Add it to your servers plugin directory.
3. Restart your server.

# Features
- /bless - Removes all negative effects from the player who runs it.
- Configurable cooldown for /bless.
- Configurable messages

# Permissions
- bless.self.command - Allows players to use /bless, defaulty given to ops.

# Config
~ Message sent to players when they bless themselves.
blessed-self-message: "§e***§lBLESSED§r§e***"

~ Message sent to player if they lack permissions to bless themselves.
no-perms-self-bless: "§cYou do not have permission to bless yourself!"

~ Cooldown in seconds for the /bless command.
bless-cooldown-time: 300

~ Message sent to player if /bless is on cooldown, use %REMAINING% for the time remaining.
cooldown-message: "§cYou can not bless for another %REMAINING% seconds!"

# Support
Need help or have any suggestions? Contant me on discord TPE#1061.
