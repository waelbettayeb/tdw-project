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
    public static function getFormationsBySchoolId($school_id){
        $query =
        "   SELECT  formation.id,
            formation.name,
            formation_type.name,
            hours_volume,
            ht,
            percentage_ttc 
            
            FROM formation
            INNER JOIN formation_type
                ON formation_type.id = type_id
            WHERE formation.school_id = '{$school_id}'
            ;";
          
        return self::query($query);
    }
    public static function getTypesFormationBySchoolId($school_id){
        $query =
        "   SELECT DISTINCT formation_type.id,
            formation_type.name
            FROM formation_type
            INNER JOIN formation
                ON formation_type.id = type_id
            WHERE formation.school_id = {$school_id}
            ;";
          
        return self::query($query);
    }
    public static function deleteSchoolById($school_id){
        $query =
            "DELETE FROM `school` WHERE `school`.`id` = {$school_id};";
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
            "SELECT school.id,
                    school.name,
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
    }public static function getSchoolByTypeId($typeId){
        $query =
            "SELECT school.id,
                    school.name,
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
                WHERE school_type.id = '{$typeId}';
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
    public static function getSchoolNameById($id){
        $query =
            "SELECT school.name,
            school_type.name,
            wilaya.name, 
            commune.name, 
            school.address, 
            school.phone_number 
            FROM commune 
                INNER JOIN wilaya 
                    ON wilaya_id = wilaya.id 
                INNER JOIN school 
                    ON school.commune_id = commune.id  
            LEFT JOIN school_type  
                    ON school_type.id = school.type_id
            WHERE school.id = '{$id}';";
        return self::query($query);
    }
    
    public static function getAccount($name){
        $query =
        "   SELECT account.name, account.password, account.privilege_id, comment_access, account.id
            FROM account
            WHERE account.name = '{$name}';";
        return self::query($query);
    }
    public static function getComment($school_id){
        $query =
        "   SELECT comment.id, comment.content, comment.date, account.name, account.privilege_id
            FROM comment
                LEFT JOIN account
                    ON account.id = comment.account_id
                LEFT JOIN account_privilege
                    ON account.privilege_id = account_privilege.id
            WHERE school_id = {$school_id}
            ORDER BY comment.date  DESC;";
        return self::query($query);
    }
    public static function insertComment($content, $user_id, $school_id){
        $query =
        "   INSERT INTO `comment` (`id`, `content`, `account_id`, `school_id`, `date`) VALUES 
        (NULL, '{$content}', '{$user_id}', '{$school_id}', CURRENT_TIMESTAMP);
        ";
        return self::query($query);
    }
    public static function getSchoolTypes(){
        $query = "SELECT * FROM `school_type`";
        return self::query($query);
    }
}