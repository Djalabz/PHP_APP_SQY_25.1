const studentField = document.querySelector('p')
const btn = document.querySelector('button')

const students = ['john', 'jane', 'jo', 'june', 'joey']

function randomName() {
    let randomIndex = Math.floor(Math.random() * students.length)
    studentField.textContent = students[randomIndex]
}

const interval = setInterval(randomName, 50)

btn.addEventListener('click', () => {
    clearInterval(interval)
})

window.addEventListener('keypress', (e) => {
    if (e.key === 'Enter') {
        clearInterval(interval)
    }
})