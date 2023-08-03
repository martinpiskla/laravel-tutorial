<?php

namespace Tests\Browser;

use Facebook\WebDriver\Interactions\Internal\WebDriverClickAction;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Facebook\WebDriver\WebDriver;
use Facebook\WebDriver\WebDriverBy;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */

    public function testAreItemsVisible()
    {
        $this->browse(function (Browser $browser){
            $clothesSections = ['hp_carousel__headline hp-gant-category-women','hp_carousel__headline hp-gant-category-man','hp_carousel__headline hp-gant-category-children'];
            $browser->visit('/');
            $browser->clickAtXPath('//div[@class="modal-cookies__footer"]/descendant::span[text()="Podrobné nastavenia"]/parent::button/following-sibling::button');
            
            foreach ($clothesSections as $section) {
                $browser->clickAtXPath('//h2[@class="' . $section . '"]');
                sleep(5);
                //$browser->assertVisible('#app > main > div.hp_carousel.category-displayed > div.hp_carousel__item.category-show > div.hp-gant-category-list-wrapper > div > ul.hp-gant-category-list-left > li:nth-child(8) > a');
                $listofItems = $browser->driver->findElements(WebDriverBy::xpath('//h2[@class="' . $section . '"]/following-sibling::div/descendant::li'));
                foreach ($listofItems as $item) {
                    var_dump($item->getText());
                    var_dump($item->getTagName());
                    $browser->assertVisibleElement($item);
                }
            }
            $browser->quit();
        });
    }
}
