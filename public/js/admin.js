var boutons = document.querySelectorAll('.button');
if(boutons.length) {
    boutons.forEach(function(el){
        el.addEventListener('click', function(e){
            if(el.classList.contains('view')) {
                view_btn_manager(el);
            } else if(el.classList.contains('accept')) {
                accept_btn_manager(el);
            } else if(el.classList.contains('refuse')) {
                refuse_btn_manager(el);
            }
        });
    })

    function view_btn_manager(btn) {
        if(btn.dataset.article) {
            window.location = './posts/'+btn.dataset.article;
        }
    }
    async function accept_btn_manager(btn) {
        if(btn.dataset.comment) {
            data = {'id': btn.dataset.comment, mode:'accept'};
            if(await call_api(data) === 'true') {
                resolve(btn, 'accept');
            }
        }
    }
    async function refuse_btn_manager(btn) {
        if(btn.dataset.comment) {
            data = {'id': btn.dataset.comment, mode:'refuse'};
            if(await call_api(data) === 'true') {
                resolve(btn, 'refuse');
            }
        }
    }
    function resolve(btn, mode) {
        if(btn.dataset.comment) {
            var parent = document.querySelector('#id'+String(btn.dataset.comment));
            var btns = document.querySelectorAll('#id'+String(btn.dataset.comment)+' .button');
            console.log(btns);
            btns.forEach(function(el){
                if(el.classList.contains(mode)) {
                    el.style.display = 'none';
                } else {
                    el.style.display = 'block';
                }
            })
            parent.classList.remove('accept_color');
            parent.classList.remove('refuse_color');
            parent.classList.add(mode == 'accept' ? 'accept_color' : 'refuse_color');
        }

    }
    async function call_api(data) {
        const response = await fetch("./api/comment", {
            method: "POST",
            body: JSON.stringify(data)
        });
        const blabla = await response.text();
        return blabla;
    }
}