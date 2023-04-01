<?php

namespace Drupal\movie\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;

/**
 * Provides a DateMustBeInThePast constraint.
 *
 * @Constraint(
 *   id = "MovieDateMustBeInThePast",
 *   label = @Translation("DateMustBeInThePast", context = "Validation"),
 * )
 *
 * @DCG
 * To apply this constraint, see https://www.drupal.org/docs/drupal-apis/entity-api/entity-validation-api/providing-a-custom-validation-constraint.
 */
class DateMustBeInThePastConstraint extends Constraint {

  public $message = 'The Release Date cannot be in the future.';

}
