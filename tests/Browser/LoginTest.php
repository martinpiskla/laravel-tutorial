<?php

namespace Tests\Browser;

use Facebook\WebDriver\WebDriver;
use Facebook\WebDriver\WebDriverBy;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use SebastianBergmann\Environment\Console;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('MUŽI')
                    ->assertPathIs('/')
                    //->waitFor($browser->driver->findElement(WebDriverBy::xpath('//a[@id="loginbtn"]')));
                    //->assertPresent($browser->driver->findElement(WebDriverBy::xpath('//*[@id="loginbtn"]')))
                    ->assertVisible($browser->driver->findElement(WebDriverBy::xpath('//*[@id="loginbtn"]'))->getText());
                    $sort = $browser->driver->findElement(WebDriverBy::xpath('//*[@id="loginbtn"]'))->getText();
                    var_dump('webpage is working correctly');
                    //assertTrue(count($browser->driver->findElements(WebDriverBy::xpath('//*[@id="home-wrapper"]'))) > 0);
                    //$browser->quit();
        });
    }

    public function testCatalogItems()
    {
        $this->browse(function (Browser $browser){
            $browser->visit('damske-saty')
                    ->assertTrue(count($browser->driver->findElements(WebDriverBy::xpath('//article[contains(@class,"colored_product__item")]'))) == 24);
        });
    }

    
}