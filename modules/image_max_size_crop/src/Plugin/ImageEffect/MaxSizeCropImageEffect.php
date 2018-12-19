<?php
namespace Drupal\image_max_size_crop\Plugin\ImageEffect;

use Drupal\Core\Image\ImageInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\image\ConfigurableImageEffectBase;

class MaxSizeCropImageEffect extends ConfigurableImageEffectBase {

  public function applyEffect(ImageInterface $image) {
    return TRUE;
  }
}

?>