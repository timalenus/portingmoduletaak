<?php

namespace Drupal\drupalmoduleupgrader\Plugin\DMU\Converter;

use Drupal\drupalmoduleupgrader\ConverterBase;
use Drupal\drupalmoduleupgrader\TargetInterface;
use Drupal\Core\Extension\ExtensionDiscovery;

/**
 * @Converter(
 *  id = "info",
 *  description = @Translation("Converts Drupal 7 info files to Drupal 8.")
 * )
 */
class InfoToYAML extends ConverterBase {

  /**
   * {@inheritdoc}
   */
  public function convert(TargetInterface $target) {
    $info_file = $target->getPath('.info');

    $info = self::parseInfo($info_file);
    $info['core'] = '8.x';
    $info['type'] = 'module';

    if (isset($info['dependencies'])) {
      // array_values() is called in order to reindex the array. Issue #2340207.
      $info['dependencies'] = array_values(array_diff($info['dependencies'], ['ctools', 'list']));
    }

    // Getting list of core modules.
    $listing = new ExtensionDiscovery(\Drupal::root());
    $modules = $listing->scan('module');

    // Initialize variable to store depenencies in latest format.
    $dependencies = [];
    foreach ($info['dependencies'] as $module_name) {
      // When the module is a core module then use dependency as drupal:{module_name}.
      if (!empty($modules[$module_name])) {
        $dependencies[$module_name] = 'drupal:' . $module_name;
      }
      // If module is a contrib module then use  dependency as {project_name}:{module_name}.
      else {
        $dependencies[$module_name] = $module_name . ':' . $module_name;
      }
    }

    // Setting up dependencies in drupal standard format.
    $info['dependencies'] = $dependencies;

    unset($info['files'], $info['configure'], $info['datestamp'], $info['version'], $info['project']);
    $this->writeInfo($target, 'info', $info);
  }

  /**
   * Parses a D7 info file. This is copied straight outta the D7 function
   * drupal_parse_info_format().
   */
  public static function parseInfo($file) {
    $info = [];
    $constants = get_defined_constants();
    $data = file_get_contents($file);

    if (preg_match_all('
      @^\s*                           # Start at the beginning of a line, ignoring leading whitespace
      ((?:
        [^=;\[\]]|                    # Key names cannot contain equal signs, semi-colons or square brackets,
        \[[^\[\]]*\]                  # unless they are balanced and not nested
      )+?)
      \s*=\s*                         # Key/value pairs are separated by equal signs (ignoring white-space)
      (?:
        ("(?:[^"]|(?<=\\\\)")*")|     # Double-quoted string, which may contain slash-escaped quotes/slashes
        (\'(?:[^\']|(?<=\\\\)\')*\')| # Single-quoted string, which may contain slash-escaped quotes/slashes
        ([^\r\n]*?)                   # Non-quoted string
      )\s*$                           # Stop at the next end of a line, ignoring trailing whitespace
      @msx', $data, $matches, PREG_SET_ORDER)) {
      foreach ($matches as $match) {
        // Fetch the key and value string.
        $i = 0;
        foreach (['key', 'value1', 'value2', 'value3'] as $var) {
          $$var = isset($match[++$i]) ? $match[$i] : '';
        }
        $value = stripslashes(substr($value1, 1, -1)) . stripslashes(substr($value2, 1, -1)) . $value3;

        // Parse array syntax.
        $keys = preg_split('/\]?\[/', rtrim($key, ']'));
        $last = array_pop($keys);
        $parent = &$info;

        // Create nested arrays.
        foreach ($keys as $key) {
          if ($key == '') {
            $key = count($parent);
          }
          if (!isset($parent[$key]) || !is_array($parent[$key])) {
            $parent[$key] = [];
          }
          $parent = &$parent[$key];
        }

        // Handle PHP constants.
        if (isset($constants[$value])) {
          $value = $constants[$value];
        }

        // Insert actual value.
        if ($last == '') {
          $last = count($parent);
        }
        $parent[$last] = $value;
      }
    }

    return $info;
  }

}
