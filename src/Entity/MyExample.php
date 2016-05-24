<?php

/**
* @file
* Contains \Drupal\myexample\Entity\MyExample.
*/

namespace Drupal\myexample\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;
use Drupal\myexample\MyExampleInterface;
use Drupal\Core\Annotation\Translation;
use Drupal\Core\Entity\Annotation\ConfigEntityType;

/**
* Defines the MyExample entity.
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
*     "goodword" = "goodword",
*     "badword" = "badword",
*   },
*   links = {
*     "edit-form" = "/admin/config/system/myexample/{myexample}",
*     "delete-form" = "/admin/config/system/myexample/{myexample}/delete",
*   }
* )
*/
class MyExample extends ConfigEntityBase implements MyExampleInterface {

/**
* The MyExample ID.
*
* @var string
*/
public $id;

/**
* The MyExample label.
*
* @var string
*/
public $label;

/**
 * The MyExample goodword.
 *
 * @var string
 */
public $goodword;


  /**
   * The MyExample baddword.
   *
   * @var string
   */
  public $badword;

// Your specific configuration property get/set methods go here,
// implementing the interface.

  /**
   * {@inheritdoc}
   */
  public function getLabel() {
    return $this->label;
  }

  /**
   * {@inheritdoc}
   */
  public function getGoodWord() {
    return $this->goodword;
  }

  /**
   * {@inheritdoc}
   */
  public function getBadWord() {
    return $this->badword;
  }
}