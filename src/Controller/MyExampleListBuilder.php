<?php

/**
 * @file
 * Contains \Drupal\myexample\Controller\MyExampleListBuilder.
 */

namespace Drupal\myexample\Controller;

use Drupal\Core\Config\Entity\ConfigEntityListBuilder;
use Drupal\Core\Entity\EntityInterface;

/**
 * Provides a listing of MyExample.
 */
class MyExampleListBuilder extends ConfigEntityListBuilder {

  public function buildHeader() {
    //$header['label'] = $this->t('Name');
    //$header['id'] = $this->t('Machine name');
    $header['badword'] = $this->t('Bad word');
    $header['goodword'] = $this->t('Good word');

    return $header + parent::buildHeader();
  }

  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\myexample\Entity\MyExample */
    //$row['label'] = $entity->label();
    //$row['id'] = $entity->id();
    // You probably want a few more properties here...
    $row['badword'] = $entity->getBadWord();
    $row['goodword'] = $entity->getGoodWord();

    return $row + parent::buildRow($entity);
  }

}