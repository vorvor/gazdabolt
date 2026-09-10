
/**
 * Gazdabolt trusted host configuration.
 *
 * Prevents Host-header poisoning of canonical URLs and structured metadata.
 */
$settings['trusted_host_patterns'] = [
  '^gazdaboltszentendre\.hu$',
  '^www\.gazdaboltszentendre\.hu$',
  '^hermes-drupal-test\.lndo\.site$',
  '^localhost$',
  '^127\.0\.0\.1$',
  '^default$',
];
