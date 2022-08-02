<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>https://latestpatchnotes.com/</loc>
        <priority>1.0</priority>
        <changefreq>always</changefreq>
    </url>
    <url>
        <loc>https://latestpatchnotes.com/games</loc>
        <priority>0.8</priority>
        <changefreq>daily</changefreq>
    </url>
    <url>
        <loc>https://latestpatchnotes.com/latestnotes</loc>
        <priority>0.8</priority>
        <changefreq>daily</changefreq>
    </url>
    <url>
        <loc>https://latestpatchnotes.com/favgames</loc>
        <priority>0.8</priority>
        <changefreq>daily</changefreq>
    </url>
    @foreach ($posts as $post)
        <url>
            <loc>https://latestpatchnotes.com/game/{{ $post->slug }}</loc>
            <lastmod>{{ gmdate('Y-m-d\TH:i:s\Z', strtotime($post->updated_at)) }}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.7</priority>
        </url>
    @endforeach
    @foreach ($pnotes as $post)
        <url>
            <loc>https://latestpatchnotes.com/patchnote/{{ $post->slug }}</loc>
            <lastmod>{{ gmdate('Y-m-d\TH:i:s\Z', strtotime($post->updated_at)) }}</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.5</priority>
        </url>
    @endforeach
</urlset>
