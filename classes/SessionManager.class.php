<?php


class SessionManager extends Manager {
    function getNumberStarsSpotQualities($id) {
        $querySQL = "SELECT session_quality_beach, session_quality_water FROM session WHERE fk_spot_id = " . $id;
        $query = $this->db->prepare($querySQL);
        $query->execute();


        $spotData = $query->fetch(PDO::FETCH_ASSOC);
        if ($spotData !== false) {
            $spotData = $this->convertDBArrayToRightArray($spotData);

            return new Session($spotData);
        } else {
            return false;
        }
    }

    function getCommentary($idSpot) {
        $querySQL = "SELECT user_pseudo AS fk_user_id, session_notice FROM session JOIN user u on session.fk_user_id = u.user_id WHERE fk_spot_id = " . $idSpot . " LIMIT 5";
        $query = $this->db->prepare($querySQL);
        $query->execute();


        $spotData = $query->fetch(PDO::FETCH_ASSOC);
        if ($spotData !== false) {
            $spotData = $this->convertDBArrayToRightArray($spotData);

            return new Session($spotData);
        } else {
            return false;
        }
    }
}