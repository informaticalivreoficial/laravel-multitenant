<?=
'<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL
?>
<rss version="2.0">
    <channel>
        <title><![CDATA[ {{ $tenant->name }} ]]></title>
        <link><![CDATA[ {{url('feed')}} ]]></link>
        <description><![CDATA[ {{ $tenant->descricao }} ]]></description>
        <language>pt-br</language>
        <pubDate>{{ now() }}</pubDate>

        @foreach($imoveisVenda as $imovel)
            <item>
                <title><![CDATA[{{ $imovel->titulo }}]]></title>
                <link>{{ url('quero-comprar/'.$imovel->slug) }}</link>                
                <image>{{ $imovel->cover() }}</image>
                <description><![CDATA[{!! $imovel->getContentWebAttribute() !!}]]></description>
                <category>{{ $imovel->categoria }}</category>
                <author><![CDATA[ {{ $tenant->name }} ]]></author>
                <guid>{{ $imovel->id }}</guid>
                <pubDate>{{ $imovel->created_at }}</pubDate>
            </item>
        @endforeach

        @foreach($imoveisLocacao as $imovel)
            <item>
                <title><![CDATA[{{ $imovel->titulo }}]]></title>
                <link>{{ url('quero-alugar/'.$imovel->slug) }}</link>                
                <image>{{ $imovel->cover() }}</image>
                <description><![CDATA[{!! $imovel->getContentWebAttribute() !!}]]></description>
                <category>{{ $imovel->categoria }}</category>
                <author><![CDATA[ {{ $tenant->name }} ]]></author>
                <guid>{{ $imovel->id }}</guid>
                <pubDate>{{ $imovel->created_at }}</pubDate>
            </item>
        @endforeach

        @foreach($posts as $post)
            <item>
                <title><![CDATA[{{ $post->titulo }}]]></title>
                <link>{{ url('blog/artigo/'.$post->slug) }}</link>
                <image>{{ $post->cover() }}</image>
                <description><![CDATA[{!! $post->getContentWebAttribute() !!}]]></description>
                <category>{{ $post->categoriaObject->titulo }}</category>
                <author><![CDATA[{{ $post->userObject->name }}]]></author>
                <guid>{{ $post->id }}</guid>
                <pubDate>{{ $post->created_at }}</pubDate>
            </item>
        @endforeach

        @foreach($paginas as $pagina)
            <item>
                <title><![CDATA[{{ $pagina->titulo }}]]></title>
                <link>{{ url('pagina/'.$post->slug) }}</link>
                <image>{{ $pagina->cover() }}</image>
                <description><![CDATA[{!! $pagina->getContentWebAttribute() !!}]]></description>
                <category>{{ $pagina->categoriaObject->titulo }}</category>
                <author><![CDATA[{{ $pagina->userObject->name }}]]></author>
                <guid>{{ $pagina->id }}</guid>
                <pubDate>{{ $pagina->created_at }}</pubDate>
            </item>
        @endforeach

        @foreach($noticias as $noticia)
            <item>
                <title><![CDATA[{{ $noticia->titulo }}]]></title>
                <link>{{ url('noticia/'.$noticia->slug) }}</link>
                <image>{{ $noticia->cover() }}</image>
                <description><![CDATA[{!! $noticia->getContentWebAttribute() !!}]]></description>
                <category>{{ $noticia->categoriaObject->titulo }}</category>
                <author><![CDATA[{{ $noticia->userObject->name }}]]></author>
                <guid>{{ $noticia->id }}</guid>
                <pubDate>{{ $noticia->created_at }}</pubDate>
            </item>
        @endforeach
    </channel>
</rss>