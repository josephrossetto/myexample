<?php
/**
* @file
* Contains \Drupal\myexample\MyExampleInterface.
*/

namespace Drupal\myexample;

use Drupal\Core\Config\Entity\ConfigEntityInterface;

/**
* Provides an interface defining a MyExample entity.
*/
interface MyExampleInterface extends ConfigEntityInterface {
// Add get/set methods for your configuration properties here.

  public function getLabel();

  public function getGoodWord();

  public function getBadWord();
}