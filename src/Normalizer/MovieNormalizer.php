<?php

namespace Drupal\movie\Normalizer;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\serialization\Normalizer\ContentEntityNormalizer;

/**
 * Normalizes/denormalizes Drupal movie entities into an array structure.
 */
class MovieNormalizer extends ContentEntityNormalizer {

  /**
   * {@inheritdoc}
   */
  protected $supportedInterfaceOrClass = 'Drupal\movie\MovieInterface';

  /**
   * {@inheritdoc}
   */
  public function normalize($entity, $format = NULL, array $context = []): array {
    $attributes = parent::normalize($entity, $format, $context);
    return [
      'id' => $attributes['id'][0]['value'],
      'title' => $attributes['title'][0]['value'],
      'release_date' => $attributes['release_date'][0]['value'],
      'genre' => $this->getGenre($entity),
    ];
  }

  /**
   * Gets the genre of the movie.
   *
   * @param \Drupal\Core\Entity\ContentEntityInterface $entity
   *   The movie entity.
   *
   * @return string
   *   The genre of the movie.
   * @throws \Drupal\Component\Plugin\Exception\InvalidPluginDefinitionException
   * @throws \Drupal\Component\Plugin\Exception\PluginNotFoundException
   */
  protected function getGenre($entity) {
    $genre = '';
    $field = $entity->get('genre');

    if ($field instanceof FieldItemListInterface) {
      $target_id = $field->target_id;
      $term = $this->entityTypeManager->getStorage('taxonomy_term')->load($target_id);
      if ($term) {
        $genre = $term->getName();
      }
    }
    return $genre;
  }

}
