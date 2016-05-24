<?php

/**
 * @file
 * Contains \Drupal\myexample\Entity\Example.
 */

namespace Drupal\myexample\Entity;

use Drupal\Core\Annotation\Translation;
use Drupal\Core\Config\Entity\ConfigEntityBase;
use Drupal\myexample\MyExampleInterface;

/**
 * Defines the Example entity.
 *
 * @ConfigEntityType(
 *   id = "myexample",
 *   label = @Translation("MyExample"),
 *   handlers = {
 *     "list_builder" = "Drupal\myexample\Controller\MyExampleListBuilder",
 *     "form" = {
 *       "add" = "Drupal\myexample\Form\MyExampleForm",
 *       "edit" = "Drupal\myexample\Form\MyExampleForm",
 *       "delete" = "Drupal\myexample\Form\MyExampleDeleteForm",
 *     }
 *   },
 *   config_prefix = "myexample",
 *   admin_permission = "administer site configuration",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *   },
 *   links = {
 *     "edit-form" = "/admin/config/system/myexample/{myexample}",
 *     "delete-form" = "/admin/config/system/myexample/{myexample}/delete",
 *   }
 * )
 */
class MyExample extends ConfigEntityBase implements MyExampleInterface {

  /**
   * The Example ID.
   *
   * @var string
   */
  public $id;

  /**
   * The Example label.
   *
   * @var string
   */
  public $label;

  /**
   * The Example bad word field.
   *
   * @var string
   */
  public $badword;

  /**
   * The Example good word field.
   *
   * @var string
   */
  public $goodword;

  // Your specific configuration property get/set methods go here,
  // implementing the interface.
}