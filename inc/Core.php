<?php

ob_start();

require_once __DIR__ . '/../vendor/autoload.php';

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

    /**
     * Listens for all requests and saves it to database
     * 
     * @param int user_id
     * @return void
     */
    public function requestListener(int $user_id=null):void {
        global $pdo, $datetime_format;

        // get required fields to notify
        $code = http_response_code();
        $request_uri = Helpers::getRequestUri();
        $request_method = Helpers::getRequestMethod();

        // create datetime
        $nowDateTime = new DateTime();
        $created_at = date($datetime_format, $nowDateTime->getTimestamp());
        $updated_at = date($datetime_format, $nowDateTime->getTimestamp());

        // insert into notifications
        $stmt = $pdo->prepare("INSERT INTO notifications (user_id, code, request_uri, request_method, created_at, updated_at) 
        VALUES (:user_id, :code, :request_uri, :request_method, :created_at, :updated_at)");
        $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
        $stmt->bindParam(":code", $code, PDO::PARAM_INT);
        $stmt->bindParam(":request_uri", $request_uri, PDO::PARAM_STR);
        $stmt->bindParam(":request_method", $request_method, PDO::PARAM_STR);
        $stmt->bindParam(":created_at", $created_at, PDO::PARAM_STR);
        $stmt->bindParam(":updated_at", $updated_at, PDO::PARAM_STR);

        // be careful about unique ip addresses
        try {
            $stmt->execute();

        } catch (PDOException $e) {

        } finally {
            $stmt->closeCursor();
        }
    }

    /**
     * Listens for all ip addresses and saves it to database
     * 
     * @param int user_id
     * @return void
     */
    public function visitListener(int $user_id=null): void {
        global $pdo, $datetime_format;
    
        // INFO: what about saving per 24 hours?

        // get ip address of the client (ipv4 or ipv6)
        $ip = $_SERVER['REMOTE_ADDR'];

        // create datetime
        $nowDateTime = new DateTime();
        $created_at = date($datetime_format, $nowDateTime->getTimestamp());
        $updated_at = date($datetime_format, $nowDateTime->getTimestamp());
    
        // notifications ips table
        $stmt = $pdo->prepare("INSERT INTO notifications_ips (user_id, ip, created_at, updated_at) 
                            VALUES (:user_id, :ip, :created_at, :updated_at)");
        $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
        $stmt->bindParam(":ip", $ip, PDO::PARAM_STR);
        $stmt->bindParam(":created_at", $created_at, PDO::PARAM_STR);
        $stmt->bindParam(":updated_at", $updated_at, PDO::PARAM_STR);
    
        // be careful about unique ip addresses
        try {
            $stmt->execute();
    
        } catch (PDOException $e) {
            // TODO: check for unique error code
            // if it is not about above code then show error
    
        } finally {
            $stmt->closeCursor();
        }
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

// get current user id
$user_id = $auth->getCurrentUserId();

// initialize core
$core = new Core();

// get all settings from the database
$core->grabSettings($pdo, $language_id);

// get debug mode from database
$core->checkDebugMode();

// run request listener and log them
$core->requestListener($user_id);

// run client ip listener
$core->visitListener($user_id);
