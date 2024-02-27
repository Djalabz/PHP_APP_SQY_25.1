// Récupérer les éléments HTML nécessaires
const input = document.querySelector('input')
const submitBtn = document.querySelector('.submit')
const list = document.querySelector('ul')

// Ajouter un écouteur d'événements sur le bouton de soumission 
submitBtn.addEventListener('click', () => {
    if (input.value.length > 0) {

        // On créé un élément li dans lequel on insère la todo cad la valeur de l'input
        const todo = document.createElement('li')

        // On crée et on insère notre bouton de delete dans chaque todo
        const deleteBtn = document.createElement('button')
        deleteBtn.textContent = "X"
        deleteBtn.classList.add('delete')

        // On ajoute le contenu texte recup depuis l'input à notre todo
        todo.textContent = input.value

        // On unsère notre delete bouton dans nos todo
        todo.appendChild(deleteBtn)

        // On ajoute en tant qu'enfant la todo à la liste
        list.appendChild(todo)

        // On clean l'input une fois la todo soumise
        input.value = ""

        // Fonctionnalité de check 
        let checkbox = document.createElement('input')
        checkbox.setAttribute('type','checkbox')
        todo.appendChild(checkbox)

        // Avec le toggle on ajoute ou on retire la classe checked de notre todo
        checkbox.addEventListener('click', () => {
            todo.classList.toggle('checked')
        })

        // Suppression de la todo
        deleteBtn.addEventListener('click', () => {
            todo.remove();
        })
    }
})



// Récupérer la valeur de l'input que l'on injecte dans un élément HTML (par exemple li)
// et qui s'ffichera dans notre ul de classe (output, cf le html)

// Faire en sorte que l'on ne puisse pas ajouter de todos vides

