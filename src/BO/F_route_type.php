<?php
namespace WebDevJL\Framework\BO;
if (!FrameworkConstants_ExecutionAccessRestriction) { exit('No direct script access allowed'); }

/*** @author Jeremie Litzler* @copyright Copyright (c) 2015* @licence http://opensource.org/licenses/gpl-license.php GNU Public License* @link https://github.com/WebDevJL/* @since Version 1.0.0.2* @package F_route_type*/
class F_route_type extends \WebDevJL\Framework\Core\Entity {  const F_ROUTE_TYPE_ID = "f_route_type_id";
  const F_ROUTE_TYPE_DESCRIPTION = "f_route_type_description";

  protected     $f_route_type_id,    $f_route_type_description;
  /**    * Sets f_route_type_id.  */  public function setF_route_type_id($f_route_type_id) {      $this->f_route_type_id = $f_route_type_id;  }
  /**    * Sets f_route_type_description.  */  public function setF_route_type_description($f_route_type_description) {      $this->f_route_type_description = $f_route_type_description;  }
  /**    * Gets f_route_type_id.  */  public function F_route_type_id() {    return $this->f_route_type_id;  }
  /**    * Gets f_route_type_description.  */  public function F_route_type_description() {    return $this->f_route_type_description;  }
}