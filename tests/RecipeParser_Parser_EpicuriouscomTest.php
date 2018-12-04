<?php

use PHPUnit\Framework\TestCase;
require_once dirname(__FILE__) . '/../bootstrap.php';

class EpicuriouscomTest extends TestCase {

    public function test_cake_caramel() {
        $path = TestUtils::getDataPath("epicurious_com_chocolate_cake_with_caramel_milk_chocolate_curl.html");
        $url = "http://www.epicurious.com/recipes/food/views/Chocolate-Cake-with-Caramel-Milk-Chocolate-Frosting-107944";

        $recipe = RecipeParser::parse(file_get_contents($path), $url);
        if (isset($_SERVER['VERBOSE'])) print_r($recipe);

        $this->assertEquals("Chocolate Cake with Caramel-Milk Chocolate Frosting", $recipe->title);
        $this->assertEquals($url, $recipe->url);
        $this->assertEquals("12 servings", $recipe->yield);
        $this->assertRegExp("/^A classic chocolate layer cake/", $recipe->description);

        $this->assertEquals(2, count($recipe->ingredients));
        $this->assertEquals(13, count($recipe->ingredients[0]['list']));
        $this->assertEquals(5, count($recipe->ingredients[1]['list']));
        $this->assertEquals("Cake", $recipe->ingredients[0]['name']);
        $this->assertEquals("Frosting", $recipe->ingredients[1]['name']);

        $this->assertEquals(2, count($recipe->instructions));
        $this->assertEquals(2, count($recipe->instructions[0]['list']));
        $this->assertEquals(3, count($recipe->instructions[1]['list']));

        $this->assertEquals("Cake", $recipe->instructions[0]['name']);
        $this->assertEquals("Frosting", $recipe->instructions[1]['name']);

        $this->assertRegExp("/^Preheat oven to 350/", $recipe->instructions[0]['list'][0]);

        $this->assertRegExp("/107944.jpg/", $recipe->photo_url);
    }

    public function test_chocolate_layer_cake() {
        $path = TestUtils::getDataPath("epicurious_com_chocolate_crunch_layer_cake_with_milk_curl.html");
        $url = "http://www.epicurious.com/recipes/food/views/Chocolate-Crunch-Layer-Cake-with-Milk-Chocolate-Frosting-103151";

        $recipe = RecipeParser::parse(file_get_contents($path), $url);
        if (isset($_SERVER['VERBOSE'])) print_r($recipe);

        $this->assertEquals("Chocolate Crunch Layer Cake with Milk Chocolate Frosting", $recipe->title);
        $this->assertEquals($url, $recipe->url);
        $this->assertEquals("10 to 12 servings", $recipe->yield);
        $this->assertRegExp("/^The milk chocolate frosting/", $recipe->description);

        $this->assertEquals(3, count($recipe->ingredients));
        $this->assertEquals(10, count($recipe->ingredients[0]['list']));
        $this->assertEquals(4, count($recipe->ingredients[1]['list']));
        $this->assertEquals(2, count($recipe->ingredients[2]['list']));

        $this->assertEquals("Frosting", $recipe->ingredients[1]['name']);

        $this->assertEquals(6, count($recipe->instructions[0]['list']));
    }

    public function test_bellini() {
        $path = TestUtils::getDataPath("epicurious_com_lemon_ros_bellini_epicurious_com_curl.html");
        $url = "http://www.epicurious.com/recipes/food/views/Lemon-Rose-Bellini-362450";

        $recipe = RecipeParser::parse(file_get_contents($path), $url);
        if (isset($_SERVER['VERBOSE'])) print_r($recipe);

        $this->assertEquals("Lemon Rosé Bellini", $recipe->title);
        $this->assertEquals($url, $recipe->url);
        $this->assertEquals("1 serving", $recipe->yield);

        $this->assertEquals(4, count($recipe->ingredients[0]['list']));
        $this->assertEquals(1, count($recipe->instructions[0]['list']));
    }

    public function test_ziti_with_zucchini() {
        $path = TestUtils::getDataPath("epicurious_com_ziti_with_roasted_zucchini_epicurious_com_curl.html");
        $url = "http://www.epicurious.com/recipes/food/views/Ziti-with-Roasted-Zucchini-361191";

        $recipe = RecipeParser::parse(file_get_contents($path), $url);
        if (isset($_SERVER['VERBOSE'])) print_r($recipe);

        $this->assertEquals("Ziti with Roasted Zucchini", $recipe->title);
        $this->assertEquals($url, $recipe->url);
        $this->assertEquals("6 main-course servings", $recipe->yield);

        $this->assertEquals(60, $recipe->time['prep']);
        $this->assertEquals(120, $recipe->time['total']);

        $this->assertEquals(8, count($recipe->ingredients[0]['list']));
        $this->assertEquals(3, count($recipe->instructions[0]['list']));
        $this->assertRegExp("/^Preheat [^\n\r]* minutes.$/", $recipe->instructions[0]['list'][0]);
    }

}
