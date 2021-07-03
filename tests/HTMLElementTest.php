<?php

use PHPUnit\Framework\TestCase;

/**
 * Test cases for the HTML Element class
 * Class HTMLElementTest
 */
class HTMLElementTest extends TestCase
{

    function testHTMLElement(): void
    {
        $htmlElement = new \Tina4\HTMLElement(":h1",  ["Hello"]);
        $this->assertEquals("<h1>Hello</h1>", $htmlElement."" );
    }

    function testElements(): void
    {
        //$this->assertEquals("<></>",  _([])."");
        $this->assertEquals("<!--Some Comments-->",  _comment("Some Comments")."");
        $this->assertEquals("<!DOCTYPE html>",  _doctype(["html"])."");
        $this->assertEquals('<a href="https://google.com">Link</a>',  _a(["href" => "https://google.com"], "Link")."");
        $this->assertEquals('<abbr title="Cascading Style Sheets">CSS</abbr>', _abbr(["title" => "Cascading Style Sheets"], "CSS"));
        $this->assertEquals('<abbr title="Cascading Style Sheets">CSS</abbr>', _acronym(["title" => "Cascading Style Sheets"], "CSS"));
        $this->assertEquals('<address>Some address</address>',  _address("Some address")."");
        $this->assertEquals('<applet>No longer supported</applet>',  _applet("No longer supported")."");
        $this->assertEquals('<area shape="rect" coords="34,44,270,350" alt="Computer" href="computer.html">', _area(["shape" => "rect", "coords"=>"34,44,270,350", "alt" => "Computer", "href" => "computer.html"])."");
        $this->assertEquals('<article>Some article</article>',  _article("Some article")."");
        $this->assertEquals('<aside>Some text</aside>',  _aside("Some text")."");
        $this->assertEquals('<audio controls><source src="horse.ogg" type="audio/ogg"></audio>', _audio(["controls"], _source(["src" => "horse.ogg", "type" => "audio/ogg"]))."");
        $this->assertEquals('<b>Some text</b>',  _b("Some text")."");
        $this->assertEquals('<head><base href="https://somesite.com/" target="_blank"></head>', _head(_base(["href" => "https://somesite.com/", "target" => "_blank"]))."");
        $this->assertEquals('<basefont color="blue">',  _basefont(["color" => "blue"])."");
        $this->assertEquals('<ul><li>User <bdi>إيان</bdi>: 90 points</li></ul>', _ul(_li("User ",_bdi("إيان"),": 90 points") )."" );
        $this->assertEquals('<bdo dir="rtl">This text will go right-to-left.</bdo>', _bdo(["dir" => "rtl"], "This text will go right-to-left.")."");
        $this->assertEquals('<big>No longer supported</big>',  _big("No longer supported")."");
        $this->assertEquals('<blockquote cite="http://somewhere.com/text.html">Some text</blockquote>',  _blockquote(["cite" => "http://somewhere.com/text.html"], "Some text")."");
        $this->assertEquals('<body>Some text</body>',  _body("Some text")."");
        $this->assertEquals('<br />',  _br()."");
        $this->assertEquals('<button type="button">Click Me!</button>', _button(["type" => "button"], "Click Me!")."");
        $this->assertEquals('<canvas id="myCanvas">Your browser does not support canvases</canvas>',  _canvas(["id" => "myCanvas"], "Your browser does not support canvases")."");
        $this->assertEquals('<table><caption>Monthly savings</caption></table>', _table(_caption("Monthly savings"))."");
        $this->assertEquals('<center>No longer supported</center>',  _center("No longer supported")."");
        $this->assertEquals('<cite>Some text</cite>',  _cite("Some text")."");
        $this->assertEquals('<code>Some code</code>',  _code("Some code")."");
        $this->assertEquals('<samp>Some text</samp>',  _samp("Some text")."");
        $this->assertEquals('<kbd>Ctrl</kbd> + <kbd>C</kbd>',  _kbd("Ctrl")." + "._kbd("C"));
        $this->assertEquals('<colgroup><col span="2" style="background-color:red"><col style="background-color:yellow"></colgroup>', _colgroup(_col(["span" => "2", "style" => "background-color:red"]), _col(["style" => "background-color:yellow"]))."");
        $this->assertEquals('<ul><li><data value="21053">Cherry Tomato</data></li></ul>', _ul(_li(_data(["value" => "21053"], "Cherry Tomato")))."");
        $this->assertEquals('<datalist id="browsers"><option value="Edge"></option></datalist>',  _datalist(["id" => "browsers"], _option(["value" => "Edge"]))."");
        $this->assertEquals('<dl><dt>A</dt><dd>B</dd></dl>', _dl(_dt("A"), _dd("B"))."");
        $this->assertEquals('<del>Some code</del>',  _del("Some code")."");
        $this->assertEquals('<dfn>Some code</dfn>',  _dfn("Some code")."");
        $this->assertEquals('<details><summary>Epcot Center</summary></details>', _details(_summary("Epcot Center"))."");
        $this->assertEquals('<cite>Some text</cite>',  _cite("Some text")."");
        $this->assertEquals('<dialog open>Some text</dialog>',  _dialog(["open"],"Some text")."");
        $this->assertEquals('<dir>No longer supported</dir>',  _dir("No longer supported")."");
        $this->assertEquals('<div>Some text</div>',  _div("Some text")."");
        $this->assertEquals('<em>Some code</em>',  _em("Some code")."");
        $this->assertEquals('<embed type="image/jpg" src="pic_trulli.jpg" width="300" height="200">',  _embed(["type" => "image/jpg", "src" => "pic_trulli.jpg", "width" => "300", "height" => "200"])."");
        $this->assertEquals('<fieldset><legend>Testing</legend></fieldset>', _fieldset(_legend("Testing"))."");
        $this->assertEquals('<figure><figcaption>Testing</figcaption></figure>', _figure(_figcaption("Testing"))."");
        $this->assertEquals('<footer>Some code</footer>',  _footer("Some code")."");
        $this->assertEquals('<form name="data"><input type="text" value="hello"></form>',  _form(["name" => "data"], _input(["type" => "text", "value" => "hello"]))."");
        $this->assertEquals('<h1>Some text</h1>',  _h1("Some text")."");
        $this->assertEquals('<h2>Some text</h2>',  _h2("Some text")."");
        $this->assertEquals('<h3>Some text</h3>',  _h3("Some text")."");
        $this->assertEquals('<h4>Some text</h4>',  _h4("Some text")."");
        $this->assertEquals('<h5>Some text</h5>',  _h5("Some text")."");
        $this->assertEquals('<h6>Some text</h6>',  _h6("Some text")."");
        $this->assertEquals('<head><title>Some title</title></head>',  _head(_title("Some title"))."");
        $this->assertEquals('<header><hgroup>Some text</hgroup></header>',  _header(_hgroup("Some text"))."");
        $this->assertEquals('<hr />',  _hr()."");
        $this->assertEquals('<html>Testing</html>',  _html("Testing")."");
        $this->assertEquals('<i>Some text</i>',  _i("Some text")."");
    }
}