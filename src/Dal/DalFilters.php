<?php

/**
 *
 * @package		Easy MVC Framework
 * @author		Jeremie Litzler
 * @copyright	Copyright (c) 2015
 * @license		
 * @link		
 * @since		
 * @filesource
 */
// ------------------------------------------------------------------------

/**
 * DalFilters Class
 *
 * @package		Library
 * @category	DAL
 * @category	DalFilters
 * @author		Jeremie Litzler
 * @link		
 */

namespace WebDevJL\Framework\Dal;

class DalFilters {

  protected
          $select_filters = array(),
          $where_filters = array(),
          $order_by_filters = array(),
          $join_filters = array();

  // SETTERS //
  public function setSelect_Filters($select_filters) {
    $this->select_filters = $select_filters;
  }

  public function setWhere_Filters($where_filters) {
    $this->where_filters = $where_filters;
  }

  public function setOrder_By_Filters($order_by_filters) {
    $this->order_by_filters = $order_by_filters;
  }

  public function setJoin_Filters($join_filters) {
    $this->join_filters = $join_filters;
  }

  // GETTERS //
  public function select_filters() {
    return $this->select_filters;
  }

  public function where_filters() {
    return $this->where_filters;
  }

  public function order_by_filters() {
    return $this->order_by_filters;
  }

  public function join_filters() {
    return $this->join_filters;
  }

}
