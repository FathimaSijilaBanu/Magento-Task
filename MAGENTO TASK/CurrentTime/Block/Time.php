<?php
/**
 *
 * @package     magento2
 * @author      Codilar Technologies
 * @license     https://opensource.org/licenses/OSL-3.0 Open Software License v. 3.0 (OSL-3.0)
 * @link        https://www.codilar.com/
 */

 namespace Codilar\CurrentTime\Block;

 use Magento\Framework\View\Element\Template;
 
 class Time extends Template
 {
     public function getCurrentTime()
     {
         $current_time = gmDate('h:i:s A', time() + 5.5*3600);
         return $current_time;
     }
 }