<?php


namespace Drupal\myexample\Controller;


use Drupal\Core\Entity\Query\QueryFactory;

class MyExampleController {

  public function getWordReplacer(){

    $query = \Drupal::service('entity.query');

    /** @var QueryFactory $query */
    $ids = $query->get('myexample')
      ->execute();

    $bannedwords = \Drupal\myexample\Entity\MyExample::loadMultiple($ids);

    return $bannedwords;
  }

}