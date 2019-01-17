<?php
class DB {
    public static $host = 'localhost:3306';
    public static $dbname = 'projet';
    public static $user = 'root';
    public static $dbpass = '';
    private static function connect() {
        $pdo = new PDO('mysql:host='.self::$host.';' .
                        'dbname='.self::$dbname.';' .
                        'charset=utf8',
                    self::$user, self::$dbpass);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    public static function query($query, $params = array()) {
        $stmt = self::connect()->prepare($query);
        $stmt->execute($params);
        $data = $stmt->fetchAll();
        return $data;
    }
    public static function getFormations(){
        $query =
            "SELECT type_id, formation.id, type_name, name, hours, htt, percentage 
            FROM types_formation 
            INNER JOIN formation ON type_id = types_formation.id 
            ORDER BY type_name, name ASC;";
        return self::query($query);
    }
    public static function getFormationById($formation_id){
        $query =
            "SELECT type_id, formation.id, type_name, name, hours, htt, percentage 
            FROM types_formation
            WHERE formation.id = {$formation_id}
            INNER JOIN formation ON type_id = types_formation.id 
            ORDER BY type_name, name ASC;";
        return self::query($query);
    }
    public static function deleteFormationById($formation_id){
        $query =
            "DELETE FROM `formation` WHERE `formation`.`id` = {$formation_id};";
        return self::query($query);
    }
    public static function deleteTypeFormationById($type_formation_id){
        $query =
            "DELETE FROM `types_formation` 
            WHERE `types_formation`.`id` = {$type_formation_id};";
        return self::query($query);
    }

    public static function updateFormationById($formation_id, $formation_name,
                                            $hourly_volume, $price, $ttc_percentage){
        $query =
            "UPDATE `formation`
             SET `name` = '{$formation_name}',
            `hours` = '{$hourly_volume}',
            `htt` = '{$price}',
            `percentage` = '{$ttc_percentage}'
            WHERE `formation`.`id` = '{$formation_id}'";
        return self::query($query);
    }
    public static function updateTypeFormationById($type_formation_id, $type_formation_name){
        $query = "UPDATE `types_formation` SET `type_name` = '{$type_formation_name}' 
                  WHERE `types_formation`.`id` = {$type_formation_id}";
        return self::query($query);
    }

    public static function addFormation($formation_name, $hourly_volume, $price,
                                     $ttc_percentage, $type_formation_id){
        $query =
            "INSERT INTO formation(name, hours, htt, percentage, type_id) 
            VALUES ('{$formation_name}', '{$hourly_volume}', '{$price}', 
            '{$ttc_percentage}', '{$type_formation_id}');";
        return self::query($query);
    }
    public static function addTypeFormation($type_formation_name){
        $query =
            "INSERT INTO types_formation(type_name) 
            VALUES ('{$type_formation_name}');";
        return self::query($query);
    }
    public static function getSchoolByType($type){
        $query =
            "SELECT school.name,
                    school_type.name,
                    domain.name, 
                    wilaya.name, 
                    commune.name, 
                    school.address, 
                    school.phone_number 
            FROM commune 
                INNER JOIN wilaya 
                    ON wilaya_id = wilaya.id 
                INNER JOIN school 
                    ON school.commune_id = commune.id  
                LEFT JOIN domain 
                    ON domain.id = school.domain
                LEFT JOIN school_type  
                    ON school_type.id = school.type_id
                WHERE school_type.name = '{$type}';
            ";
                    
        return self::query($query);
    }
    public static function getCommune(){
        $query =
            "SELECT wilaya.name, commune.name, wilaya.id, commune.id
            FROM wilaya 
            INNER JOIN commune ON wilaya_id = wilaya.id 
            ORDER BY wilaya.id  ASC;";
        return self::query($query);
    }
}