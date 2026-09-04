<?php

namespace Drupal\gazda_email_octopus\Plugin\Block;

use Drupal\email_octopus\Plugin\Block\SubscribeFormBlock;
use Drupal\gazda_email_octopus\Form\GazdaOctopusSubscribeForm;

/**
 * Provides the tagged Gazdabolt EmailOctopus subscription form.
 *
 * @Block(
 *   id = "gazda_email_octopus_subscribe_form_block",
 *   admin_label = @Translation("Gazdabolt EmailOctopus Subscribe Form"),
 *   category = @Translation("Custom Block")
 * )
 */
final class GazdaSubscribeFormBlock extends SubscribeFormBlock {

  /**
   * {@inheritdoc}
   */
  public function build(): array {
    $config = $this->getConfiguration();
    $form = $this->formBuilder->getForm(
      GazdaOctopusSubscribeForm::class,
      $config['api_list'],
      $config['title'],
      $config['body'],
      $config['message'],
    );
    $form['#cache']['max-age'] = 0;
    return $form;
  }

}