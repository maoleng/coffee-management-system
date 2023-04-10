$('#i-search').on('keypress',function(e) {
    if(e.which === 13) {
        let url = window.location.href.split('?')[0];
        const urlSearchParams = new URLSearchParams(window.location.search);
        const params = Object.fromEntries(urlSearchParams.entries());
        const q = $(this).val()
        const param_names = Object.keys(params)

        if (params.q !== undefined) {
            let query_string = ''
            let first = true
            if (param_names.length > 0) {
                param_names.forEach(function (name) {
                    if (name !== 'q') {
                        query_string += first ? '?' : '&'
                        query_string += `${name}=${params[name]}`
                        first = false
                    }
                })
                query_string += query_string === '' ? `?q=${q}` : `&q=${q}`
            } else {
                query_string += `?q=${q}`
            }
            window.location.href = url + query_string

            return
        }
        const link_char = param_names.length > 0 ? '&' : '?'
        window.location.href = window.location.href + link_char + "q=" + q
    }
})
