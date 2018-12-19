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
        //als de width leeg is of niet groot genoeg
	   $original_width = $this->configuration['width'];
	   if (!$this->configuration['width'] || $this->configuration['width'] > $image->getWidth()) {
		  $this->configuration['width'] = $image->getWidth();
	   }

	   //als de height leeg is of niet hoog genoeg
	   $original_height = $this->configuration['height'];
	   if (!$this->configuration['height'] || $this->configuration['height'] > $image->getHeight()) {
		  $this->configuration['height'] = $image->getHeight();
	   }

	   $result = parent::applyEffect($image);

	   // Restore configuration so that settings screen is shown correctly.
	   $this->configuration['width'] = $original_width;
	   $this->configuration['height'] = $original_height;

	   return $result;
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