<?php

use PHPUnit\Framework\TestCase;
require_once dirname(__FILE__) . '/../bootstrap.php';

class AllrecipesTest extends TestCase {

    public function test_apple_pumpkin_muffins() {
        $path = TestUtils::getDataPath("allrecipes_com_apple_pumpkin_muffins_all_com_curl.html");
        $url = "http://allrecipes.com/recipe/42273/apple-pumpkin-muffins/";

        $recipe = RecipeParser::parse(file_get_contents($path), $url);
        
        if (isset($_SERVER['VERBOSE'])) print_r($recipe);

        $this->assertEquals("Apple Pumpkin Muffins", $recipe->title);
        $this->assertEquals("18 servings", $recipe->yield);
        $this->assertEquals($url, $recipe->url);

        // Two sections in this recipe
        $this->assertEquals(9, count($recipe->ingredients[0]['list']));
        $this->assertEquals(4, count($recipe->ingredients[1]['list']));
        $this->assertEquals(2, count($recipe->instructions[0]['list']));

        $this->assertEquals(
            'http://images.media-allrecipes.com/userphotos/250x250/742085.jpg',
            $recipe->photo_url
        );
    }

    public function test_spiced_pumpkin_seeds() {
        $path = TestUtils::getDataPath("allrecipes_com_spiced_pumpkin_seeds_all_com_curl.html");
        $url = "http://allrecipes.com/Recipe/Spiced-Pumpkin-Seeds/Detail.aspx";

        $recipe = RecipeParser::parse(file_get_contents($path), $url);
        
        if (isset($_SERVER['VERBOSE'])) print_r($recipe);

        $this->assertEquals("Spiced Pumpkin Seeds", $recipe->title);
        $this->assertEquals("8 servings", $recipe->yield);
        $this->assertEquals(10, $recipe->time['prep']);
        $this->assertEquals(60, $recipe->time['cook']);
        $this->assertEquals(70, $recipe->time['total']);
        $this->assertEquals($url, $recipe->url);
        $this->assertEquals(5, count($recipe->ingredients[0]['list']));
        $this->assertEquals(3, count($recipe->instructions[0]['list']));

    }

    public function test_carrot_cake() {
        $path = TestUtils::getDataPath("allrecipes_com_carrot_cake_viii_all_com_curl.html");
        $url = "http://allrecipes.com/Recipe/Carrot-Cake-VIII/Detail.aspx";

        $recipe = RecipeParser::parse(file_get_contents($path), $url);
        
        if (isset($_SERVER['VERBOSE'])) print_r($recipe);

        $this->assertEquals("Carrot Cake VIII", $recipe->title);
        $this->assertEquals("12 servings", $recipe->yield);
        $this->assertEquals($url, $recipe->url);
        $this->assertEquals(19, count($recipe->ingredients[0]['list']));
        $this->assertEquals(7, count($recipe->instructions[0]['list']));
        $this->assertEquals(
            'http://images.media-allrecipes.com/userphotos/250x250/50409.jpg',
            $recipe->photo_url
        );
    }

    public function test_potato_bacon_cheese_frittata() {
        $path = TestUtils::getDataPath("allrecipes_com_potato_bacon_cheese_frittata_all_com_curl.html");
        $url = "http://allrecipes.com/customrecipe/62636838/potato-bacon-cheese-frittata/detail.aspx";

        $recipe = RecipeParser::parse(file_get_contents($path), $url);
        
        if (isset($_SERVER['VERBOSE'])) print_r($recipe);

        $this->assertEquals("Potato, Bacon Cheese Frittata", $recipe->title);
        //$this->assertEquals("6 servings", $recipe->yield);
        $this->assertEquals(30, $recipe->time['prep']);
        $this->assertEquals(30, $recipe->time['cook']);
        $this->assertEquals(60, $recipe->time['total']);
        $this->assertEquals(9, count($recipe->ingredients[0]['list']));
        $this->assertEquals(8, count($recipe->instructions[0]['list']));
    }

    public function test_mobile_buckwheat_pancakes() {
        $path = TestUtils::getDataPath("m_allrecipes_com_best_buckwheat_pancakes_all_com_curl.html");
        $url = "http://m.allrecipes.com/recipe/14096/best-buckwheat-pancakes/?internalSource=staff%20pick&referringContentType=home%20page&referringPosition=8";

        $recipe = RecipeParser::parse(file_get_contents($path), $url);
        
        if (isset($_SERVER['VERBOSE'])) print_r($recipe);

        $this->assertEquals("Best Buckwheat Pancakes", $recipe->title);
        $this->assertEquals(5, $recipe->time['prep']);
        $this->assertEquals(10, $recipe->time['cook']);
        $this->assertEquals(15, $recipe->time['total']);
        $this->assertEquals(9, count($recipe->ingredients[0]['list']));
        $this->assertEquals(3, count($recipe->instructions[0]['list']));
    }

    public function test_mobile_chicken_teriyaki() {
        $path = TestUtils::getDataPath("m_allrecipes_com_chef_johns_chicken_teriyaki_all_com_curl.html");
        $url = "http://m.allrecipes.com/recipe/237927/chef-johns-chicken-teriyaki/?internalSource=staff%20pick&referringContentType=home%20page";

        $recipe = RecipeParser::parse(file_get_contents($path), $url);
        
        if (isset($_SERVER['VERBOSE'])) print_r($recipe);

        $this->assertEquals("Chef John's Chicken Teriyaki", $recipe->title);
        $this->assertEquals("10 servings", $recipe->yield);
        $this->assertEquals(15, $recipe->time['prep']);
        $this->assertEquals(30, $recipe->time['cook']);
        $this->assertEquals(75, $recipe->time['total']);
        $this->assertEquals(8, count($recipe->ingredients[0]['list']));
        $this->assertEquals(5, count($recipe->instructions[0]['list']));
    }

    public function test_mobile_tiramisu_layer_cake() {
        $path = TestUtils::getDataPath("m_allrecipes_com_tiramisu_layer_cake_all_com_curl.html");
        $url = "http://m.allrecipes.com/recipe/25639/tiramisu-layer-cake/";

        $recipe = RecipeParser::parse(file_get_contents($path), $url);
        
        if (isset($_SERVER['VERBOSE'])) print_r($recipe);

        $this->assertEquals("Tiramisu Layer Cake", $recipe->title);
        $this->assertEquals("12 servings", $recipe->yield);
        $this->assertEquals(5, $recipe->time['prep']);
        $this->assertEquals(20, $recipe->time['cook']);
        $this->assertEquals(120, $recipe->time['total']);

        $this->assertEquals(4, count($recipe->ingredients));
        $this->assertEquals("Cake", $recipe->ingredients[0]['name']);
        $this->assertEquals(4, count($recipe->ingredients[0]['list']));
        $this->assertEquals("Filling", $recipe->ingredients[1]['name']);
        $this->assertEquals(3, count($recipe->ingredients[1]['list']));
        $this->assertEquals("Frosting", $recipe->ingredients[2]['name']);
        $this->assertEquals(3, count($recipe->ingredients[2]['list']));
        $this->assertEquals("Garnish", $recipe->ingredients[3]['name']);
        $this->assertEquals(2, count($recipe->ingredients[3]['list']));
        
        $this->assertEquals(7, count($recipe->instructions[0]['list']));
    }

}
