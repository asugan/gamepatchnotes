<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($pnotes as $post)
        <url>
            <loc>https://latestpatchnotes.com/patchnote/{{ $post->slug }}</loc>
            <lastmod>{{ gmdate('Y-m-d\TH:i:s\Z', strtotime($post->updated_at)) }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.5</priority>
        </url>
    @endforeach
</urlset>
