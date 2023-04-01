<?php

namespace Drupal\movie\Plugin\Validation\Constraint;

use Drupal\Core\Datetime\DrupalDateTime;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Validates the DateMustBeInThePast constraint.
 */
class DateMustBeInThePastConstraintValidator extends ConstraintValidator {

  /**
   * {@inheritdoc}
   */
  public function validate($entity, Constraint $constraint) {
    $entity = $entity->getEntity();
    $release_date = new DrupalDateTime($entity->get('release_date')->getString());
    $now = new DrupalDateTime('now');

    if ($release_date > $now) {
      $this->context->addViolation($constraint->message);
    }

  }

}
