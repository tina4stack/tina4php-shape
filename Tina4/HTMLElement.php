<?php
/**
 * Tina4 - This is not a 4ramework.
 * Copy-right 2007 - current Tina4
 * License: MIT https://opensource.org/licenses/MIT
 */

namespace Tina4;

/**
 * List of Html tags prefixed with a : for where the opening tag should go
 */
const HTML_ELEMENTS = [":!DOCTYPE", ":!--", ":a", ":abbr", ":acronym", ":address", ":applet", ":area", ":article", ":aside", ":audio", ":b", ":base", ":basefont", ":bb", ":bdo", ":big", ":blockquote", ":body", ":br/", ":button", ":canvas", ":caption", ":center", ":cite", ":code", ":col", ":colgroup", ":command", ":datagrid", ":datalist", ":dd", ":del", ":details", ":dfn", ":dialog", ":dir", ":div", ":dl", ":dt", ":em", ":embed", ":eventsource", ":fieldset", ":figcaption", ":figure", ":font", ":footer", ":form", ":frame", ":frameset", ":h1", ":h2", ":h3", ":h4", ":h5", ":h6", ":h7", ":head", ":header", ":hgroup", ":hr/", ":html", ":i", ":iframe", ":img/", ":input", ":ins", ":isindex", ":kbd", ":keygen", ":label", ":legend", ":li", ":link", ":map", ":mark", ":menu", ":meta/", ":meter", ":nav", ":noframes", ":noscript", ":object", ":ol", ":optgroup", ":option", ":output", ":p", ":param", ":pre", ":progress", ":q", ":rp", ":rt", ":ruby", ":s", ":samp", ":script", ":section", ":select", ":small", ":source", ":span", ":strike", ":strong", ":style", ":sub", ":sup", ":table", ":tbody", ":td", ":textarea", ":tfoot", ":th", ":thead", ":time", ":title", ":tr", ":track", ":tt", ":u", ":ul", ":var", ":video", ":wbr"];
/**
 * A way to code HTML5 elements using only PHP
 * @package Tina4
 */
class HTMLElement
{
    /**
     * String tag name like h1, p, b etc
     * @var false|string
     */
    private $tag = "";
    /**
     * An array of attributes -> name="test", class=""
     * @var array
     */
    private $attributes = [];

    /**
     * An array of html elements
     * @var array
     */
    private $elements = [];

    /**
     * HTMLElement constructor.
     * @param mixed ...$elements
     */
    public function __construct(...$elements)
    {
        //elements can be attributes or body parts
        foreach ($elements as  $element) {
            if (is_string($element) && in_array($element, HTML_ELEMENTS)) {
                $this->tag = substr($element, 1);
            } elseif (is_array($element)) {
                $this->sortElements($element);
            } else {
                $this->tag = substr($element, 1);
            }
        }
        //return $this;
    }

    /**
     * Sort the elements
     * @param $element
     */
    private function sortElements($element): void
    {
        foreach ($element as $pId => $param) {
            if (is_array($param)) {
                $this->sortElements($param);
            } else {
                if (is_object($param)) {
                    if (get_class($param) === "Tina4\HTMLElement") {
                        $this->elements[] = $param;
                    } else {
                        if (!empty($param)) {
                            echo "DEBUG {$param}";
                        }
                    }
                } else {
                    if (is_numeric($pId)) {
                        $this->elements[] = $param;
                    } else {
                        if ($pId == "_" || $pId == "" || $pId == " ") {
                            $this->attributes[] = [$param];
                        } else {
                            $this->attributes[] = [$pId => $param];
                        }
                    }
                }
            }
        }
    }

    /**
     * Outputs the html
     * @return string
     */
    public function __toString(): string
    {
        //Check what type of tag
        if ($this->tag === "document") {
            $html = "{$this->getElements()}";
        } elseif ($this->tag === "") {
            $html =  "{$this->getElements()}";
        } elseif ($this->tag[0] === "!") {
            if (strpos($this->tag, "!--") !== false) {
                $html =  "<$this->tag{$this->getAttributes()}{$this->getElements()}" . substr($this->tag, 1) . ">";
            } else {
                $html =  "<$this->tag{$this->getAttributes()}>";
            }
        } elseif ($this->tag[strlen($this->tag) - 1] === "/") {
            $html =  "<$this->tag{$this->getAttributes()}>{$this->getElements()}";
        } else {
            $html =  "<$this->tag{$this->getAttributes()}>{$this->getElements()}</{$this->tag}>";
        }

        return $html;
    }

    /**
     * Gets all the elements
     * @return string
     */
    private function getElements(): string
    {
        $html = "";
        foreach ($this->elements as $element) {
            $html .= $element;
        }
        return $html;
    }

    /**
     * Gets all the attributes for an HTML element
     * @return string
     */
    private function getAttributes(): string
    {
        $html = "";
        foreach ($this->attributes as $attribute) {
            if (is_array($attribute)) {
                foreach ($attribute as $key => $value) {
                    if (is_numeric($key)) {
                        $html .= " {$value}";
                    } else {
                        if (is_bool($value)) {
                            if ($value) {
                                $value = "true";
                            } else {
                                $value = "false";
                            }
                        }
                        if ($value !== null) {
                            $html .= " {$key}=\"{$value}\"";
                        }
                    }
                }
            }
        }
        return $html;
    }
}

/**$elements = "";
 * //Dynamic code for creating HTML Elements
 * foreach (HTML_ELEMENTS as $id => $ELEMENT) {
 * if ($ELEMENT === ":!--") {
 * $variableName = "comment";
 * } else {
 * $variableName = "_" . strtolower(str_replace("!", "", str_replace("-", "", str_replace("/", "", substr($ELEMENT, 1)))));
 * }
 *
 * eval ('
 * function ' . $variableName . ' (...$elements) {
 * return new HTMLElement("' . $ELEMENT . '", $elements);
 * }');
 *
 * $elements .= '
 * /**
 * HTML TAG '.$variableName.'
 * @param $elements
 * @return HTMLElement
 */
/**function ' . $variableName . ' (...$elements) {
 * return new HTMLElement("' . $ELEMENT . '", $elements);
 * }';
 * }
 *
 * echo $elements;
 **/
