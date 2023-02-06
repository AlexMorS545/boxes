const inputBottle = document.getElementById('count-bottle')
const form = document.querySelector('form')
const btn = document.querySelector('button[type=submit]')
const errorMessage = document.getElementById('error')
const resultMessage = document.getElementById('result')

form.addEventListener('submit', async (event) => {
    event.preventDefault()
    errorMessage.innerText = ''
    resultMessage.innerText = ''

    if (!inputBottle.value)
        return showResult('Введите значение', true)

    btn.classList.add('disabled')
    btn.setAttribute('disabled', 'disabled')

    const result = await calculate(inputBottle.value)

    if (result.success)
        showResult(result.message)

    btn.classList.remove('disabled')
    btn.removeAttribute('disabled')
    console.log('count', result)
})

const calculate = async (count) => {
    const response = await fetch('/count/boxes/' + count)
    return await response.json()
}

const showResult = (message, error = false) => {

    if (error) return errorMessage.innerText = message

    resultMessage.innerText = message
}
