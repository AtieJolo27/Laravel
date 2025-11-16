document.querySelector('.toggle-password').addEventListener('click', ()=>{
    const input = document.querySelector('.PasswordField');

    if(input.type === 'password'){
        input.type = 'text';
    }
    else{
        input.type = 'password';
    }
});