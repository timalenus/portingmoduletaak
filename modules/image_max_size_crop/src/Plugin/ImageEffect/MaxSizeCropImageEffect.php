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

class MaxSizeCropImageEffect extends CropImageEffect {
    

    public function applyEffect(ImageInterface $image) {
        return TRUE;
    }
    
    public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
        $form = parent::buildConfigurationForm($form, $form_state);
        unset($form['width']['#required']);
        unset($form['height']['#required']);
        return $form;
    }

    public function validateConfigurationForm(array &$form, FormStateInterface $form_state) {
        parent::validateConfigurationForm($form, $form_state);
        if ($form_state->isValueEmpty('width') && $form_state->isValueEmpty('height')) {
            $form_state->setErrorByName('data', $this->t('Width and height can not both be blank.'));
        }
    }   
}
?>