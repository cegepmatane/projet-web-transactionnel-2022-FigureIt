<?php
class SQLSessionHandler implements SessionHandlerInterface
{
    private $connection;

    public function __construct()
    {
        $this->connection = new mysqli("localhost","site_user","","figureit");
    }

    public function open($savePath, $sessionName)
    {
        if ($this->connection) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function read($sessionId)
    {
        try {
            $stmt = $this->connection->prepare("SELECT session_data FROM sessions WHERE session_id = ?");
            $stmt->bind_param("s", $sessionId);
            $stmt->execute();
            $stmt->bind_result($sessionData);
            $stmt->fetch();
            $stmt->close();

            return $sessionData ? $sessionData : '';
        } catch (Exception $e) {
            return '';
        }
    }

    public function write($sessionId, $sessionData)
    {
        try {
            $stmt = $this->connection->prepare("REPLACE INTO sessions(`session_id`, `created`, `session_data`) VALUES(?, ?, ?)");
            $time = time();
            $stmt->bind_param("sis", $sessionId, $time, $sessionData);
            $stmt->execute();
            $stmt->close();

            return TRUE;
        } catch (Exception $e) {
            return FALSE;
        }
    }

    public function destroy($sessionId)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM sessions WHERE session_id = ?");
            $stmt->bind_param("s", $sessionId);
            $stmt->execute();
            $stmt->close();

            return TRUE;
        } catch (Exception $e) {
            return FALSE;
        }
    }

    public function gc($maxlifetime)
    {
        error_log("Porjet web transactionnel SQLSessionHandler gc()");
        $past = time() - $maxlifetime;

        try {
            $stmt = $this->connection->prepare("DELETE FROM sessions WHERE `created` < ?");
            $stmt->bind_param("i", $past);
            $stmt->execute();
            $stmt->close();

            return TRUE;
        } catch (Exception $e) {
            return FALSE;
        }
    }

    public function close()
    {
        return TRUE;
    }

}

session_start();
/**
 * TODO : - Faire un test a chaque session start un test pour voir si la session est remplie avec userId et si le token est encore valide en temps de création
 * Faire l'ajout dans la base de données pour les champs requis (voir ici {@link https://stackoverflow.com/questions/520237/how-do-i-expire-a-php-session-after-30-minutes})
 *
 */