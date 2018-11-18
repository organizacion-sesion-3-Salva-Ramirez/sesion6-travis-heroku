{ "collection" :
    {
        "title" : "TV serie Database",
            "type" : "Tvserie",
            "version" : "1.0",
            "href" : "{{ path_for('tvseries')}}",

            "links" : [
                {"rel" : "profile" , "href" : "http://schema.org/tvseries","prompt":"Perfil"},
                {"rel" : "collection", "href" : "{{ path_for('movies') }}","prompt":"Movies"},
                {"rel" : "collection", "href" : "{{ path_for('books') }}","prompt":"Books"},
                {"rel" : "collection", "href" : "{{ path_for('musicalbums') }}","prompt":"Music Albums"},
                {"rel" : "collection", "href" : "{{ path_for('games') }}","prompt":"Videogames"},
                {"rel" : "collection", "href" : "{{ path_for('tvseries') }}","prompt":"Tvseries"}
            ],

            "items" : [
                {
                    "href" : "{{ path_for('tvseries') }}/{{ item.id }}",
                        "data" : [
                            {"name" : "name", "value" : "{{ item.name }}", "prompt" : "Nombre de la serie"},
                            {"name" : "description", "value" : "{{ item.description }}", "prompt" : "Descripción de la serie"},
                            {"name" : "channelPlatform", "value" : "{{ item.channelPlatform }}", "prompt" : "Plataforma de la serie"},
                            {"name" : "category", "value" : "{{ item.category }}", "prompt" : "Categoria del Juego"},
                            {"name" : "seasons", "value" : "{{ item.seasons }}", "prompt" : "Temporadas de la serie"},
                            {"name" : "language", "value" : "{{ item.language }}", "prompt" : "Idioma de la Serie"},
                            {"name" : "episodes", "value" : "{{ item.episodes }}", "prompt" : "Numero de episodios"},
                            {"name" : "datePublished", "value" : "{{ item.datePublished }}", "prompt" : "Fecha de lanzamiento"}

                        ]
                        }

            ],

            "template" : {
            "data" : [
                {"name" : "name", "value" : "", "prompt" : "Nombre de la serie"},
                {"name" : "description", "value" : "", "prompt" : "Descripción de la serie"},
                {"name" : "channelPlatform", "value" : "", "prompt" : "Plataforma de la serie"},
                {"name" : "category", "value" : "", "prompt" : "Categoria de la serie"},
                {"name" : "season", "value" : "", "prompt" : "Temporadas de la serie"},
                {"name" : "language", "value" : "", "prompt" : "Idioma de la serie"},
                {"name" : "episodes", "value" : "", "prompt" : "Numero de episodios"},
                {"name" : "datePublished", "value" : "", "prompt" : "Fecha de lanzamiento"}

            ]
                }
    }
}
