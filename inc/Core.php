<?php

ob_start();

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/Helpers.php';
require_once __DIR__ . '/Language.php';

require_once __DIR__ . '/../database/FormElement.php';
require_once __DIR__ . '/../database/Blocks.php';
require_once __DIR__ . '/../database/Cities.php';
require_once __DIR__ . '/../database/Countries.php';
require_once __DIR__ . '/../database/Districts.php';
require_once __DIR__ . '/../database/Flats.php';
require_once __DIR__ . '/../database/Floors.php';
require_once __DIR__ . '/../database/Languages.php';
require_once __DIR__ . '/../database/LanguagesDef.php';
require_once __DIR__ . '/../database/Managements.php';
require_once __DIR__ . '/../database/Notifications.php';
require_once __DIR__ . '/../database/NotificationsIps.php';
require_once __DIR__ . '/../database/Settings.php';
require_once __DIR__ . '/../database/SettingsContact.php';
require_once __DIR__ . '/../database/SettingsCurrency.php';
require_once __DIR__ . '/../database/SettingsVat.php';
require_once __DIR__ . '/../database/Users.php';

require_once __DIR__ . '/Auth.php';
require_once __DIR__ . '/../vendor/autoload.php';

class Core {
    private bool $debug_mode;
    private array $settings;

    function __construct() {
        $this->debug_mode = true;
        $this->settings = [];
    }

    /**
     * gets settings data from databse
     * 
     * @return void
     */
    public function grabSettings(PDO $pdo, int $language_id): void {
        $stmt = $pdo->prepare("SELECT * FROM settings WHERE language_id = :language_id");
        $stmt->bindParam(":language_id", $language_id, PDO::PARAM_INT);
        $stmt->execute();
        $this->settings = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
    }

    /**
     * sets the debug mode from database
     * 
     * @return bool
     */
    public function checkDebugMode(): bool {
        if (count($this->settings) > 0) {
            return ($this->settings['debug_mode']) ? true : false;
        }

        throw new Exception("Please load the settings from the database before running " . __FUNCTION__);
    }

    public function setDebugMode(bool $debug_mode): void {
        $this->debug_mode = $debug_mode;

        error_reporting(E_ALL);
        ini_set("display_errors", intval($debug_mode));
        ini_set("display_startup_errors", intval($debug_mode));
    }

    public function getDebugMode(): bool {
        return $this->debug_mode;
    }

    public function setSettings(array $settings): void {
        $this->settings = $settings;
    }

    public function getSettings(): array {
        return $this->settings;
    }
}

// initialize core
$core = new Core();

// get all settings from the database
$core->grabSettings($pdo, $language_id);

// get debug mode from database
$core->checkDebugMode();
