<?php

namespace Tests\Feature;

use App\Models\Blog;
use Tests\TestCase;

class BlogTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        self::authenticateAsAdmin();
    }

    public function test_redirects_properly_to_blogs_index()
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

        self::assertEquals('test title', $blog->title);
        self::assertEquals('basic summary', $blog->summary);

        $response->assertRedirect(route('blogs.index'));
    }

    public function test_blog_create_redirects_back_if_validation_fails()
    {
    }

    public function test_blog_create_attaches_image_correctly()
    {
    }

    public function test_blog_create_notifies_subscribers()
    {
    }

    public function test_blog_update()
    {
    }

    public function test_blog_delete()
    {
    }

    public function test_blog_only_admin_can_manage_blogs()
    {
    }

}
