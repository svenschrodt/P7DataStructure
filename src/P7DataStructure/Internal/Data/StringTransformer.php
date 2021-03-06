<?php
declare(strict_types = 1);
/**
 *P7DataStructure\Internal\Data\StringTransformer
 *
 * Transforming between different string naming conventions:
 *
 * - camelCase
 * - Camelcase
 * - snake_case
 * - URI encoded
 * - base64 encode etc.
 *
 * @todo recognizing current convention types
 *      
 *       !Do not use in production until it is stable!
 *
 * @package P7DataStructure
 * @author Sven Schrodt<sven@schrodt-service.net>
 * @link https://github.com/svenschrodt/P7DataStructure
 * @version 0.1
 * @since 2020-10-17
 */
namespace P7DataStructure\Internal\Data;
use P7DataStructure\Internal\Data\CommonStringLiterals as CSL;
class StringTransformer
{

    /**
     * Splitting string at Uppercased substrings
     *
     * @param string $string
     * @return array
     */
    public static function explodeUpperCaseSubstring(string $string): array
    {
        return preg_split('/(?=[A-Z])/', $string, - 1, PREG_SPLIT_NO_EMPTY);
    }

    /**
     * Splitting string at boudary sub string (default: CSL::SINGLE_UNDERSCORE)
     * into substrings
     *
     * @param string $string
     * @return array
     */
    public static function explodeAtBoundary(string $string, string $boundary = CSL::SINGLE_UNDERSCORE): array

    {
        return explode($boundary, $string);
    }

    /**
     * Getting camelCased | CamelCased string from string with common boundary sub string
     *
     * @param string $string
     * @param string $boundary
     * @return string
     */
    public static function getcamelCasedString(string $string, bool $upperFirst = false, string $boundary = CSL::SINGLE_UNDERSCORE)
    {
        $tmp = self::explodeAtBoundary($string, $boundary);

        for ($i = 0; $i < count($tmp); $i ++) {
            $tmp[$i] = ucfirst(strtolower($tmp[$i]));
        }
        $glued = implode('', $tmp);
        return ($upperFirst) ? $glued : lcfirst($glued);
    }
    
    public static function getsnakeCasedString(string $string, bool $lowercase= true)
    {
        $tmp = implode('_', self::explodeUpperCaseSubstring($string));
        return $tmp;
//         $ret = ($lowercase === true) : strtolower($tmp) ? $tmp;
    }
    
    /**
     * Encodig string for usage as URI (part) 
     * 
     * @see https://www.php.net/manual/de/function.urlencode.php
     * @see https://www.php.net/manual/de/function.rawurlencode.php
     * @see http://www.faqs.org/rfcs/rfc3986
     * @param string $string
     * @param bool $accordingRfc3986
     * @return string
     */
    public static function getUrlEncoded(string $string, bool $accordingRfc3986=false) : string
    {
        return ($accordingRfc3986) ? rawurldecode($string) : urlencode($string);
    }
}
