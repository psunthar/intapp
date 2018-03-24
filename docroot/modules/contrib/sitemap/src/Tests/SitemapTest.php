<?php

namespace Drupal\sitemap\Tests;

/**
 * Tests the inclusion of the sitemap css file based on sitemap settings.
 *
 * @group sitemap
 */
class SitemapTest extends SitemapTestBase {

  /**
   * Test user access and page locations.
   */
  public function testSitemap() {

    // Find the Sitemap page at /sitemap
    $this->drupalLogin($this->user_view);
    $this->drupalGet('/sitemap');
    $this->assertResponse('200');

    // Unauthorized users cannot view the sitemap
    $this->drupalLogin($this->user_noaccess);
    $this->drupalGet('/sitemap');
    $this->assertResponse('403');

  }

  /**
   * Test user access and page locations for administrators.
   */
  public function testSitemapAdmin() {

    // Find the Sitemap settings page
    $this->drupalLogin($this->user_admin);
    $this->drupalGet('/admin/config/search/sitemap');
    $this->assertResponse('200');

    // Unauthorized users cannot view the sitemap
    $this->drupalLogin($this->user_view);
    $this->drupalGet('/admin/config/search/sitemap');
    $this->assertResponse('403');

  }



}