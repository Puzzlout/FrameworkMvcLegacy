<?php

namespace WebDevJL\Framework\Core;

abstract class Entity implements \ArrayAccess {

  public function __construct(array $assocArray = array()) {
    if (!empty($assocArray)) {
      $this->hydrate($assocArray);
    }
  }

  public function hydrate(array $data) {
    foreach ($data as $propertyName => $value) {
      $setProperty = 'set' . ucfirst($propertyName);

      if (is_callable(array($this, $setProperty))) {
        $this->$setProperty($value);
      }
    }
  }

  public function offsetGet($var) {
    if (isset($this->$var) && is_callable(array($this, $var))) {
      return $this->$var();
    }
  }

  public function offsetSet($var, $value) {
    $method = 'set' . ucfirst($var);

    if (isset($this->$var) && is_callable(array($this, $method))) {
      $this->$method($value);
    }
  }

  public function offsetExists($var) {
    return isset($this->$var) && is_callable(array($this, $var));
  }

  public function offsetUnset($var) {
    throw new \Exception('Impossible to delete $var.');
  }

}
