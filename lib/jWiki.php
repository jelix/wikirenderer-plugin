<?php
/**
* @author     Laurent Jouanneau
* @copyright  2006-2016 Laurent Jouanneau
* @link       http://www.jelix.org
* @licence    GNU Lesser General Public Licence see LICENCE file or http://www.gnu.org/licenses/lgpl.html
*/

/**
 * transform a wiki text into a document (html or else)
 * @link http://wikirenderer.jelix.org/
 */
class jWiki extends WikiRenderer {

    function __construct( $config=null) {

        if (is_string($config)) {
            if (class_exists($config)) {
                // this is a class name 
                $this->config = new $config();
            }
            else {
                // this is a plugin name
                $this->config = jApp::loadPlugin($config, 'wr_rules', '.rule.php', $config);
                if (is_null($this->config)) {
                    throw new Exception('Rules "'.$config.'" not found for jWiki');
                }
            }
            $this->config->charset = jApp::config()->charset;
        }
        elseif(is_object($config)) {
            $this->config = $config;
        }
        else {
            $this->config= new wr3_to_xhtml();
            $this->config->charset = jApp::config()->charset;
        }

        $this->inlineParser = new WikiInlineParser($this->config);

        foreach($this->config->bloctags as $name){
            $this->_blocList[]= new $name($this);
        }

        if ($this->config->defaultBlock) {
            $name = $this->config->defaultBlock;
            $this->_defaultBlock = new $name($this);
        }
    }
}
