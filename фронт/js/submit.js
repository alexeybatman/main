import {checkPassword} from './password.js';

import {checkLogin} from './login.js';

export default function submit() {
    const form = document.querySelector('.form');
    console.log(form)
    form.addEventListener('change', (event) => {
        console.log('change');
        if(checkPassword() && checkLogin()) {
            const submitBtn = document.querySelector('.form__submit');
            submitBtn.classList.toggle('disabled');
            submitBtn.disabled = false;
        }
    })
}
