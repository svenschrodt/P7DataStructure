<?php declare(strict_types=1);
/**
 * \P7DataStructure\Internal\StringClass - Class representing string as object with methods to manipulate content
 *
 * - naming convention
 * - encoding (for URIs etc)
 *
 * @package P7DataStructure
 * @author Sven Schrodt<sven@schrodt-service.net>
 * @link https://github.com/svenschrodt/P7DataStructure
 * @version 0.1
 * @since 2021-10-17
 */

namespace P7DataStructure\Internal\Type;
use P7DataStructure\Internal\Data\CommonStringLiterals as CSL;
use P7DataStructure\Internal\Data\StringTransformer;

class StringClass
{

    /**
     * String content of current instance
     *
     * @var string
     */
    protected string  $_content = '';



    /**
     * Generic constructor function
     *
     * @param string $content
     */
    public function __construct(string $content = '')
    {
        $this->_content = $content;

    }

    public function length() : int
    {
        return strlen($this->_content);
    }
    
    /**
     * Converting current content into lower case
     *
     * @return StringClass
     */
    public function toLowerCase(): StringClass
    {
        $this->_content = strtolower($this->_content);
        return $this;
    }

    /**
     * Converting current content into upper case
     *
     * @return StringClass
     */
    public function toUpperCase(): StringClass
    {
        $this->_content = strtoupper($this->_content);
        return $this;
    }

    /**
     * Converting current content's first character into into lower case
     *
     * @return StringClass
     */
    public function toLowerFirst(): StringClass
    {
        $this->_content = lcfirst($this->_content);
        return $this;
    }

    /**
     * Converting current content's first character into upper case
     *
     * @return StringClass
     */
    public function toUpperFirst(): StringClass
    {
        $this->_content = ucfirst($this->_content);
        return $this;
    }
    
    /**
     * Converting current content into camelCased string, separarted by substring boundary
     * 
     * @param bool $firstUpper
     * @param string $boundary
     * @return StringClass
     */
    public function toCamelCase(bool $firstUpper = false, string $boundary = CSL::SINGLE_UNDERSCORE)
    {
        $this->_content = StringTransformer::getcamelCasedString($this->_content, $firstUpper,$boundary);
        return $this;
    }
    
    /**
     * Adding string content
     * 
     * @param string $content
     * @return StringClass
     */
    public function add(string $content) : StringClass
    {
        $this->_content += $content;
        return $this;
   }
   
   /**
    * Setting string content - current content will be overwritten
    *
    * @param string $content
    * @return StringClass
    */
   public function set(string $content) : StringClass
   {
       $this->_content = $content;
       return $this;
   }
   
   /**
    * Getting current string content of instance
    *
    * @return int
    */
   public function get() : string
   {
       return $this->_content;
   }
   
   /**
    * Deleting string content
    *
    * @param string $content
    * @return StringClass
    */
   public function delete() : StringClass
   {
       $this->_content = '';
       return $this;
   }
    
    /**
     * Getting index (first character's position) of substring in current instance
     * Returning false, if not found
     * 
     * @param string $string
     * @return int | false
     */
    public function lastIndexOf(string $string)
    {
        return strrpos($this->_content, $string);
    }

    /**
     * Splitting string into substrings separated by boundary string
     * 
     * @param string $boundary
     * @return array
     */
    public function split(string $boundary ) : array
    {
        /**
         * @todo adding optional parameter for deciding behaviour on $boundary not found
         * - returning [], [$boundary], false, null ??
         */ 
        return explode($boundary , $this->_content); 
    }
      
    
    /**
     * Magical interceptor invoked, if instance is used in string context
     * - returning string representation of current content
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->_content;
    }
} 