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
                    echo $sort;
                    print $sort;
                    var_dump($sort);
                    $browser->quit();
        });
    }

    
}