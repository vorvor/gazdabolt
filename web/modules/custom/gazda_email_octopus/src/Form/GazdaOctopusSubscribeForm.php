<?php

namespace Drupal\gazda_email_octopus\Form;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\ReplaceCommand;
use Drupal\Core\Form\FormStateInterface;
use Drupal\email_octopus\Form\OctopusSubscribeForm;

/**
 * Subscribes Gazdabolt contacts with the Gazdabolt audience tag.
 */
final class GazdaOctopusSubscribeForm extends OctopusSubscribeForm {

  /**
   * Builds the EmailOctopus contact payload.
   */
  public static function buildContactPayload(string $email): array {
    return [
      'email_address' => $email,
      'tags' => ['gazdabolt'],
      'status' => 'SUBSCRIBED',
    ];
  }

  /**
   * Returns the element replaced by the AJAX callback.
   */
  public static function getAjaxWrapperSelector(): string {
    return '#dest-wrapper';
  }

  /**
   * Replaces the subscription controls with validation or success feedback.
   */
  public function updateTo(array $form, FormStateInterface $form_state): AjaxResponse {
    $response = new AjaxResponse();
    $response->addCommand(new ReplaceCommand(self::getAjaxWrapperSelector(), $form['dest_wrapper']));
    return $response;
  }

  /**
   * {@inheritdoc}
   */
  public function subscribe($email, $listid) {
    $key = $this->config('octopus.adminsettings')->get('api_key');
    if (!$key) {
      return '0';
    }

    try {
      $this->httpClient->request('POST', 'https://emailoctopus.com/api/1.6/lists/' . $listid . '/contacts', [
        'timeout' => 300,
        'headers' => ['Content-Type' => 'application/json'],
        'query' => ['api_key' => $key],
        'json' => self::buildContactPayload($email),
      ]);
      return '1';
    }
    catch (\GuzzleHttp\Exception\RequestException $exception) {
      $response = $exception->getResponse();
      $data = $response ? json_decode((string) $response->getBody(), TRUE) : [];
      return ($data['error']['code'] ?? NULL) === 'MEMBER_EXISTS_WITH_EMAIL_ADDRESS' ? '2' : '0';
    }
  }

}