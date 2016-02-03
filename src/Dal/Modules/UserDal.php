<?php

namespace Puzzlout\Framework\Dal\Modules;

class UserDal extends \Puzzlout\Framework\Dal\BaseManager {

    public $userClassName = "";

    public function __construct($dao, $filters) {
        parent::__construct($dao, $filters);
        $this->userClassName = get_class(new \Puzzlout\Framework\BO\F_user());
    }

    public function selectAllUsers() {
        $sql = 'SELECT u.* FROM `user` u WHERE u.`user_role_id` <> 1';
        $query = $this->dao->query($sql);
        $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $this->userClassName);

        $list = $query->fetchAll();
        $query->closeCursor();

        return $list;
    }

    public function selectUserByTypeId($type, $id) {
        $sql = "SELECT u.* FROM `user` u WHERE u.`user_type` = :utype AND u.`user_value` = :uid";
        $sth = $this->dao->prepare($sql);
        $sth->bindValue(':utype', $type, \PDO::PARAM_STR);
        $sth->bindValue(':uid', $id, \PDO::PARAM_INT);
        $sth->execute();
        $sth->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $this->userClassName);
        $user_out = $sth->fetch();
        $sth->closeCursor();

        return $user_out;
    }

    public function selectUserTypeObjectByUserId($id) {
        $sql = "SELECT u.* FROM `user` u WHERE u.`user_id` = :user_id";
        $sth = $this->dao->prepare($sql);
        $sth->bindValue(':user_id', $id, \PDO::PARAM_INT);
        $sth->execute();
        $sth->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $this->userClassName);
        $user_out = $sth->fetch();
        if ($user_out instanceof \Puzzlout\Framework\BO\User) {
            switch ($user_out->user_type()) {
                case 'technician_id':
                    $sql = "SELECT t.* FROM `technician` t WHERE t.`technician_id` = :user_value_id";
                    $user_type_class = '\Applications\EasyMvc\Models\Dao\Technician';
                    break;
                case 'service_id':
                    $sql = "SELECT s.* FROM `service` s WHERE s.`service_id` = :user_value_id";
                    $user_type_class = '\Applications\EasyMvc\Models\Dao\Service';
                    break;
                case 'pm_id':
                    $sql = "SELECT p.* FROM `project_manager` p WHERE p.`pm_id` = :user_value_id";
                    $user_type_class = '\Applications\EasyMvc\Models\Dao\Project_manager';
                    break;
                default:
                    return false;
            }
            $sth = $this->dao->prepare($sql);
            $sth->bindValue(':user_value_id', $user_out->user_value(), \PDO::PARAM_INT);
            $sth->execute();
            $sth->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $user_type_class);
            $user_type_out = $sth->fetch();
            $sth->closeCursor();
            return $user_type_out;
        } else {
            return false;
        }
    }

}
