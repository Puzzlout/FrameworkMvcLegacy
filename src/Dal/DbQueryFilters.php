<?php
/**
 * Class to manage the where and order by clauses in a SQL statement.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/EasyMvc
 * @since Version 1.0.0
 * @package DbQueryFilters
 */

namespace WebDevJL\Framework\Dal;

if (!FrameworkConstants_ExecutionAccessRestriction) {
  exit('No direct script access allowed');
}

class DbQueryFilters {
  public $selectFilters = false;
  public $whereFilters = false;
  public $orderByFilters = false;
  public $setFilters = false;

  public function selectFilters() {
    return $this->selectFilters;
  }
  
  public function whereFilters() {
    return $this->whereFilters;
  }
  public function orderByFilters() {
    return $this->orderByFilters;
  }
  public function setFilters() {
    return $this->setFilters;
  }
  
  public function setSelectFilters($selectFilters) {
    $this->selectFilters = $selectFilters;
  }
  
  public function setWhereFilters($whereFilters) {
    $this->whereFilters = $whereFilters;
  }
  public function setOrderByFilters($orderByFilters) {
    $this->orderByFilters = $orderByFilters;
  }
  public function setSetFilters($setFilters) {
    $this->setFilters = $setFilters;
  }
}
