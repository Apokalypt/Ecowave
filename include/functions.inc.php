<?php
// Redirection if direct access <=> session not active
if (session_status() !== PHP_SESSION_ACTIVE) {
    header('Location:../?page=error404');
    exit();
}

/** @var $page */ // This line indicates that we use a variable named '$page'

/**
 * This function return the title to show
 *
 * @return string
 */
function getTitle() {
    global $page;
    
    switch ($page) {
        case EnumPages::Error404:
            return '404 ERROR';
        default:
            return 'Nuit de l\'Info';
    }
}

/**
 * This function return the string associated to the tag in parameter from the file 'string.json'
 *
 * @param $tag
 * @return mixed
 */
function getString($tag) {
    return json_decode(file_get_contents('traduction.json'), true)[$tag][$_SESSION['lang']];
}


function getDataTideHeightByAPI($file){
    return json_decode(file_get_contents($file),true)['data']['weather'][0]['tides'][0]['tide_data'][0]['tideHeight_mt'];
}

function getDataTideDateTimeByAPI($file){
    $dateTime = json_decode(file_get_contents($file),true)['data']['weather'][0]['tides'][0]['tide_data'][0]['tideDateTime'];
    $expl= explode(" ",$dateTime);
    return $expl[1];
}

function getDataWindSpeedByAPI($file){
    return json_decode(file_get_contents($file),true)['data']['weather'][0]['hourly'][0]['windspeedKmph'];
}

function getDataWindDirectionByAPI($file){
    return json_decode(file_get_contents($file),true)['data']['weather'][0]['hourly'][0]['winddir16Point'];
}

function getDataSwellDirectionByAPI($file){
    return json_decode(file_get_contents($file),true)['data']['weather'][0]['hourly'][0]['swellDir'];
}

function getDataSwellHeightByAPI($file){
    return json_decode(file_get_contents($file),true)['data']['weather'][0]['hourly'][0]['swellHeight_m'];
}

function getDataWeatherByAPI($file){
    if ($_SESSION['lang']=='fr'){
        return json_decode(file_get_contents($file),true)['data']['weather'][0]['hourly'][0]['lang_fr'][0]['value'];
    } else {
        return json_decode(file_get_contents($file),true)['data']['weather'][0]['hourly'][0]['weatherDesc'][0]['value'];
    }

}



/** This function return the string passed in parameter in UTF-8 encoding
 *
 * @param $string
 * @return string
 */
function encodeToUTF8($string) {
    return mb_convert_encoding($string, "UTF-8");
}



/**
 * This function add a 's' if the number is different than 1
 *
 * @param $count
 * @param $text
 * @return string
 */
function pluralize( $count, $text ) {
    return $count . ( ( $count == 1 ) ? ( " $text" ) : ( " ${text}s" ) );
}

/**
 * Return the difference between 2 dates
 *
 * @param $date1
 * @param $date2
 * @return string
 */
function compareTwoDate($date1, $date2) {
    $interval = date_create($date2)->diff( date_create($date1) );
    $suffix = ( $interval->invert ? ' ago' : '' );
    if ( $v = $interval->y >= 1 ) return pluralize( $interval->y, 'year' ) . $suffix;
    if ( $v = $interval->m >= 1 ) return pluralize( $interval->m, 'month' ) . $suffix;
    if ( $v = $interval->d >= 1 ) return pluralize( $interval->d, 'day' ) . $suffix;
    if ( $v = $interval->h >= 1 ) return pluralize( $interval->h, 'hour' ) . $suffix;
    if ( $v = $interval->i >= 1 ) return pluralize( $interval->i, 'minute' ) . $suffix;
    return pluralize( $interval->s, 'second' ) . $suffix;
}

/**
 * This function compare the date in parameter with the current date
 *
 * @param $date1
 * @return string
 */
function compareDateToNow($date1) {
    return compareTwoDate($date1, (new Manager(new MyPDO()))->getTimeNow());
}



/**
 * This function return the string passed in parameter with sha1 encryption
 *
 * @param $string
 * @return string
 */
function encryptStringNoDecrypt($string) {
    return sha1(sha1(encodeToUTF8($string)) . encodeToUTF8(SALT));
}

/**
 * This function return the string passed in parameter with an encryption that can be decrypted
 *
 * @param $string
 * @return false|string
 */
function encryptStringWithDecrypt($string) {
    return openssl_encrypt(encodeToUTF8($string . SALT), "AES-128-ECB" ,encodeToUTF8(SALT));
}
/**
 * This function return the string passed in parameter once the parameter is decrypted
 *
 * @param $string
 * @return false|string
 */
function decrypt($string) {
    $stringDecrypt = openssl_decrypt(encodeToUTF8($string), "AES-128-ECB" ,encodeToUTF8(SALT));
    return str_replace(SALT, '', $stringDecrypt);
}

/**
 * This function check if all elements is set in array passed in parameter
 *
 * @param array $array
 * @param mixed ...$elements
 * @return bool
 */
function allIsSet(array $array, ...$elements) {
    $allIsSet = true;
    
    foreach ($elements as $element) {
        $allIsSet = $allIsSet && isset($array[$element]);
    }
    
    return $allIsSet;
}
/**
 * This function check if at least one element is set in array passed in parameter
 *
 * @param array $array
 * @param mixed ...$elements
 * @return bool
 */
function oneIsSet(array $array, ...$elements) {
    $oneIsSet = false;
    
    foreach ($elements as $element) {
        $oneIsSet = $oneIsSet || isset($array[$element]);
    }
    
    return $oneIsSet;
}

/**
 * This function check if all elements is empty in array passed in parameter
 *
 * @param array $array
 * @param mixed ...$elements
 * @return bool
 */
function allIsEmpty(array $array, ...$elements) {
    $allIsEmpty = true;
    
    foreach ($elements as $element) {
        $allIsEmpty = $allIsEmpty && empty($array[$element]);
    }
    
    return $allIsEmpty;
}
/**
 * This function check if at least one element is empty in array passed in parameter
 *
 * @param array $array
 * @param mixed ...$elements
 * @return bool
 */
function oneIsEmpty(array $array, ...$elements) {
    $oneIsEmpty = false;
    
    foreach ($elements as $element) {
        $oneIsEmpty = $oneIsEmpty || empty($array[$element]);
    }
    
    return $oneIsEmpty;
}

/**
 * This function return the value in array if there is one if not return an empty string
 *
 * @param array $array
 * @param $key
 * @return mixed|string
 */
function arrayValue(array $array, $key) {
    if (isset($array[$key])) {
        return $array[$key];
    } else {
        return '';
    }
}

/**
 * This function check if parameter correspond to email format
 *
 * @param $email
 * @return mixed
 */
function isEmail($email) {
    return filter_var(strtolower($email), FILTER_VALIDATE_EMAIL);
}

/** This function return value in numeric format
 * if the parameter isn't numeric -> return 0
 *
 * @param $val
 * @return int|string
 */
function asNumeric($val) {
    if (is_numeric($val)) {
        return $val + 0;
    }
    return 0;
}
