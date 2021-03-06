<?php

namespace Drupal\basiccart\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\basiccart\Utility;

class AddToCart extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
   
  return 'basiccart_addtocart_form';
  	
  }
  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, $id = NULL, $entitytype = NULL, $langcode = NULL) {
    $config = Utility::cart_settings();
    $form['id'] = array(
      '#type' => 'hidden',
      '#required' => TRUE,
      '#value' => $id,  
    );
    $form['entitytype'] = array(
      '#type' => 'hidden',
      '#required' => TRUE,
      '#value' => $entitytype,  
    );
    $form['langcode'] = array(
      '#type' => 'hidden',
      '#required' => TRUE,
      '#value' => $langcode,  
    );    

    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => t($config->get('add_to_cart_button')),
    );
    return $form;
  }


  /**
   * {@inheritdoc}
   */
 public function submitForm(array &$form,FormStateInterface $form_state) {
	 $id = (int) $form_state->getValue('id');
   $langcode = $form_state->getValue('langcode');
   $entitytype = $form_state->getValue('entitytype');
   $params = array("quantity" => 1, "langcode" => $langcode, "entitytype" => $entitytype);
   Utility::add_to_cart($id, $params);
  }

}

