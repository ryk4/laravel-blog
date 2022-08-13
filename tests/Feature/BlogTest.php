<?php

namespace Tests\Feature;

use App\Models\Blog;
use Tests\TestCase;

class BlogTest extends TestCase
{
    private Blog $blog;

    protected function setUp(): void
    {
        parent::setUp();

        self::authenticateAsAdmin();

        $this->blog = Blog::factory()->create();
    }

    public function test_homepage_redirects_properly_to_blogs_index()
    {
        $response = $this->get('/');
        $response->assertRedirect(route('blogs.index'));
    }

    public function test_if_blogs_index_is_valid_page_and_contains_correct_info()
    {
        $response = $this->get(route('blogs.index'));
        $response->assertStatus(200);
        $response->assertSee('Blogs');
        $response->assertSee('Rytis Klimavičius');
    }

    public function test_blog_create_only_admin_can_access_page()
    {
        self::authenticateAsGuest();
        $response = $this->get(route('admin.blogs.create'));
        $response->assertStatus(302);

        self::authenticateAsNormalUser();
        $response = $this->get(route('admin.blogs.create'));
        $response->assertStatus(403);

        self::authenticateAsAdmin();
        $response = $this->get(route('admin.blogs.create'));
        $response->assertStatus(200);
    }

    public function test_blog_create()
    {
        $data = [
            'title' => 'test title',
            'guide' => 'guide test',
            'repository_url' => 'https://www.test.com',
            'summary' => 'basic summary',
        ];

        $initialRecordsCount = Blog::get()->count();

        $response = $this->post(route('admin.blogs.store', $data));

        $recordsCount = Blog::get()->count();

        self::assertEquals($initialRecordsCount + 1, $recordsCount);

        $blog = Blog::orderByDesc('created_at')->first();

        self::assertDatabaseHas('blogs', ['title' => $data['title']]);
        self::assertDatabaseHas('blogs', ['summary' => $data['summary']]);

        $response->assertRedirect(route('blogs.index'));
    }

    public function test_blog_create_redirects_back_if_validation_fails()
    {
        $data = [
            'title' => 'test title',
            'guide' => 'guide test',
            'repository_url' => 'wrong url',
        ];

        $response = $this->post(route('admin.blogs.store', $data));
        $response->assertStatus(302);
        $response->assertInvalid(['summary', 'repository_url']);
    }

    public function test_blog_create_attaches_image_correctly()
    {
    }

    public function test_blog_create_notifies_subscribers()
    {
    }

    public function test_blog_update_updates_data_correctly()
    {
        $data = [
            'title' => 'new title',
            'guide' => 'new guide',
            'summary' => $this->blog->summary,
        ];

        $response = $this->put(route('admin.blogs.update', $this->blog), $data);

        $response->assertStatus(302);

        self::assertDatabaseHas('blogs', ['title' => $data['title']]);
        self::assertDatabaseHas('blogs', ['guide' => $data['guide']]);
    }

    public function test_blog_delete()
    {
        $response = $this->delete(route('admin.blogs.destroy', $this->blog));

        $response->assertStatus(302);
        $response->assertRedirect(route('admin.blogs.index'));
        self::assertDatabaseMissing('blogs', ['title' => $this->blog->title]);
    }

    public function test_blog_guest_users_cannot_manage_blogs()
    {
    }

    public function test_blog_normal_users_cannot_manage_blogs()
    {
    }

    public function test_blog_show_redirects_to_correct_page()
    {
    }
}
