<?php

namespace Drupal\styling_profiles\Plugin\styling_profiles\Handler;

/**
 * Process profile selection with domain switch.
 *
 * @StylingProfilesHandler(
 *   id = "domain_profile",
 *   name = @Translation("Domain profile selector"),
 *   weight = 150
 * )
 */
class DomainProfileHandler extends Content {

  /**
   *
   */
  public function getProfile(string $profile) {
    $config = \Drupal::config('styling_profiles_domain_switch.settings');
    $activeDomainID = \Drupal::service('domain.negotiator')->getActiveId();
    $domainProfile = $config->get($activeDomainID . '_site');
    if ($domainProfile) {
      return $domainProfile;
    }
    else {
      return $profile;
    }
  }

}
