<?php

const CAMEL_REGEX = '/_[a-z]/';

class Helper
{
  static function toCamelCase($value)
  {
    $loweredValue = strtolower($value);

    preg_match_all(CAMEL_REGEX, $loweredValue, $matches);

    $camelCaseValue = '';

    // Loop through the matched string if it matched.
    // NOTE: Matches is a 2D array so the only one we need is the first value.
    foreach ($matches[0] as $match) {
      // Make the matched string uppercase without underscores.
      $upperMatch = strtoupper(($match));
      $formattedUpper = str_replace('_', '', $upperMatch);

      // Replace the matched string with the formatted one.
      $camelCaseValue = str_replace($match, $formattedUpper, $loweredValue);
    }

    return $camelCaseValue;
  }

  /**
   * Removes trailing forward slashes from the right of the route.
   * @param route (string)
   */
  static function formatRoute($route)
  {
    $result = rtrim($route, '/');

    if ($result === '') {
      return '/';
    }

    return $result;
  }
}
