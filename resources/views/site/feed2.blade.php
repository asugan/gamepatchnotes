<?=
'<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL ?>
<rss version="2.0">
    <channel>
        <title>
            <![CDATA[ LPN Patch Bot | Latest Game Updates and Patch Notes ]]>
        </title>
        <link>
        <![CDATA[ https://latestpatchnotes.com/feed2 ]]>
        </link>
        <description>
            <![CDATA[ We publish the latest patch notes and game updates on Steam and other games.You can follow your game and get notification when game updated! ]]>
        </description>
        <language>en</language>
        <pubDate>{{ now() }}</pubDate>

        @foreach ($patchnotes as $post)
            <item>
                <title>
                    <![CDATA[{{ $post->post_title }}]]>
                </title>
                <link>https://latestpatchnotes.com/patchnote/{{ $post->slug }}</link>
                <description>
                    <![CDATA[{!! $post->post_body !!}]]>
                </description>
                <author>
                    <![CDATA[Asugan]]>
                </author>
                <guid>{{ $post->id }}</guid>
                <pubDate>{{ $post->created_at->toRssString() }}</pubDate>
            </item>
        @endforeach
    </channel>
</rss>
