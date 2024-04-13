export function checkLogin() {
    const input = document.querySelector('#login');
    const emailRegex = /^[\w\.-]+@[a-zA-Z\d\.-]+\.[a-zA-Z]{2,}$/;
    return emailRegex.test(input.value);
}

export default function login() {
    const incorrecWarn = document.querySelector('.form__block>span');
    const input = document.querySelector('#login');

    input.addEventListener('input', (event) => {
          if (checkLogin() || input.value == '') {
            if(!incorrecWarn.classList.contains('hide')) incorrecWarn.classList.add('hide');

          } else {
            document.querySelector('.form__block>span').classList.remove('hide');
          }
    });

}