// Récupérer les éléments HTML nécessaires
const input = document.querySelector('input')
const submitBtn = document.querySelector('.submit')
const list = document.querySelector('ul')

submitBtn.addEventListener('click', addTodo);
window.addEventListener('DOMContentLoaded', getTodos)

// On initialise un tableau qui contiendra nos todos 
// On enregistrera ce tableau dans le local storage
let todos = []

function addTodo() {
    if (input.value.length > 0) {
         // On créé un élément li dans lequel on insère la todo cad la valeur de l'input
         const todo = document.createElement('li')

         // On crée et on insère notre bouton de delete dans chaque todo
         const deleteBtn = document.createElement('button')
         deleteBtn.textContent = "X"
         deleteBtn.classList.add('delete')
 
         // On ajoute le contenu texte recup depuis l'input à notre todo
         todo.textContent = input.value
 
         // On insère notre delete bouton dans nos todo
         todo.appendChild(deleteBtn)
 
         // On ajoute en tant qu'enfant la todo à la liste
         list.appendChild(todo)
         
         // On insère dans notre tableau de todos l'input value (aka la todo)
         todos.push(input.value)

         // On enregistre le tableau de todos en local storage   
         localStorage.setItem('todos', JSON.stringify(todos))
         
         // On vide linput
         input.value = ""

         deleteBtn.addEventListener('click', () => {
            todo.remove()
            deleteTodo(todo)
         })
    }
}

function getTodos() {
    console.log('ok')

    if (localStorage.getItem('todos') === null) {
        todos = []
    } else {
        todos = JSON.parse(localStorage.getItem('todos'))
    }

    todos.forEach(todo => {
        console.log(todo)
        // On créé un élément li dans lequel on insère la todo cad la valeur de l'input
        const li = document.createElement('li')

        // On crée et on insère notre bouton de delete dans chaque todo
        const deleteBtn = document.createElement('button')
        deleteBtn.textContent = "X"
        deleteBtn.classList.add('delete')

        // On ajoute le contenu texte recup depuis l'input à notre todo
        li.textContent = todo

        // On insère notre delete bouton dans nos todo
        li.appendChild(deleteBtn)

        deleteBtn.addEventListener('click', () => {
            li.remove()
            deleteTodo(todo)
        })

        list.appendChild(li)
    })
}

function deleteTodo(todo) {
    todos.splice(todos.indexOf(todo))
    localStorage.setItem('todos', JSON.stringify(todos))
}