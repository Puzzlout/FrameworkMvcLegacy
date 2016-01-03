<?php
namespace WebDevJL\Framework\BO;
/*** @author Jeremie Litzler* @copyright Copyright (c) 2015* @licence http://opensource.org/licenses/gpl-license.php GNU Public License* @link https://github.com/WebDevJL/* @since Version 1.0.0.2* @package F_document*/
class F_document extends \WebDevJL\Framework\Core\Entity {  const F_DOCUMENT_ID = "f_document_id";  const F_DOCUMENT_CONTENT_TYPE = "f_document_content_type";  const F_DOCUMENT_CATEGORY = "f_document_category";  const F_DOCUMENT_CATEGORY_ID_VALUE = "f_document_category_id_value";  const F_DOCUMENT_VALUE = "f_document_value";  const F_DOCUMENT_SIZE = "f_document_size";  const F_DOCUMENT_TITLE = "f_document_title";
  protected     $f_document_id,    $f_document_content_type,    $f_document_category,    $f_document_category_id_value,    $f_document_value,    $f_document_size,    $f_document_title;
  /**    * Sets f_document_id.  */  public function setF_document_id($f_document_id) {      $this->f_document_id = $f_document_id;  }
  /**    * Sets f_document_content_type.  */  public function setF_document_content_type($f_document_content_type) {      $this->f_document_content_type = $f_document_content_type;  }
  /**    * Sets f_document_category.  */  public function setF_document_category($f_document_category) {      $this->f_document_category = $f_document_category;  }
  /**    * Sets f_document_category_id_value.  */  public function setF_document_category_id_value($f_document_category_id_value) {      $this->f_document_category_id_value = $f_document_category_id_value;  }
  /**    * Sets f_document_value.  */  public function setF_document_value($f_document_value) {      $this->f_document_value = $f_document_value;  }
  /**    * Sets f_document_size.  */  public function setF_document_size($f_document_size) {      $this->f_document_size = $f_document_size;  }
  /**    * Sets f_document_title.  */  public function setF_document_title($f_document_title) {      $this->f_document_title = $f_document_title;  }
  /**    * Gets f_document_id.  */  public function F_document_id() {    return $this->f_document_id;  }
  /**    * Gets f_document_content_type.  */  public function F_document_content_type() {    return $this->f_document_content_type;  }
  /**    * Gets f_document_category.  */  public function F_document_category() {    return $this->f_document_category;  }
  /**    * Gets f_document_category_id_value.  */  public function F_document_category_id_value() {    return $this->f_document_category_id_value;  }
  /**    * Gets f_document_value.  */  public function F_document_value() {    return $this->f_document_value;  }
  /**    * Gets f_document_size.  */  public function F_document_size() {    return $this->f_document_size;  }
  /**    * Gets f_document_title.  */  public function F_document_title() {    return $this->f_document_title;  }
}