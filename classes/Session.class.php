<?php


class Session {
    private $session_id;
    private $user;
    private $session_activity;
    private $session_date_begin;
    private $session_date_end;
    private $session_description;
    private $session_notice;
    private $session_quality_beach;
    private $session_quality_water;
    private $session_visit_human;
    private $session_visit_boat;
    private $spot;
    
    
    /**
     * User constructor.
     * @param array $data
     */
    public function __construct($data = array()) {
        if (!empty($data))
            $this->affects($data);
    }
    
    
    protected function affects(array $data) {
        foreach ($data as $key => $value) {
            switch ($key) {
                case 'session_id' :
                    $this->session_id = $value;
                    break;
                case 'user' :
                    $this->user = $value;
                    break;
                case 'user_data' :
                    $this->user = new User($value);
                    break;
                case 'session_activity' :
                    $this->session_activity = $value;
                    break;
                case 'session_date_begin' :
                    $this->session_date_begin = $value;
                    break;
                case 'session_date_end' :
                    $this->session_date_end = $value;
                    break;
                case 'session_description' :
                    $this->session_description = $value;
                    break;
                case 'session_notice' :
                    $this->session_notice = $value;
                    break;
                case 'session_quality_beach' :
                    $this->session_quality_beach = $value;
                    break;
                case 'session_quality_water' :
                    $this->session_quality_water = $value;
                    break;
                case 'session_visit_human' :
                    $this->session_visit_human = $value;
                    break;
                case 'session_visit_boat' :
                    $this->session_visit_boat = $value;
                    break;
                case 'spot' :
                    $this->spot = $value;
                    break;
                case 'spot_data' :
                    $this->spot = new Spot($value);
                    break;
            }
        }
    }
    
    
    
    /**
     * @return mixed
     */
    public function getSessionId() {
        return $this->session_id;
    }
    /**
     * @param mixed $session_id
     */
    public function setSessionId($session_id) {
        $this->session_id = $session_id;
    }
    
    
    /**
     * @return mixed
     */
    public function getUser() {
        return $this->user;
    }
    /**
     * @param mixed $user
     */
    public function setUser($user) {
        $this->user = $user;
    }
    
    
    /**
     * @return mixed
     */
    public function getSessionActivity() {
        return $this->session_activity;
    }
    /**
     * @param mixed $session_activity
     */
    public function setSessionActivity($session_activity) {
        $this->session_activity = $session_activity;
    }
    
    
    /**
     * @return mixed
     */
    public function getSessionDateBegin() {
        return $this->session_date_begin;
    }
    /**
     * @param mixed $session_date_begin
     */
    public function setSessionDateBegin($session_date_begin) {
        $this->session_date_begin = $session_date_begin;
    }
    
    
    /**
     * @return mixed
     */
    public function getSessionDateEnd() {
        return $this->session_date_end;
    }
    /**
     * @param mixed $session_date_end
     */
    public function setSessionDateEnd($session_date_end) {
        $this->session_date_end = $session_date_end;
    }
    
    
    /**
     * @return mixed
     */
    public function getSessionDescription() {
        return $this->session_description;
    }
    /**
     * @param mixed $session_description
     */
    public function setSessionDescription($session_description) {
        $this->session_description = $session_description;
    }
    
    
    /**
     * @return mixed
     */
    public function getSessionNotice() {
        return $this->session_notice;
    }
    /**
     * @param mixed $session_notice
     */
    public function setSessionNotice($session_notice) {
        $this->session_notice = $session_notice;
    }
    
    
    /**
     * @return mixed
     */
    public function getSessionQualityBeach() {
        return $this->session_quality_beach;
    }
    /**
     * @param mixed $session_quality_beach
     */
    public function setSessionQualityBeach($session_quality_beach) {
        $this->session_quality_beach = $session_quality_beach;
    }
    
    
    /**
     * @return mixed
     */
    public function getSessionQualityWater() {
        return $this->session_quality_water;
    }
    /**
     * @param mixed $session_quality_water
     */
    public function setSessionQualityWater($session_quality_water) {
        $this->session_quality_water = $session_quality_water;
    }
    
    
    /**
     * @return mixed
     */
    public function getSessionVisitHuman() {
        return $this->session_visit_human;
    }
    /**
     * @param mixed $session_visit_human
     */
    public function setSessionVisitHuman($session_visit_human) {
        $this->session_visit_human = $session_visit_human;
    }
    
    
    /**
     * @return mixed
     */
    public function getSessionVisitBoat() {
        return $this->session_visit_boat;
    }
    /**
     * @param mixed $session_visit_boat
     */
    public function setSessionVisitBoat($session_visit_boat) {
        $this->session_visit_boat = $session_visit_boat;
    }
    
    
    /**
     * @return mixed
     */
    public function getSpot() {
        return $this->spot;
    }
    /**
     * @param mixed $spot
     */
    public function setSpot($spot) {
        $this->spot = $spot;
    }
}