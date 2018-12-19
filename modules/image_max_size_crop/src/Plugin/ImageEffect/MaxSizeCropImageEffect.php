<?php
namespace Drupal\image_max_size_crop\Plugin\ImageEffect;

use Drupal\Core\Image\ImageInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\image\ConfigurableImageEffectBase;

/**
 * Snij een afbeelding bij met respect tot een maximum afmeting. Enkel breedte of hoogte nodig.
 *
 * @ImageEffect(
 *   id = "image_max_size_crop",
 *   label = @Translation("Maximum size crop"),
 *   description = @Translation("Cropping will remove portions of an image to make it the specified dimensions. This style only resizes when the image dimension(s) is larger than the spedified dimension(s).")
 */

class MaxSizeCropImageEffect extends ConfigurableImageEffectBase {
    

  public function applyEffect(ImageInterface $image) {
    return TRUE;
  }
}

?>