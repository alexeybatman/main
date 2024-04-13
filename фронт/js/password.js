export function checkPassword() {
    const input = document.querySelector('#pass');
    return input.value;
}

export default function passwordShow() {
    const button = document.querySelector('.form__showPass');
    button.addEventListener('click', (event) => {
        event.preventDefault();
        const eyes = button.querySelectorAll('img');

        if(button.classList.contains('hidePass')){
            button.previousElementSibling.type = 'text'
        } else {
            button.previousElementSibling.type = 'password';
        }
        button.classList.toggle('hidePass');
        eyes.forEach((item) => {
            item.classList.toggle('hide');
        })
    })
}