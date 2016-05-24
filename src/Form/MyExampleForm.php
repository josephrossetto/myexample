<?php

/**
 * @file
 * Contains \Drupal\myexample\Form\MyExampleForm.
 */

namespace Drupal\myexample\Form;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityForm;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Entity\Query\QueryFactory;
use Drupal\Core\Form\FormStateInterface;

class MyExampleForm extends EntityForm {

  /**
   * @param \Drupal\Core\Entity\Query\QueryFactory $entity_query
   *   The entity query.
   */
  public function __construct(QueryFactory $entity_query) {
    $this->entityQuery = $entity_query;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('entity.query')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    /** @var \Drupal\myexample\Entity\MyExample $entity */
    $myexample = $this->entity;

    $form['label'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $myexample->label(),
      '#description' => $this->t("Label for the MyExample."),
      '#required' => TRUE,
    );
    $form['id'] = array(
      '#type' => 'machine_name',
      '#default_value' => $myexample->id(),
      '#machine_name' => array(
        'exists' => array($this, 'exist'),
      ),
      '#disabled' => !$myexample->isNew(),
    );


    // You will need additional form elements for your custom properties.
    $form['badword'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Bad word'),
      '#maxlength' => 255,
      '#default_value' => $myexample->getBadWord(),
      '#description' => $this->t("Label for the Bad word."),
      '#required' => TRUE,
    );
    $form['goodword'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Good word'),
      '#maxlength' => 255,
      '#default_value' => $myexample->getGoodWord(),
      '#description' => $this->t("Label for the Good word."),
      '#required' => TRUE,
    );


    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $myexample = $this->entity;
    $status = $myexample->save();

    if ($status) {
      drupal_set_message($this->t('Saved the %label MyExample.', array(
        '%label' => $myexample->label(),
      )));
    }
    else {
      drupal_set_message($this->t('The %label MyExample was not saved.', array(
        '%label' => $myexample->label(),
      )));
    }

    $form_state->setRedirect('entity.myexample.collection');
  }

  public function exist($id) {
    $entity = $this->entityQuery->get('myexample')
      ->condition('id', $id)
      ->execute();
    return (bool) $entity;
  }
}