<?php
namespace Library\BO;
if (!FrameworkConstants_ExecutionAccessRestriction) { exit('No direct script access allowed'); }

/*** @author Jeremie Litzler* @copyright Copyright (c) 2015* @licence http://opensource.org/licenses/gpl-license.php GNU Public License* @link https://github.com/WebDevJL/* @since Version 1.0.0.2* @package F_route_css*/
class F_route_css extends \Library\Core\Entity {  const F_ROUTE_CSS_ID = "f_route_css_id";
  const F_ROUTE_CSS_FILE_PATH = "f_route_css_file_path";
  const F_ROUTE_ID = "f_route_id";

  protected     $f_route_css_id,    $f_route_css_file_path,    $f_route_id;
  /**    * Sets f_route_css_id.  */  public function setF_route_css_id($f_route_css_id) {      $this->f_route_css_id = $f_route_css_id;  }
  /**    * Sets f_route_css_file_path.  */  public function setF_route_css_file_path($f_route_css_file_path) {      $this->f_route_css_file_path = $f_route_css_file_path;  }
  /**    * Sets f_route_id.  */  public function setF_route_id($f_route_id) {      $this->f_route_id = $f_route_id;  }
  /**    * Gets f_route_css_id.  */  public function F_route_css_id() {    return $this->f_route_css_id;  }
  /**    * Gets f_route_css_file_path.  */  public function F_route_css_file_path() {    return $this->f_route_css_file_path;  }
  /**    * Gets f_route_id.  */  public function F_route_id() {    return $this->f_route_id;  }
}