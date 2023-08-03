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
    public function testNumberOfItems()
    {
        $this->browse(function (Browser $browser){
            $browser->visit('damske-saty');
            //$btn = $browser->element('//div[@class="modal-cookies__footer"]/descendant::span[text()="Podrobné nastavenia"]/parent::button/following-sibling::button');  
            //$btn->click();
            //$browser->click('#cookiesModal > div > div > div > div > div.modal-cookies__footer > button.modal-cookies__button.shared-btn.shared-btn_contained_primary.shared-btn_size_medium');
            //$browser->click($browser->driver->findElement(WebDriverBy::xpath('//div[@class="modal-cookies__footer"]/descendant::span[text()="Podrobné nastavenia"]/parent::button/following-sibling::button')));
            $browser->clickAtXPath('//div[@class="modal-cookies__footer"]/descendant::span[text()="Podrobné nastavenia"]/parent::button/following-sibling::button');
            $countOfItems = count($browser->driver->findElements(WebDriverBy::xpath('//article[contains(@class,"colored_product__item")]')));
            $this->assertTrue(count($browser->driver->findElements(WebDriverBy::xpath('//article[contains(@class,"colored_product__item")]'))) == 24);
            var_dump($countOfItems);
            $browser->quit();
        });
    }

    public function testAreItemsVisible()
    {
        $this->browse(function (Browser $browser){
            $browser->visit('/');
            //$btn = $browser->element('//div[@class="modal-cookies__footer"]/descendant::span[text()="Podrobné nastavenia"]/parent::button/following-sibling::button');  
            //$btn->click();
            //$browser->click('#cookiesModal > div > div > div > div > div.modal-cookies__footer > button.modal-cookies__button.shared-btn.shared-btn_contained_primary.shared-btn_size_medium');
            //$browser->click($browser->driver->findElement(WebDriverBy::xpath('//div[@class="modal-cookies__footer"]/descendant::span[text()="Podrobné nastavenia"]/parent::button/following-sibling::button')));
            $browser->clickAtXPath('//div[@class="modal-cookies__footer"]/descendant::span[text()="Podrobné nastavenia"]/parent::button/following-sibling::button');
            //$countOfItems = count($browser->driver->findElements(WebDriverBy::xpath('//article[contains(@class,"colored_product__item")]')));
            //$this->assertTrue(count($browser->driver->findElements(WebDriverBy::xpath('//article[contains(@class,"colored_product__item")]'))) == 24);
            //$browser->clickAtXPath('//div[@class="modal-cookies__footer"]/descendant::span[text()="Podrobné nastavenia"]/parent::button/following-sibling::button');
            $browser->assertVisible('#app > main > div.hp_carousel.category-displayed > div.hp_carousel__item.category-show > div.hp-gant-category-list-wrapper > div > ul.hp-gant-category-list-left > li:nth-child(8) > a');
            //var_dump($countOfItems);
            $browser->quit();
        });
    }
}
