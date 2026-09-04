<?php

declare(strict_types=1);

use Drupal\gazda_email_octopus\Form\GazdaOctopusSubscribeForm;

require dirname(__DIR__, 5) . '/vendor/autoload.php';
require dirname(__DIR__, 3) . '/contrib/email_octopus/src/Form/OctopusSubscribeForm.php';
require dirname(__DIR__) . '/src/Form/GazdaOctopusSubscribeForm.php';

$payload = GazdaOctopusSubscribeForm::buildContactPayload('john@example.com');
$expected = [
  'email_address' => 'john@example.com',
  'tags' => ['gazdabolt'],
  'status' => 'SUBSCRIBED',
];

if ($payload !== $expected) {
  fwrite(STDERR, 'Unexpected EmailOctopus contact payload.' . PHP_EOL);
  fwrite(STDERR, json_encode($payload, JSON_PRETTY_PRINT) . PHP_EOL);
  exit(1);
}

if (GazdaOctopusSubscribeForm::getAjaxWrapperSelector() !== '#dest-wrapper') {
  fwrite(STDERR, 'Success feedback has no explicit AJAX replacement target.' . PHP_EOL);
  exit(1);
}

echo 'Gazda EmailOctopus payload test passed.' . PHP_EOL;
