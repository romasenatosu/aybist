<?php

class Flash {
    /**
     * Adds flash message to session
     * 
     * @param string msg
     * @param string type
     */
    public static function addFlash(string $msg, string $type) {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }

        // create flash message
        $flash = ['msg' => $msg, 'type' => $type];

        // get old flash message in order to append to them
        $flashes = json_decode($_SESSION['flashes'] ?? '', true);

        // if there is no old flash message then create empty array
        if (is_null($flashes)) {
            $flashes = [];
        }

        // append to flash
        $flashes[] = $flash;

        // save it to session
        $_SESSION['flashes'] = json_encode($flashes);
    }

    /**
     * returns all flash messages in session
     * 
     * @return array
     */
    public static function getFlashes(): array {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }

        // get flash messages
        $flashes = json_decode($_SESSION['flashes'] ?? '', true);

        // empty session
        unset($_SESSION['flashes']);

        return $flashes ?? [];
    }
}
