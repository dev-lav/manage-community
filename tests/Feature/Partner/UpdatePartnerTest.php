<?php

namespace Tests\Feature\Partner;

use App\Partner;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Tests\TestCase;

class UpdatePartnerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_should_update_a_partner()
    {
        $partner = factory(Partner::class)->create();

        $attributes = $this->attributes($partner->toArray(), ['name' => 'John Doe']);

        $this->putJson($this->uri($partner->id), $attributes)
            ->assertSuccessful()
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonCount(1);

        $this->assertDatabaseHas('partners', $partner->fresh()->toArray());
    }

    /** @test */
    public function it_should_require_a_valid_partner_id_to_update()
    {
        $this->putJson($this->uri(99), [])
            ->assertNotFound();
    }

    /** @test */
    public function it_should_require_name()
    {
        $partner = factory(Partner::class)->create();

        $attributes = $this->attributes($partner->toArray(), ['name' => '']);

        $this->putJson($this->uri($partner->id), $attributes)
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonValidationErrors('name');
    }

    /** @test */
    public function it_should_prevent_that_name_field_has_more_than_50_characters()
    {
        $partner = factory(Partner::class)->create();

        $attributes = $this->attributes($partner->toArray(), ['name' => Str::random(51)]);

        $this->putJson($this->uri($partner->id), $attributes)
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonValidationErrors('name');
    }

    /** @test */
    public function it_should_require_description()
    {
        $partner = factory(Partner::class)->create();

        $attributes = $this->attributes($partner->toArray(), ['description' => '']);

        $this->putJson($this->uri($partner->id), $attributes)
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonValidationErrors('description');
    }

    /** @test */
    public function it_should_prevent_that_description_field_has_more_than_150_characters()
    {
        $partner = factory(Partner::class)->create();

        $attributes = $this->attributes($partner->toArray(), ['description' => Str::random(151)]);

        $this->putJson($this->uri($partner->id), $attributes)
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonValidationErrors('description');
    }

    /** @test */
    public function it_should_require_type()
    {
        $partner = factory(Partner::class)->create();

        $attributes = $this->attributes($partner->toArray(), ['type' => '']);

        $this->putJson($this->uri($partner->id), $attributes)
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonValidationErrors('type');
    }

    /** @test */
    public function it_should_prevent_that_type_field_has_more_than_50_characters()
    {
        $partner = factory(Partner::class)->create();

        $attributes = $this->attributes($partner->toArray(), ['type' => Str::random(51)]);

        $this->putJson($this->uri($partner->id), $attributes)
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonValidationErrors('type');
    }

    /** @test */
    public function it_should_require_pic_name()
    {
        $partner = factory(Partner::class)->create();

        $attributes = $this->attributes($partner->toArray(), ['pic_name' => '']);

        $this->putJson($this->uri($partner->id), $attributes)
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonValidationErrors('pic_name');
    }

    /** @test */
    public function it_should_prevent_that_pic_name_field_has_more_than_50_characters()
    {
        $partner = factory(Partner::class)->create();

        $attributes = $this->attributes($partner->toArray(), ['pic_name' => Str::random(51)]);

        $this->putJson($this->uri($partner->id), $attributes)
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonValidationErrors('pic_name');
    }

    /** @test */
    public function it_should_require_pic_phone()
    {
        $partner = factory(Partner::class)->create();

        $attributes = $this->attributes($partner->toArray(), ['pic_phone' => '']);

        $this->putJson($this->uri($partner->id), $attributes)
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonValidationErrors('pic_phone');
    }

    /** @test */
    public function it_should_prevent_that_pic_phone_field_has_more_than_20_characters()
    {
        $partner = factory(Partner::class)->create();

        $attributes = $this->attributes($partner->toArray(), ['pic_phone' => Str::random(51)]);

        $this->putJson($this->uri($partner->id), $attributes)
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonValidationErrors('pic_phone');
    }

    /** @test */
    public function it_should_require_pic_email()
    {
        $partner = factory(Partner::class)->create();

        $attributes = $this->attributes($partner->toArray(), ['pic_email' => '']);

        $this->putJson($this->uri($partner->id), $attributes)
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonValidationErrors('pic_email');
    }

    /** @test */
    public function it_should_prevent_that_pic_email_field_has_more_than_50_characters()
    {
        $partner = factory(Partner::class)->create();

        $attributes = $this->attributes($partner->toArray(), ['pic_email' => Str::random(51)]);

        $this->putJson($this->uri($partner->id), $attributes)
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonValidationErrors('pic_email');
    }

    protected function attributes($partner, array $data = [])
    {
        return array_merge($partner, $data);
    }

    protected function uri($id)
    {
        return route('partners.update', ['partner' => $id]);
    }
}
