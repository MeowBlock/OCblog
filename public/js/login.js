document.querySelectorAll('.btnLogin').forEach(function (el){
    el.addEventListener('click', function (e){
        document.querySelectorAll('.btnLogin').forEach(function (el){ el.style.display = 'block'; });
        this.style.display = 'none';
        if(this.dataset.login != 'login') {
            //turn login into register
            document.querySelector('input[name=login]').value = 'register';
            document.querySelector('.btnSubmit').innerHTML = 'Créer un compte';
            document.querySelector('.forgot').style.display = 'none';
            document.querySelector('.confirm').style.display = 'block';
            document.querySelector('.name').style.display = 'block';
            document.querySelector('input[name=password-confirm]').required = 'required';
            document.querySelector('input[name=nom]').required = 'required';
            document.querySelector('.main_title').innerHTML = 'Je crée un compte';
        } else if (this.dataset.login != 'register') {
            //turn register into login
            document.querySelector('input[name=login]').value = 'login';
            document.querySelector('.btnSubmit').innerHTML = 'Se connecter';
            document.querySelector('.forgot').style.display = 'block';
            document.querySelector('.name').style.display = 'none';
            document.querySelector('input[name=nom]').required = '';
            document.querySelector('.confirm').style.display = 'none';
            document.querySelector('input[name=password-confirm]').required = '';
            document.querySelector('.main_title').innerHTML = 'Je me connecte a mon compte';



        }
    })
})