<?php

namespace Tests\Feature\public;


//use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Product;
use App\Trait\DefaultOperationsTest;
use Tests\ClientTest;

class TradeTest extends ClientTest
{
    use DefaultOperationsTest;

    public function testCorrectMethodStore()
    {
        /** @var Product $product1 */
        /** @var Product $product2 */
        /** @var Product $product3 */

        $product1 = Product::factory()->create();
        $product2 = Product::factory()->create();
        $product3 = Product::factory()->create();

        $this->user->products()->attach(
            [
                $product1->id => ['price' => 111],
                $product2->id => ['price' => 222],
                $product3->id => ['price' => 333],
            ]
        );

        $params['products'] = [
            $product1->id => 18,
            $product2->id => 54,
            $product3->id => 22,
        ];

        $response = $this->post(route('trade.store'), $params);

        $this->statusShouldBeRedirect($response);
    }

    public function testCorrectRelations()
    {
        /** @var Product $product1 */
        /** @var Product $product2 */
        $product1 = Product::factory()->create();
        $product2 = Product::factory()->create();

        $this->user->products()->attach([$product1->id => ['price' => 111], $product2->id => ['price' => 222]]);
        $this->assertEquals(2, $this->user->products()->count());
        $this->assertEquals(222, $product2->getPrice());
    }
}
