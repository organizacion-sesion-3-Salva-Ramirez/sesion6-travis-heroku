{ "collection" :
    {
        "title" : "TvSeries Database",
            "type" : "Tvserie",
            "version" : "1.0",
            "href" : "{{ path_for('tvseries')}}",

            "links" : [
                {"rel" : "profile" , "href" : "http://schema.org/tvseries","prompt":"Perfil"},
                {"rel" : "collection", "href" : "{{ path_for('movies') }}","prompt":"Movies"},
                {"rel" : "collection", "href" : "{{ path_for('books') }}","prompt":"Books"},
                {"rel" : "collection", "href" : "{{ path_for('musicalbums') }}","prompt":"Music Albums"},
                {"rel" : "collection", "href" : "{{ path_for('games') }}","prompt":"Videogames"}
                {"rel" : "collection", "href" : "{{ path_for('tvseries') }}","prompt":"Tvseries"}
            ],

            "items" : [
                {% for item in items %}

                {
                    "href" : "{{ path_for('tvseries') }}/{{ item.id }}",
                        "data" : [
                            {"name" : "name", "value" : "{{ item.name }}", "prompt" : "Nombre de la Serie"}
                        ]
                        } {% if not loop.last %},{% endif %}

                {% endfor %}

            ],

            "template" : {
            "data" : [
                {"name" : "name", "value" : "{{ item.name }}", "prompt" : "Nombre de la Serie"},
                {"name" : "description", "value" : "{{ item.description }}", "prompt" : "Descripción del Juego"},
                {"name" : "channelPlatform", "value" : "{{ item.channelPlatform }}", "prompt" : "Plataforma de la Serie"},
                {"name" : "category", "value" : "{{ item.category }}", "prompt" : "Categoria de la Serie"},
                {"name" : "seasons", "value" : "{{ item.seasons }}", "prompt" : "Temporadas de la Serie"},
                {"name" : "language", "value" : "{{ item.language }}", "prompt" : "Idioma de la Serie"}
                {"name" : "episodes", "value" : "{{ item.episodes }}", "prompt" : "Episodios de la Serie"}
                {"name" : "datePublished", "value" : "{{ item.datePublished }}", "prompt" : "Fecha de lanzamiento"},

            ]
                }
    }
}
